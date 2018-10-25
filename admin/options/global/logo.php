<?php
/**
 *
 *
 * Lucent THEME LOGO OPTIONS
 *
 * @package Lucent
 */

Redux::setSection(
	'lucent_opts',
	array(
		'id'         => 'logo_options',
		'title'      => __( 'Logo','lucent' ),
		'desc'       => __( 'Choose your logo and alternatives here.','lucent' ),
		'icon'       => 'panel-shield',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'         => 'lucent_logo',
				'type'       => 'media',
				'url'        => true,
				'section_id' => 'logo_options',
				'title'      => __( 'Upload your logo.','lucent' ),
				'default'  => array(
					'url' => ReduxFramework::$_url . 'assets/img/logo-panel.png',
				),
			),
			array(
				'id'         => 'logo_width',
				'type'       => 'text',
				'title'      => __( 'Logo width','lucent' ),
				'validate'   => 'numeric',
				'desc'       => __( 'Do not use px','lucent' ),
			),
			array(
				'id'         => 'text_logo',
				'type'       => 'text',
				'title'      => __( 'Text logo','lucent' ),
				'desc'       => __( 'Use text logo instead?','lucent' ),
			),
			array(
				'id'         => 'lucent_slogan',
				'type'       => 'text',
				'title'      => __( 'Slogan','lucent' ),
				'desc'       => __( 'Write a slogan to show in header','lucent' ),
				'default'    => __( 'Not Just Another WordPress Theme','lucent' ),
			),
			array(
				'id'         => 'lucent_favicon',
				'type'       => 'media',
				'url'        => true,
				'title'      => __( 'Upload favicon.','lucent' ),
				'desc'       => __( 'Recommonded size: 32 x 32.','lucent' ),
				'default'  => array(
					'url' => ReduxFramework::$_url . 'assets/img/logo-panel.png',
				),
			),
			array(
				'id'         => 'lucent_apple',
				'type'       => 'media',
				'url'        => true,
				'title'      => __( 'Apple touch icon.','lucent' ),
				'desc'       => __( 'File name must be <strong>apple-touch-icon.png</strong>. Recommonded size: 180 x 180.','lucent' ),
				'default'  => array(
					'url' => ReduxFramework::$_url . 'assets/img/logo-panel.png',
				),
			),
			array(
				'id'         => 'lucent_avatar',
				'type'       => 'media',
				'url'        => true,
				'title'      => __( 'Upload Custom Avatar.','lucent' ),
				'desc'       => __( 'Upload custom avatar to replace with default avatar. Mayke sure to choose Lucent Avatar on Settings -> Discussion page.','lucent' ),
				'default'  => array(
					'url' => ReduxFramework::$_url . 'assets/img/lucent-avatar.png',
				),
			),
		),
	)
);
