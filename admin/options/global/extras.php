<?php
/**
 *
 * Lucent Extras
 *
 * @package Lucent
 */
Redux::setSection(
	'lucent_opts',
	array(
		'id'         => 'lucent_extras',
		'title'      => __( 'Extras','lucent' ),
		'desc'       => __( '','lucent' ),
		'icon'       => 'panel-aperture',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'         => 'lucent_totop',
				'type'       => 'switch',
				'title'      => __( 'Enable To Top?','lucent' ),
				'default'  => true,
			),
			array(
				'id'         => 'totop_side',
				'type'       => 'select',
                'title'      => __( 'To Top Button Side','lucent' ),
                'options'  => array(
                    'left' => 'Left',
                    'right' => 'Right',
                ),
                'default'   => 'left',
            ),
        )
	)
);
