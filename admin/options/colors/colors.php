<?php
/**
 *
 * Section creates theme colors options
 *
 * @package Lucent
 */

	Redux::setSection(
		'lucent_opts',
		array(
			'id'         => 'lucent_theme_colors',
			'title'      => __( 'Theme Colors','lucent' ),
			'icon'       => 'panel-paintbrush',
			'subsection' => false,
		)
	);
		  
	require_once( LUCENT_OPTIONS . 'colors/global.php' );

	//require_once( LUCENT_OPTIONS . 'colors/header-nav.php' );

	require_once( LUCENT_OPTIONS . 'colors/color-schemes.php' );
