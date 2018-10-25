<?php

/**
 *
 * Theme options panel configuaration
 *
 * @package lucent
 **/

	// This is your option name where all the Redux data is stored.
	$opt_name = 'lucent_opts';
	$developer = '<p>Developed by<a href="https://thecodebunny.com/" target="_blank"> TheCodeBunny Developers.</a></p>';

	/**
	 * ---> SET ARGUMENTS
	 * All the possible arguments for Redux.
	 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
	 * */

	$theme = wp_get_theme(); // For use with some settings. Not necessary.

	$args = array(
		'opt_name' => 'lucent_opts',
		'dev_mode' => false,
		'ajax_save' => true,
		'use_cdn' => false,
		'display_name' => '',
		'display_version' => true,
		'page_title' => 'Lucent OPTIONS',
		'update_notice' => true,
		'intro_text' => '<p>Choose your theme settings below.</p>',
		'footer_text' => '' . $developer . '',
		'admin_bar' => true,
		'menu_type' => 'submenu',
		'menu_title' => 'Lucent Options',
		'menu_icon' => ReduxFramework::$_url . 'assets/img/lucent-menu.png',
		'admin_bar_icon' => ReduxFramework::$_url . 'assets/img/lucent-menu.png',
		'admin_bar_icon' => 'theme-icon',
		'allow_sub_menu' => true,
		'page_parent'          => 'TheCodeBunny',
		'page_parent_post_type' => 'TheCodeBunny',
		'page_priority' => '15',
		'customizer' => true,
		'default_show' => true,
		'default_mark' => '',
		'google_api_key' => 'AIzaSyBcInw9sMJ1DgDjQAk7T1WRDVVpdWg5FG0',
		'google_update_weekly' => true,
		'show_options_object'	=> false,
		'hints' => array(
			'icon' => 'adjust-alt',
			'icon_position' => 'right',
			'icon_color' => '#dd3333',
			'icon_size' => 'normal',
			'tip_style' => array(
				'color' => 'light',
				'shadow' => '1',
				'rounded' => '1',
				'style' => 'bootstrap',
			),
			'tip_position' => array(
				'my' => 'top left',
				'at' => 'bottom right',
			),
			'tip_effect' => array(
				'show' => array(
					'effect' => 'slide',
					'duration' => '500',
					'event' => 'mouseover click',
				),
				'hide' => array(
					'effect' => 'fade',
					'duration' => '500',
					'event' => 'mouseleave unfocus click',
				),
			),
		),
		'output' => true,
		'output_tag' => true,
		'settings_api' => true,
		'cdn_check_time' => '1440',
		'compiler' => true,
		'global_variable' => 'lucent_opts',
		'page_permissions' => 'manage_options',
		'save_defaults' => true,
		'show_import_export' => true,
		'database' => 'options',
		'transient_time' => '3600',
		'network_sites' => true,
	);

	// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
	$args['share_icons'][] = array(
		'url'   => 'https://www.facebook.com/lucentwp',
		'title' => 'Like us on Facebook',
		'icon'  => 'panel-facebook',
	);
	$args['share_icons'][] = array(
		'url'   => 'http://twitter.com/apppack15',
		'title' => 'Follow us on Twitter',
		'icon'  => 'panel-twitter',
	);
	$args['share_icons'][] = array(
		'url'   => 'http://plus.google.com/+Apppack15',
		'title' => 'Find us on Google+',
		'icon'  => 'panel-googleplus',
	);

	Redux::setArgs( $opt_name, $args );

	/*
     * ---> END ARGUMENTS
     */
	/*
     * ---> START HELP TABS
     */

	$tabs = array(
		array(
			'id'      => 'lucent-help-tab-1',
			'title'   => __( 'Theme Information 1', 'lucent' ),
			'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'lucent' ),
		),
		array(
			'id'      => 'lucent-help-tab-2',
			'title'   => __( 'Theme Information 2', 'lucent' ),
			'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'lucent' ),
		),
	);
	Redux::setHelpTab( $opt_name, $tabs );

	// Set the help sidebar
	$content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'lucent' );
	Redux::setHelpSidebar( $opt_name, $content );


	/*
     * <--- END HELP TABS
     */
