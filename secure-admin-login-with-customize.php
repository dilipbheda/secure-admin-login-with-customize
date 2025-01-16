<?php
/**
 * Plugin Name: Secure Admin Login With Customize
 * Plugin URL: https://wordpress.org/plugins/secure-admin-login-with-customize/
 * Version: 1.4
 * Description: This plugin allows you to customize your WordPress admin login page within WordPress customizer.
 * Tags: admin login customize, login page, login page customize, login security, secure admin login, recaptcha, login captcha
 * Author: Dilip Bheda
 * Author URL: https://profiles.wordpress.org/dilipbheda
 * Text Domain: secure-admin-login-with-customize
 * Domain Path: /languages
 * License: GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package Secure_Login
 */

define( 'SECURE_LOGIN_VERSION', '1.4' );
define( 'SECURE_LOGIN_WP_VERSION', '5.9' );
define( 'SECURE_LOGIN_FILE', __FILE__ );
define( 'SECURE_LOGIN_PLUGIN_DIR', plugin_dir_path( SECURE_LOGIN_FILE ) );
define( 'SECURE_LOGIN_PLUGIN_URL', plugin_dir_url( SECURE_LOGIN_FILE ) );

// include admin require file.
require_once SECURE_LOGIN_PLUGIN_DIR . '/admin/class-secure-login-admin.php';

/**
 * Plugin textdomain for the multilingual.
 */
function secure_login_plugin_textdomain() {
	load_plugin_textdomain( 'secure-admin-login-with-customize', false, basename( __DIR__ ) . '/languages' );
}
add_action( 'plugins_loaded', 'secure_login_plugin_textdomain' );

/**
 * Activate function if plugin is activated.
 */
function secure_login_register_activation() {
	// Code here.
}
register_activation_hook( SECURE_LOGIN_FILE, 'secure_login_register_activation' );


/**
 * Deactivate function if plugin is deactivated
 */
function secure_login_register_deactivation() {
	// Code here.
}
register_deactivation_hook( SECURE_LOGIN_FILE, 'secure_login_register_deactivation' );

/**
 * Call admin class.
 */
function secure_login_admin() {
	return new Secure_Login_Admin();
}
add_action( 'plugins_loaded', 'secure_login_admin' );
