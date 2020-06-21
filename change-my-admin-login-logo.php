<?php
/*
Plugin Name: Change My Admin Login Logo
Plugin URI: arunupadhyay.com.np
Description: Change My Admin Login Logo
Version: 1.0
Author: Arun Upadhyay
Author URI: arunupadhayay.com.np
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Access denied ! Please Login' );
}
require_once( 'vendor/autoload.php' );

include_once( ABSPATH . 'wp-includes/pluggable.php' );

use ChangeMyAdminLoginLogo\Includes\Loader;
use ChangeMyAdminLoginLogo\Includes\Change_Admin_Login;
use ChangeMyAdminLoginLogo\Includes\Option_Constants;

$cMYWLL_Change_My_Login_Logo = new Loader();
$cMYWLL_Change_My_Login_Logo = new Change_Admin_Login();

define( "MAIN_FILE", plugin_basename( __FILE__ ) );

/**
 * Activate plugin
 */
function cmywll_activate_on_change_my_login_logo() {
	if ( ! get_option( Option_Constants::INFO ) ) {
		add_option( Option_Constants::INFO, get_plugin_data( __FILE__ ) );
	}
}

register_activation_hook( __FILE__, 'cmywll_activate_on_change_my_login_logo' );

/**
 * Deactivate hook
 */
function cmywll_deactivate_on_change_my_login_logo() {
	$options_array =
		[
			Option_Constants::INFO,
			Option_Constants::CHANGE_MY_LOGIN_LOGO_URL,
			Option_Constants::CHANGE_MY_LOGIN_LOGO_WIDTH,
			Option_Constants::CHANGE_MY_LOGIN_LOGO_HEIGHT

		];
	foreach ( $options_array as $option ) {
		delete_option( $option );
	}
}

register_deactivation_hook( __FILE__, 'cmywll_deactivate_on_change_my_login_logo' );