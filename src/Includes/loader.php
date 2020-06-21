<?php

namespace ChangeMyAdminLoginLogo\Includes;

use \ChangeMyAdminLoginLogo\Includes\Wp_Login_Logo_Operation;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/**
 * Class to add menu to dashboard, add bootstraps & scripts
 * Class Loader
 * @package ChangeMyAdminLoginLogo\Includes
 */
class Loader {
	private $wp_login_logo_operation;

	function __construct() {
		$this->wp_login_logo_operation = new Wp_Login_Logo_Operation();
		add_action( 'admin_menu', [ $this, 'add_menu_option_to_wp_admin_dashboard' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'load_wp_media_files' ] );
	}

	/**
	 * Add menu to wp-admin dashboard
	 */
	function add_menu_option_to_wp_admin_dashboard() {
		add_menu_page( "Login Logo", "Login Logo", "edit_posts",
			"cmywll_change_my_login_logo_operation", [
				$this->wp_login_logo_operation,
				'cmywll_change_my_login_logo_operation'
			], plugin_dir_url( __FILE__ ) . '/images/cmywll.png', 10 );
	}


	/**
	 * Load media files
	 */
	function load_wp_media_files() {
		wp_enqueue_media();
		wp_enqueue_style( 'bootstrap-css', plugin_dir_url( __FILE__ ) . '/css/bootstrap.min.css' );
		wp_enqueue_script( 'bootstrap-js', plugin_dir_url( __FILE__ ) . '/js/bootstrap.min.js' );
	}
}





