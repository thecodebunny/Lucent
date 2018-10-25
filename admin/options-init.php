<?php
	/**
	 * For full documentation, please visit: http://docs.reduxframework.com/
	 * For a more extensive sample-config file, you may look at:
	 * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
	 *
	 * @package Lucent
	 */

if ( ! class_exists( 'Redux' ) ) {
	return;
}

			require_once( LUCENT_ADMIN_DIR . 'config.php' );

			require_once( LUCENT_OPTIONS . 'global/global.php' );

			require_once( LUCENT_OPTIONS . 'headers/headers.php' );

			require_once( LUCENT_OPTIONS . 'sidebar/sidebar.php' );

			require_once( LUCENT_OPTIONS . 'socials/socials.php' );

			require_once( LUCENT_OPTIONS . 'posts/posts.php' );

			require_once( LUCENT_OPTIONS . 'projects/projects.php' );

			require_once( LUCENT_OPTIONS . 'woocommerce/woocommerce.php' );

			//require_once( LUCENT_OPTIONS . 'responsive/responsive.php' );

			require_once( LUCENT_OPTIONS . 'colors/colors.php' );

			require_once( LUCENT_OPTIONS . 'typography/typography.php' );

			require_once( LUCENT_OPTIONS . 'custom/css-js.php' );
