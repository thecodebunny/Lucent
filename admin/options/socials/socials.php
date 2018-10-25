<?php
  /**
   *
   *
   * Social Icons options
   *
   * @package Lucent
   **/

Redux::setSection(
	'lucent_opts',
	array(
		'id'         => 'lucent_social',
		'title'      => __( 'Social Media','lucent' ),
		'desc'       => __( 'Select social media options.','lucent' ),
		'icon'       => 'panel-facebook',
		'subsection' => false,
	)
);

	require_once( LUCENT_OPTIONS . 'socials/woo-social.php' );

	require_once( LUCENT_OPTIONS . 'socials/social-icons.php' );
