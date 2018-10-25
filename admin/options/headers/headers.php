<?php
  /**
   *
   * Header Layouts options
   *
   * @package Lucent
   **/

	Redux::setSection(
		'lucent_opts',
		array(
			'id'         => 'header_options',
			'title'      => __( 'Header & Menu','lucent' ),
			'desc'       => __( 'Choose header, menu and breadcrumb options for your site.','lucent' ),
			'icon'       => 'panel-windows',
			'subsection' => false,
		)
	);

	require_once( LUCENT_OPTIONS . 'headers/header-layouts.php' );

	require_once( LUCENT_OPTIONS . 'headers/topbar.php' );

	require_once( LUCENT_OPTIONS . 'headers/mobile-menu.php' );
