<?php
/**
 * Lucent functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Lucent
 */

			define( 'LUCENT_THEME_VERSION', '1.5.2' );

			define( 'LUCENT_FILES', get_template_directory() );

			define( 'LUCENT_DIRS', get_template_directory_uri() );

			define( 'LUCENT_FUNCTIONS', get_stylesheet_directory() . '/inc/functions/' );

			define( 'LUCENT_ASSETS', get_stylesheet_directory_uri() . '/assets/' );

			define( 'LUCENT_INCLUDE', get_template_directory() . '/inc/' );

			define( 'LUCENT_INCLUDE_URI', get_template_directory_uri() . '/inc/' );

			define( 'LUCENT_BUILDER', get_template_directory_uri() . '/builder/' );

			define( 'LUCENT_WHITELABEL', get_template_directory() . '/white-label/' );

			define( 'LUCENT_OPTIONS', get_template_directory() . '/admin/options/' );

			define( 'LUCENT_ADMIN_DIR', get_template_directory() . '/admin/' );

			define( 'LUCENT_CLASSES', get_template_directory() . '/inc/classes/' );

			define( 'LUCENT_REDUX_DIR', get_template_directory_uri() . '/admin/redux-framework/' );

			define( 'LUCENT_REDUX_EXTENSIONS', get_template_directory_uri() . '/admin/redux-extensions/extensions/' );

 /**
  *
  * LOAD DEPENDENCIES
  */

		require_once( LUCENT_INCLUDE . 'functions/lucent-base-functions.php' );

		require_once( LUCENT_INCLUDE . 'functions/lucent-enqueue.php' );

		require_once( LUCENT_INCLUDE . 'custom-header.php' );

		require_once( LUCENT_INCLUDE . 'template-tags.php' );

		require_once( LUCENT_INCLUDE . 'extras.php' );

		require_once( LUCENT_INCLUDE . 'customizer.php' );

		require_once( LUCENT_INCLUDE . 'jetpack.php' );

		require_once( LUCENT_ADMIN_DIR . 'lucent-news.php' );

  /**
   *
   * LOAD CLASSES
   */

		require_once( LUCENT_CLASSES . 'class-lucent-core.php' );

		require_once( LUCENT_CLASSES . 'class-lucent-admin.php' );

		require_once( LUCENT_CLASSES . 'class-lucent-seo.php' );

		require_once( LUCENT_CLASSES . 'class-lucent-header.php' );

		require_once( LUCENT_CLASSES . 'class-lucent-navigation.php' );

		require_once( LUCENT_CLASSES . 'class-lucent-projects.php' );

		require_once( LUCENT_CLASSES . 'class-lucent-archives.php' );

		require_once( LUCENT_CLASSES . 'class-lucent-single.php' );

		require_once( LUCENT_CLASSES . 'class-lucent-woocommerce.php' );

		require_once( LUCENT_CLASSES . 'class-lucent-woocontent.php' );

/**
 *
 * Function adds Widgets
 *
 * @package Lucent
 */
function lucent_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'lucent' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'lucent' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'lucent_widgets_init' );

/**
 *
 * Function adds global variable
 *
 * @package Lucent
 */
function lucent_global() {
	 global $lucent_opts;
	 return $lucent_opts;
}
$lucent_global = lucent_global();

if ( '1' === $lucent_global['lucent_minify_HTML'] ) {
	require_once( LUCENT_CLASSES . 'class-lucent-minify.php' );
}

function Lucent_Theme_Version() {

	$lucent_info = wp_get_theme();

	if ( is_child_theme() ) {
		$lucent_info = wp_get_theme( $lucent_info->parent_theme );
	}

	$lucent_version = $lucent_info->display( 'Version' );

	return $lucent_version;
}
