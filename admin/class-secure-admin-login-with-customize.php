<?php defined( 'ABSPATH' ) or die( 'No script' );
if ( ! class_exists( 'Secure_Login_Admin' ) ) {
	class Secure_Login_Admin {
		/**
		 * Calling _construct class.
		 */
		public function __construct() {
			require_once SECURE_LOGIN_PLUGIN_DIR . 'admin/customizer/class-secure-admin-login-with-customize-customizer.php';
			require_once SECURE_LOGIN_PLUGIN_DIR . 'admin/captcha/class-secure-admin-login-with-customize-captcha.php';	
			// Add filter and action hook
			add_filter( 'login_headertitle', array( $this, 'secure_login_login_logo_url_title' ) );
			add_filter( 'login_headerurl', array( $this, 'secure_login_login_logo_url' ) );
			add_action( 'login_enqueue_scripts', array( $this, 'secure_login_customizer_css' ) );
		}
		
		/**
		 * Admin login page
		 */
		public function secure_login_customizer_css() {
			wp_enqueue_style( 'secure-login', SECURE_LOGIN_PLUGIN_URL . 'admin/css/secure-admin-login-with-customize.php' );
		}

		/**
		 * Admin login page
		 * Login header url 
		 */
		public function secure_login_login_logo_url() {
			return get_bloginfo( 'url' );
		}

		/**
		 * Admin login page
		 * Login header title 
		 */
		public function secure_login_login_logo_url_title() {
			return get_bloginfo( 'name', 'display' );
		}
	}
}
