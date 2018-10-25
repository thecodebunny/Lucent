<?php

/**

 * ***********************************************************
 *
 * Enqueue function seperated from base-functions.php
 *
 * @since 1.0.0
 *************************************************************/
	global $lucent_opts;

		add_action( 'wp_enqueue_scripts', 'Lucent_Styles' );

function Lucent_Styles() {

	wp_enqueue_style( 'lucent-style', get_stylesheet_uri(), array(), Lucent_Theme_Version() );

	wp_enqueue_style( 'lucent-layouts', LUCENT_ASSETS . 'css/lucent-layouts.css', array(), Lucent_Theme_Version() );
	wp_enqueue_style( 'lucent-header-styles', LUCENT_ASSETS . 'css/lucent-header.css', array(), Lucent_Theme_Version() );
	wp_enqueue_style( 'lucent-navigation-style', LUCENT_ASSETS . 'css/lucent-navigation.css', array(), Lucent_Theme_Version() );
	wp_enqueue_style( 'lucent-ux', LUCENT_ASSETS . 'css/lucent-ux.css', array(), Lucent_Theme_Version() );
	wp_enqueue_style( 'lucent-ui', LUCENT_ASSETS . 'css/lucent-ui.css', array(), Lucent_Theme_Version() );
	wp_enqueue_style( 'lucent-3D', LUCENT_ASSETS . 'css/lucent-3d.css', array(), Lucent_Theme_Version() );
	wp_enqueue_style( 'lucent-animations', LUCENT_ASSETS . 'css/lucent-animations.css', array(), Lucent_Theme_Version() );
	wp_enqueue_style( 'lucent-base-style', LUCENT_ASSETS . 'css/lucent-base.css', array(), Lucent_Theme_Version() );
	wp_enqueue_style( 'lucent-ui', LUCENT_ASSETS . 'css/lucent-navnew.css', array(), Lucent_Theme_Version() );
	/********* Add Font Icons *********/
	wp_enqueue_style( 'lucent-font-icons', LUCENT_ASSETS . 'fonts/lucent.css', array(), Lucent_Theme_Version() );
	wp_enqueue_style( 'lucent-cart-icons', LUCENT_REDUX_EXTENSIONS . 'css/icon-select.css', array(), Lucent_Theme_Version() );

	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'lucent-woo-styles', LUCENT_ASSETS . 'css/lucent-woocommerce.css', array(), Lucent_Theme_Version() );
		wp_enqueue_style( 'lucent-woo-icons', LUCENT_ASSETS . 'fonts/woothemes_ecommerce.css', array(), Lucent_Theme_Version() );
		wp_enqueue_style( 'lucent-cart', LUCENT_ASSETS . 'css/lucent-cart.css', array(), Lucent_Theme_Version() );
	}

	wp_enqueue_style( 'lucent-media-queries', LUCENT_ASSETS . 'css/lucent-media-queries.css', array(), Lucent_Theme_Version() );
}

				add_action( 'wp_enqueue_scripts', 'Lucent_Scripts' );

function Lucent_Scripts() {
	$lucent_global = lucent_global();
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-dialog' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

			wp_enqueue_script( 'comment-reply' );

	}
	wp_enqueue_script( 'lucent-core', LUCENT_ASSETS . 'js/lucent-core.js', array(), Lucent_Theme_Version(), false );
	wp_enqueue_script( 'lucent-navigation', LUCENT_ASSETS . 'js/lucent-navigation.js', array(), Lucent_Theme_Version(), true );
	wp_enqueue_script( 'lucent-skip-link-focus-fix', LUCENT_ASSETS . 'js/skip-link-focus-fix.js', array(), Lucent_Theme_Version(), true );
	wp_enqueue_script( 'lucent-isotope', LUCENT_ASSETS . 'js/lib/isotope.js', array(), Lucent_Theme_Version(), false );
	wp_enqueue_script( 'lucent-imagesloaded', LUCENT_ASSETS . 'js/lib/imagesloaded.pkgd.min.js', array(), Lucent_Theme_Version(), false );
	wp_enqueue_script( 'lucent-modernizr', LUCENT_ASSETS . 'js/lib/modernizr.js', array(), Lucent_Theme_Version(), false );
	wp_enqueue_script( 'lucent-izimodal', LUCENT_ASSETS . 'js/lib/izimodal.js', array(), Lucent_Theme_Version(), false );
	wp_enqueue_script( 'lucent-filterizr', LUCENT_ASSETS . 'js/lib/filterizr.js', array(), Lucent_Theme_Version(), true );
	wp_enqueue_script( 'lucent-scripts', LUCENT_ASSETS . 'js/lucent-scripts.js', array(), Lucent_Theme_Version(), false );
	wp_enqueue_script( 'lucent-carousel', LUCENT_ASSETS . 'js/lucent-carousel.js', array(), Lucent_Theme_Version(), true );
	wp_enqueue_script( 'lucent-scroll', LUCENT_ASSETS . 'js/lucent-scroll.js',array(), Lucent_Theme_Version(), true );
	wp_enqueue_script( 'lucent-ui', LUCENT_ASSETS . 'js/lucent-ui.js', array(), Lucent_Theme_Version(), true );
	if ( '1' === $lucent_global['lucent_addtocart_ajax'] ) {
		wp_enqueue_script( 'lucent-ajax', LUCENT_ASSETS . 'js/lucent-ajax.js', array(), Lucent_Theme_Version() );
	}
}

			add_action( 'redux/page/lucent_opts/enqueue', 'Lucent_Theme_Options_CSS' );

function Lucent_Theme_Options_CSS() {
	wp_dequeue_style( 'redux-admin-css' );

	wp_register_style(
		'redux-custom-css',
		LUCENT_REDUX_DIR . 'assets/css/theme-options.css',
		array( 'farbtastic' ),
		time(),
		'all'
	);

	wp_enqueue_style( 'redux-custom-css' );

}

				add_action( 'redux/page/lucent_opts/enqueue','Lucent_Theme_Options_Icons' );

function Lucent_Theme_Options_Icons() {

	wp_dequeue_style( 'redux-admin-icons' );

	wp_register_style(
		'redux-custom-icons',
		LUCENT_REDUX_DIR . 'assets/css/panel-icons.css',
		array( 'farbtastic' ),
		time(),
		'all'
	);

	wp_enqueue_style( 'redux-custom-icons' );

}
