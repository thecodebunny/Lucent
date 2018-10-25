<?php
  /**
   *
   *
   * Projects Page options
   *
   * @package Lucent
   **/

	Redux::setSection(
		'lucent_opts',
		array(
			'id'         => 'lucent_projects_options',
			'title'      => __( 'Projects','lucent' ),
			'icon'       => 'panel-pencil',
			'subsection' => false,
		)
	);

	require_once( LUCENT_OPTIONS . 'projects/projects-page.php' );
