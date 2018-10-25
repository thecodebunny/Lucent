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
		'id'         => 'lucent_advanced_options',
		'title'      => __( 'Custom Post Type Options','lucent' ),
		'icon'       => 'panel-documents',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'         => 'lucent_hide_portfolio',
				'type'       => 'button_set',
				'title'      => __( 'Hide Portfolio', 'lucent' ),
				'desc'       => __( 'Choose whether to hide Portfolio from admin menu','lucent' ),
				'options' => array(
					'yes'   => 'Yes',
					'no'    => 'NO',
				),
				'default'   => 'no',
			),
			array(
				'id'         => 'lucent_hide_testimonials',
				'type'       => 'button_set',
				'title'      => __( 'Hide Testimonials', 'lucent' ),
				'desc'       => __( 'Choose whether to hide Testimonials from admin menu','lucent' ),
				'options' => array(
					'yes' => 'Yes',
					'no' => 'No',
				),
				'default'    => 'no',
			),
			array(
				'id'         => 'lucent_hide_staff',
				'type'       => 'button_set',
				'title'      => __( 'Hide Staff', 'lucent' ),
				'desc'       => __( 'Choose whether to hide Staff from admin menu','lucent' ),
				'options' => array(
					'yes' => 'Yes',
					'no' => 'NO',
				),
				'default'    => 'no',
			),
			array(
				'id'         => 'lucent_hide_jobs',
				'type'       => 'button_set',
				'title'      => __( 'Hide Jobs', 'lucent' ),
				'desc'       => __( 'Choose whether to hide Events from admin menu','lucent' ),
				'options' => array(
					'yes' => 'Yes',
					'no' => 'NO',
				),
				'default'    => 'no',
			),
		),
	)
);
