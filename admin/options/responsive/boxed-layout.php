<?php
  /**
   *
   * Mobile Menu options
   *
   * @package Lucent
   **/

  Redux::setSection(
	  'lucent_opts',
	  array(
		  'id'         => 'lucent_reponsive_boxed',
		  'title'      => __( 'Reponsive Boxed Layout','lucent' ),
		  'icon'       => 'panel-box',
		  'subsection' => true,
		  'fields'       => array(
			  array(
				  'id'        => 'lucent_mobile_boxed_width',
				  'type'      => 'slider',
				  'title'     => __( 'Boxed Layout Width', 'lucent' ),
				  'subtitle'  => __( 'Uses % value.', 'lucent' ),
				  'default'   => 95,
				  'min'       => 0,
				  'step'      => 5,
				  'max'       => 100,
				  'display_value' => 'text',
			  ),
			  array(
				  'id'        => 'lucent_mobile_boxed_margin',
				  'type'      => 'spacing',
				  'mode'           => 'margin',
				  'units'          => array( 'em', 'px' ),
				  'units_extended' => 'true',
				  'title'     => __( 'Boxed Layout Margin', 'lucent' ),
				  'subtitle'  => __( 'Top and Bottom Margin', 'lucent' ),
				  'default'            => array(
					  'margin-top'     => '10px',
					  'margin-right'   => '0',
					  'margin-bottom'  => '10px',
					  'margin-left'    => '0',
					  'units'          => 'px',
				  ),
			  ),
		  ),
	  )
  );
