<?php

namespace ChangeMyAdminLoginLogo\Includes;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/**
 * Class Option_Constants
 * @package ChangeMyAdminLoginLogo\Includes
 */
class Option_Constants {

	const INFO = 'cmywll_info';
	/**
	 * Login url location
	 */
	const CHANGE_MY_LOGIN_LOGO_URL = 'cmywll_change_my_login_logo_url';
	/**
	 * Logo height
	 */
	const CHANGE_MY_LOGIN_LOGO_HEIGHT = 'cmywll_change_my_login_url_height';
	/**
	 * Logo width
	 */
	const CHANGE_MY_LOGIN_LOGO_WIDTH = 'cmywll_change_my_login_url_width';

	/**
	 * Hook name
	 */
	const MENU_IDENTIFIER = "cmywll_change_my_login_logo_operation";
}
