<?php

namespace ChangeMyAdminLoginLogo\Includes;

use \ChangeMyAdminLoginLogo\Includes\Wp_Login_Logo_Operation;
use ChangeMyAdminLoginLogo\Includes\Option_Constants;

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
			Option_Constants::MENU_IDENTIFIER, [
				$this->wp_login_logo_operation,
				'cmywll_change_my_login_logo_operation'
			], 'dashicons-admin-links', 10 );
	}

	/**
	 * Add Footer to admin dashboard page.
	 *
	 * @return string
	 */
	function add_footer_to_admin_dashboard( $footer_text ) {

		$footer_text_arr = get_option( Option_Constants::INFO );
		if ( empty( $footer_text_arr ) ) {
			return $footer_text;
		}
		$plugin_name = $footer_text_arr['Name'];
		$author      = $footer_text_arr['Author'];
		$author_uri  = $footer_text_arr['AuthorURI'];

		return "$plugin_name | <a href= '$author_uri' target='_blank'> $author </a>";
	}

	/**
	 * Load media files
	 */
	function load_wp_media_files( $hook ) {
		if ( $hook == "toplevel_page_" . \ChangeMyAdminLoginLogo\Includes\Option_Constants::MENU_IDENTIFIER ) {
			wp_enqueue_media();
			wp_register_style( 'wpplugin-frontend-style-library', plugin_dir_url( __FILE__ ) . '/css/bootstrap.min.css', [], time() );
			wp_register_style( 'wpplugin-frontend-js-library', plugin_dir_url( __FILE__ ) . '/js/bootstrap.min.js', [], time() );
			wp_enqueue_style( 'wpplugin-frontend-style-library' );
			wp_enqueue_style( 'wpplugin-frontend-js-library' );
			add_filter( 'admin_footer_text', [ $this, 'add_footer_to_admin_dashboard' ], 10, 1 );
		}
	}
}





