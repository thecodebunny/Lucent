<?php
  /**
   *
   *
   * Sidebar options
   *
   * @package Lucent
   */

  Redux::setSection(
	  'lucent_opts',
	  array(
		  'id'         => 'lucent_sidebar',
		  'title'      => __( 'Sidebar Options','lucent' ),
		  'icon'       => 'panel-streetsign',
		  'subsection' => false,
		  'fields'       => array(
			  array(
				  'id'       => 'lucent_sidebar_select',
				  'type'         => 'select',
				  'title'        => __( 'Show Global Sidebar?', 'lucent' ),
				  'subtitle'     => __( 'Choose if you want to use sidebar sitewide.', 'lucent' ),
				  'options'  => array(
					  'no-sidebar' => 'No Sidebar',
					  'left' => 'Left Sidebar',
					  'right' => 'Right Sidebar',
					  'both' => 'Both sidebars',
				  ),
				  'default'  => 'no-sidebar',
			  ),
			  array(
				  'id'        => 'lucent_sidebar_width',
				  'type'      => 'slider',
				  'title'         => __( 'Slider Width', 'lucent' ),
				  'subtitle'      => __( 'Select slider width in %', 'lucent' ),
				  'default'   => 25,
				  'min'       => 1,
				  'step'      => 1,
				  'max'       => 30,
				  'display_value' => 'label',
			  ),
		  ),
	  )
  );
