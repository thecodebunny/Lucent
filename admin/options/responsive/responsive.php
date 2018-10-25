<?php
  /**
   *
   *
   * Mobile Menu options
   *
   * @package Lucent
   **/

  Redux::setSection(
	  'lucent_opts',
	  array(
		  'id'         => 'lucent_theme_responsive',
		  'title'      => __( 'Theme Reponsive Options','lucent' ),
		  'icon'       => 'panel-mobile',
		  'subsection' => false,
	  )
  );

	require_once( LUCENT_OPTIONS . 'responsive/boxed-layout.php' );
	require_once( LUCENT_OPTIONS . 'responsive/mobile-menu.php' );
