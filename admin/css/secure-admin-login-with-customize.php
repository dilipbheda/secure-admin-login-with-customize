<?php require_once('../../../../../wp-config.php'); 
header('Content-type: text/css');
ob_start("compress");
function compress( $css ) {
	// Remove comments.
	$css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
	// Remove tabs, spaces, newlines, etc.
	$css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css );
	return $css;
} ?>
html, body {
<?php if ( ! empty( get_option( 'secure_login_bg_image' ) ) ) : ?>
	background-image: url(<?php echo esc_url( get_option( 'secure_login_bg_image' ) ); ?>);
<?php endif; ?>
<?php if ( ! empty( get_option( 'secure_login_bg_color' ) ) ) : ?>
	background-color: <?php echo esc_html( get_option( 'secure_login_bg_color' ) ); ?>;
<?php endif; ?>
<?php if ( ! empty( get_option( 'secure_login_bg_size' ) ) ) : ?>
	background-size: <?php echo esc_html( get_option( 'secure_login_bg_size' ) ); ?>;
<?php endif; ?>
}
body.login div#login h1 a {
<?php if ( ! empty( get_option( 'secure_login_logo' ) ) ) : ?>
	background-image: url(<?php echo esc_url( get_option( 'secure_login_logo' ) ); ?>);
<?php endif; ?>
<?php if ( ! empty( get_option( 'secure_login_logo_width' ) ) ) : ?>
	width: <?php echo esc_html( get_option( 'secure_login_logo_width' ) ); ?>;
<?php endif; ?>
<?php if ( ! empty( get_option( 'secure_login_logo_height' ) ) ) : ?>
	height: <?php echo esc_html( get_option( 'secure_login_logo_height' ) ); ?>;
<?php endif; ?>
<?php if ( ! empty( get_option( 'secure_login_logo_width' ) ) || ! empty( get_option( 'secure_login_logo_height' ) ) ) : ?>
	background-size: <?php echo esc_html( get_option( 'secure_login_logo_width' ) ); ?> <?php echo get_option( 'secure_login_logo_height' ); ?>;
<?php endif; ?>
<?php if ( ! empty( get_option( 'secure_login_logo_padding' ) ) ) : ?>
	padding-bottom: <?php echo esc_html( get_option( 'secure_login_logo_padding' ) ); ?>;
<?php endif; ?>
}
#loginform {
<?php if ( ! empty( get_option( 'secure_login_form_bg_image' ) ) ) : ?>
	background-image: url(<?php echo esc_url( get_option( 'secure_login_form_bg_image' ) ); ?>);
<?php endif; ?>
<?php if ( ! empty( get_option( 'secure_login_form_bg_color' ) ) ) : ?>
	background-color: <?php echo esc_html( get_option( 'secure_login_form_bg_color' ) ); ?>;
<?php endif; ?>
<?php if ( ! empty( get_option( 'secure_login_form_height' ) ) ) : ?>
	height: <?php echo esc_html( get_option( 'secure_login_form_height' ) ); ?>;
<?php endif; ?>
<?php if ( ! empty( get_option( 'secure_login_form_padding' ) ) ) : ?>
	padding: <?php echo esc_html( get_option( 'secure_login_form_padding' ) ); ?>;
<?php endif; ?>
<?php if ( ! empty( get_option( 'secure_login_form_border' ) ) ) : ?>
	border: <?php echo esc_html( get_option( 'secure_login_form_border' ) ); ?>;
<?php endif; ?>
}
#login {
<?php if ( ! empty( get_option( 'secure_login_form_width' ) ) ) : ?>
	width: <?php echo esc_html( get_option( 'secure_login_form_width' ) ); ?>;
<?php endif; ?>
}
.login form .input, .login input[type="text"] {
<?php if ( ! empty( get_option( 'secure_login_field_width' ) ) ) : ?>
	width: <?php echo esc_html( get_option( 'secure_login_field_width' ) ); ?>;
<?php endif; ?>
<?php if ( ! empty( get_option( 'secure_login_field_margin' ) ) ) : ?>
	margin: <?php echo esc_html( get_option( 'secure_login_field_margin' ) ); ?>;
<?php endif; ?>
<?php if ( ! empty( get_option( 'secure_login_field_bg' ) ) ) : ?>
	background: <?php echo esc_html( get_option( 'secure_login_field_bg' ) ); ?>;
<?php endif; ?>
<?php if ( ! empty( get_option( 'secure_login_field_color' ) ) ) : ?>
	color: <?php echo esc_html( get_option( 'secure_login_field_color' ) ); ?>;
<?php endif; ?>
}
.login label {
<?php if ( ! empty( get_option( 'secure_login_field_label' ) ) ) : ?>
	color: <?php echo esc_html( get_option( 'secure_login_field_label' ) ); ?>;
<?php endif; ?>

<?php if ( ! empty( get_option( 'secure_login_field_font_size' ) ) ) : ?>
	font-size: <?php echo esc_html( get_option( 'secure_login_field_font_size' ) ); ?>;
<?php endif; ?>
}
.wp-core-ui .button-primary {
<?php if ( ! empty( get_option( 'secure_login_button_bg' ) ) ) : ?>
	background: <?php echo esc_html( get_option( 'secure_login_button_bg' ) ); ?>;
<?php endif; ?>

<?php if ( ! empty( get_option( 'secure_login_button_border' ) ) ) : ?>
	border-color: <?php echo esc_html( get_option( 'secure_login_button_border' ) ); ?>;
<?php endif; ?>

<?php if ( ! empty( get_option( 'secure_login_button_shadow' ) ) ) : ?>
	box-shadow: 0px 1px 0px <?php echo esc_html( get_option( 'secure_login_button_shadow' ) ); ?> inset, 0px 1px 0px rgba(0, 0, 0, 0.15);
<?php endif; ?>

<?php if ( ! empty( get_option( 'secure_login_button_color' ) ) ) : ?>
	color: <?php echo esc_html( get_option( 'secure_login_button_color' ) ); ?>;
<?php endif; ?>

<?php if ( ! empty( get_option( 'secure_login_button_font_size' ) ) ) : ?>
	font-size: <?php echo esc_html( get_option( 'secure_login_button_font_size' ) );?>;
<?php endif; ?>

}
.wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover {
<?php if ( ! empty( get_option( 'secure_login_button_hover_bg' ) ) ) : ?>
	background: <?php echo esc_html( get_option( 'secure_login_button_hover_bg' ) ); ?>;
<?php endif; ?>
<?php if ( ! empty( get_option( 'secure_login_button_hover_border' ) ) ) : ?>
	border-color: <?php echo esc_html( get_option( 'secure_login_button_hover_border' ) ); ?>;
<?php endif; ?>
}
.login #backtoblog a, .login #nav a {
<?php if ( ! empty( get_option( 'secure_login_text_color' ) ) ) : ?>
	color: <?php echo esc_html( get_option( 'secure_login_text_color' ) ); ?>;
<?php endif; ?>

<?php if ( ! empty( get_option( 'secure_login_form_text_font_size' ) ) ) : ?>
	font-size: <?php echo esc_html( get_option( 'secure_login_form_text_font_size' ) ); ?>;
<?php endif; ?>
}
.login #backtoblog a:hover, .login #nav a:hover, .login h1 a:hover {
<?php if ( ! empty( get_option( 'secure_login_text_color_hover' ) ) ) : ?>
	color: <?php echo esc_html( get_option( 'secure_login_text_color_hover' ) ); ?>;
<?php endif; ?>
}
.login #login_error {
<?php if ( ! empty( get_option( 'secure_login_error_border_color' ) ) ) : ?>
	border-color: <?php echo esc_html( get_option( 'secure_login_error_border_color' ) ); ?>;
<?php endif; ?>

<?php if ( ! empty( get_option( 'secure_login_error_text_color' ) ) ) : ?>
	color: <?php echo esc_html( get_option( 'secure_login_error_text_color' ) ); ?>;
<?php endif; ?>

<?php if ( ! empty( get_option( 'secure_login_error_font_size' ) ) ) : ?>
	font-size: <?php echo esc_html( get_option( 'secure_login_error_font_size' ) );?>;
<?php endif; ?>

<?php if ( ! empty( get_option( 'secure_login_error_bg_color' ) ) ) : ?>
	background-color: <?php echo esc_html( get_option( 'secure_login_error_bg_color' ) ); ?>;
<?php endif; ?>
}
<?php if ( ! empty( get_option( 'secure_login_additional_css' ) ) ) : ?>
	<?php echo esc_textarea( get_option( 'secure_login_additional_css' ) ); ?>;
<?php endif; ?>
img#reloadcaptcha {
	position: absolute;
	width: 25px;
	cursor: pointer;
}
<?php
ob_end_flush();
