<?php
/**
 *
 * Custom Posts
 *
 * @package Lucent
 */

	Redux::setSection(
		'lucent_opts',
		array(
			'id'      => 'gloabl_options',
			'title'   => __( 'Global Settings', 'lucent' ),
			'desc'    => __( 'Global options for your website.','lucent' ),
			'heading' => '',
			'icon'    => 'panel-globe',
			'fields'     => array(),
		)
	);

		require_once( LUCENT_OPTIONS . 'global/layouts.php' );

		require_once( LUCENT_OPTIONS . 'global/logo.php' );

		require_once( LUCENT_OPTIONS . 'global/minify.php' );

		require_once( LUCENT_OPTIONS . 'global/seo.php' );

		require_once( LUCENT_OPTIONS . 'global/extras.php' );
