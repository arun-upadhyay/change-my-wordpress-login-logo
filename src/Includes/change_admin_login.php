<?php

namespace ChangeMyAdminLoginLogo\Includes;

use ChangeMyAdminLoginLogo\Includes\Option_Constants;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/**
 * Change Logo on wordpress login
 *
 * Class Change_Admin_Login
 * @package ChangeMyAdminLoginLogo\Includes
 */
class Change_Admin_Login {

	function __construct() {
		add_action( 'login_head', [ $this, 'change_wp_login_logo' ] );
	}

	/**
	 * Update wordpress login logo css.
	 */
	function change_wp_login_logo() {
		$location = esc_url( trim( get_option( Option_Constants::CHANGE_MY_LOGIN_LOGO_URL ) ) );
		$width    = trim( get_option( Option_Constants::CHANGE_MY_LOGIN_LOGO_WIDTH ) );
		$height   = trim( get_option( Option_Constants::CHANGE_MY_LOGIN_LOGO_HEIGHT ) );
		$bool     = wp_http_validate_url( $location ) !== false && ! empty( $width ) && ! empty( $height );
		if ( $bool ) {
			?>
            <style type="text/css">
                #login h1 a, .login h1 a {
                    background-image: url(<?=$location?>);
                    height: <?=$height?>px;
                    width: <?=$width?>px;
                    background-size: <?=$height?>px <?=$width?>px;
                    background-repeat: no-repeat;
                    padding-bottom: 0px;
                }
            </style>
		<?php } ?>
	<?php }

}
