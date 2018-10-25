<?php
  /**
   *
   *
   * Individual Color Options
   *
   * @package Lucent
   */

	  Redux::setSection(
		  'lucent_opts',
		  array(
			  'id'         => 'lucent_header_colors',
			  'title'      => __( 'Header & Navigation','lucent' ),
			  'icon'       => 'panel-paintbrush',
			  'subsection' => true,
			  'fields'     => array(
				  array(
					  'id'       => 'lucent_header_bg',
					  'type'         => 'color',
					  'title'      => __( 'Header Background', 'lucent' ),
					  'default'  => '#74AFAD',
				  ),
				  array(
					  'id'       => 'lucent_nav_fonts',
					  'type'         => 'color',
					  'title'      => __( 'Navigation Fonts', 'lucent' ),
					  'default'  => '#ECECEA',
				  ),
				  array(
					  'id'       => 'lucent_nav_hover_fonts',
					  'type'         => 'color',
					  'title'      => __( 'Navigation Fonts', 'lucent' ),
					  'default'  => '#ECECEA',
				  ),
				  array(
					  'id'       => 'lucent_submenu_bg',
					  'type'         => 'color_rgba',
					  'title'      => __( 'Submenu Background', 'lucent' ),
					  'default'   => array(
						  'color'     => '#558C89',
						  'alpha'     => 0.86,
					  ),
				  ),
				  array(
					  'id'       => 'lucent_submenu_border',
					  'type'         => 'border',
					  'title'      => __( 'Submenu Border', 'lucent' ),
					  'default'  => array(
						  'border-color'  => '#ECECEA',
						  'border-style'  => 'solid',
						  'border-top'    => '1px',
						  'border-right'  => '1px',
						  'border-bottom' => '1px',
						  'border-left'   => '1px',
					  ),
				  ),
				  array(
					  'id'       => 'lucent_submenu_fonts',
					  'type'         => 'color',
					  'title'      => __( 'Submenu Fonts', 'lucent' ),
					  'default'  => '#ECECEA',
				  ),
				  array(
					  'id'       => 'lucent_submenu_hover_fonts',
					  'type'         => 'color',
					  'title'      => __( 'Submenu Fonts Hover Color', 'lucent' ),
					  'default'  => '#ECECEA',
				  ),
				  array(
					  'id'       => 'lucent_submenu_hover_link_bg',
					  'type'         => 'color_rgba',
					  'title'      => __( 'Submenu Hover Link Background', 'lucent' ),
					  'default'   => array(
						  'color'     => '#558C89',
						  'alpha'     => 0.86,
					  ),
				  ),
			  ),
		  )
	  );
