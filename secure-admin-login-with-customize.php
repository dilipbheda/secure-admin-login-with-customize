<?php
/*
Plugin Name: Secure Admin Login With Customize
Plugin URL: https://wordpress.org/plugins/secure-admin-login-with-customize/
Version: 1.3
Description: This plugin allows you to customize your WordPress admin login page within WordPress customizer.
Tags: admin login customize, login page, login page customize, login security, secure admin login, recaptcha, login captcha
Author: Dilip Bheda
Author URL: https://profiles.wordpress.org/dilipbheda
Text Domain: secure-admin-login-with-customize
Domain Path: /languages
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

define( 'SECURE_LOGIN_VERSION', '1.3' );
define( 'SECURE_LOGIN_WP_VERSION', '4.4' );
define( 'SECURE_LOGIN_FILE', __FILE__ );
define( 'SECURE_LOGIN_PLUGIN_DIR', plugin_dir_path( SECURE_LOGIN_FILE ) );
define( 'SECURE_LOGIN_PLUGIN_URL', plugin_dir_url( SECURE_LOGIN_FILE ) );

// include admin require file.
require_once SECURE_LOGIN_PLUGIN_DIR . '/admin/class-secure-admin-login-with-customize.php';

/**
 * Plugin textdomain for the multilingual.
 */
add_action( 'plugins_loaded', 'secure_login_plugin_textdomain' );
function secure_login_plugin_textdomain() {
	load_plugin_textdomain( 'secure-admin-login-with-customize', false, basename( dirname( __FILE__ ) ) . '/languages' ); 
}

/**
 * Activate function if plugin is activated.
 */
function secure_login_register_activation() {
	// Code here.
}
register_activation_hook( SECURE_LOGIN_FILE, 'secure_login_register_activation' );


/**
 * deactivate function if plugin is deactivated
 */
function secure_login_register_deactivation() {
	// Code here.
}
register_deactivation_hook( SECURE_LOGIN_FILE, 'secure_login_register_deactivation' );

/**
 * Call admin class.
 */
add_action( 'plugins_loaded', 'secure_login_admin' );
function secure_login_admin() {
	return new Secure_Login_Admin;
}
