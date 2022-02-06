<?php session_start();
if ( ! class_exists( 'Secure_Login_Recaptcha' ) ) {
	class Secure_Login_Recaptcha {
		// Private variable for captcha.
		private $public_key;
		private $private_key;

		/**
		 *  Calling public __constructor.
		 */
		public function __construct() {
			$recaptcha = get_option( 'secure_login_captcha_enable' ) ? 'google_captcha' : '' ;
			$captcha_enable = empty( $recaptcha ) ? get_option( 'secure_login_captcha_code_enable' ) ? 'captcha_code' : '' : $recaptcha;
			switch ( $captcha_enable ) {
				case 'google_captcha':
					if ( ( get_option( 'secure_login_captcha_sitekey' ) ) && ( get_option( 'secure_login_captcha_secretkey' ) ) ) {
						$this->public_key  = get_option( 'secure_login_captcha_sitekey' );
						$this->private_key = get_option( 'secure_login_captcha_secretkey' );
						add_action( 'login_form', array( $this, 'secure_login_display' ) );
						add_action( 'wp_authenticate_user', array( $this, 'secure_login_validate_captcha' ), 10, 2 );
						add_action( 'login_enqueue_scripts', array( $this, 'secure_login_script') );
						add_action( 'login_footer', array( $this, 'secure_login_grecaptcha_execute' ) );
					}
				break;
				case 'captcha_code':
					add_action( 'login_form', array( $this, 'secure_login_captchadisplay' ) );
					add_action( 'wp_authenticate_user', array( $this, 'secure_login_captcha_validation' ), 10, 2 );
					add_action( 'login_footer' , array( $this, 'secure_login_captcha_reload_js' ) );
				default:
				break;
			}
		}

		/**
		* Add style
		*/
		public function secure_login_script() {
			wp_enqueue_script( 'safe-login-captcha', 'https://www.google.com/recaptcha/api.js' );
		}

		/**
		 * Google recaptcha execute.
		 */
		function secure_login_grecaptcha_execute() {
			echo '<script>function safelogin(e){document.forms.loginform.submit()}var element=document.getElementById("wp-submit");element.addEventListener("click",function(e){e.preventDefault(),""!=document.getElementById("user_login").value&&""!=document.getElementById("user_pass").value&&grecaptcha.execute()});</script>';
		}

		/**
		* Captcha code display
		*/
		public function secure_login_display() {
			echo '<div class="g-recaptcha" data-sitekey="' . $this->public_key . '" data-callback="safelogin" data-size="invisible"></div>';
		}

		/**
		* Verify the captcha answer
		*
		* @param $user string login username
		* @param $password string login password
		*
		* @return WP_Error|WP_user
		*/
		public function secure_login_validate_captcha( $user, $password ) {
			if ( isset( $_POST['g-recaptcha-response'] ) ) {
				$response = file_get_contents( 'https://www.google.com/recaptcha/api/siteverify', false, stream_context_create( array(
					'http' => array(
						'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
						'method'  => 'POST',
						'content' => http_build_query( array(
							'response' => $_POST['g-recaptcha-response'],
							'secret' => $this->private_key,
							'remoteip' => $_SERVER['REMOTE_ADDR']
							) ),
						),
					) ) );
				$response = json_decode( $response );
				if ( $response->success ) {
					return $user;
				} else {
					return new WP_Error( 'invalid_captcha', __( 'The request is invalid or malformed.', 'secure-admin-login-with-customize' ));
				}
			} else {
				return new WP_Error( 'invalid_captcha', __( 'Invalid captcha code. Try again.', 'secure-admin-login-with-customize' ) );
			}
		}

		public function secure_login_captcha_reload_js() { 
			echo '<script type="text/javascript">var reloadcaptcha=document.getElementById("reloadcaptcha");reloadcaptcha.addEventListener("click",function(){var t=document.getElementById("captcha");t.setAttribute("src",t.src+"?"+Math.random())});</script>';
		}

		public function secure_login_captchadisplay() {
			echo '<p><img src="' . SECURE_LOGIN_PLUGIN_URL . 'admin/captcha/secure-admin-login-with-customize-captcha.php" id="captcha" alt="captcha">';
			echo '<img src="' . SECURE_LOGIN_PLUGIN_URL . 'admin/images/reload.png" id="reloadcaptcha" title="Reload" alt="captcha-reload"></p>';
			echo '<p>';
			echo '<label for="captchacode">' . __( 'Captcha Code', 'secure-admin-login-with-customize' ) . '</label>';
			echo '<input type="text" name="captchacode" id="captchacode" >';
			echo '</p>';
		}

		public function secure_login_captcha_validation( $user, $password ) {
			if ( isset( $_POST[ 'captchacode' ] ) ) {
				if ( $_POST[ 'captchacode' ] != $_SESSION['captcha'] ) {
					return new WP_Error( 'invalid_captcha', __( 'Invalid captcha code. Try again.', 'secure-admin-login-with-customize' ) );
				} else {
					return $user;
				}
			}
		}
	}
	new Secure_Login_Recaptcha;
}
