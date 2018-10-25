<?php
/**
 *
 * CODEVENTIVE BASE FUNCTIONS
 *
 * @package Lucent
 **/

add_action( 'after_setup_theme','lucent_theme_setup' );

/**
 *
 * Function loads theme related functions
 */
function lucent_theme_setup() {

	add_editor_style( '/css/lucent-editor-styles.css' );

	load_theme_textdomain( 'lucent', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'main-nav'   => __( 'Main Navigation', 'lucent' ),
			'secondary-nav'   => __( 'Secondary Navigation', 'lucent' ),
			'footer-nav' => __( 'Footer Navigation', 'lucent' ),
			'account-nav' => __( 'Account Navigation', 'lucent' ),
			'buddypress-nav' => __( 'BuddyPress Navigation', 'lucent' ),
		)
	);

	add_theme_support(
		'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	add_theme_support(
		'custom-background', apply_filters(
			'lucent_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );

	if ( class_exists( 'WooCommerce' ) ) {

		add_theme_support( 'woocommerce' );

		require_once( LUCENT_INCLUDE . '/classes/class-lucent-woocommerce.php' );
	}

}

add_action( 'after_setup_theme','lucent_content_width' );

/**
 *
 * Function loads theme related functions
 */
function lucent_content_width() {

	$GLOBALS['content_width'] = apply_filters( 'lucent_content_width', 640 );

}

