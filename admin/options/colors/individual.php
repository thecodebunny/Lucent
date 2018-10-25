<?php
  /**
   *
   * Individual Color Options
   *
   * @package Lucent
   */

  Redux::setSection(
	  'lucent_opts',
	  array(
		  'id'         => 'lucent_colors',
		  'title'      => __( 'Theme Colors','lucent' ),
		  'icon'       => 'panel-paintbrush',
		  'subsection' => true,
		  'fields'     => array(
			  array(
				  'id'       => 'lucent_header_bg',
				  'type'         => 'color',
				  'title'      => __( 'Header Background', 'lucent' ),
				  'default'  => '#47535c',
			  ),
			  array(
				  'id'       => 'lucent_content_bg',
				  'type'         => 'color',
				  'title'      => __( 'Content Background', 'lucent' ),
				  'output'   => array(
					  'background-color' => 'body, #content',
				  ),
				  'default'  => '#FFF',
			  ),
			  array(
				  'id'       => 'lucent_footer_bg',
				  'type'         => 'color',
				  'title'      => __( 'Header Background', 'lucent' ),
				  'output'   => array(
					  'background-color' => '#colophon',
				  ),
				  'default'  => '#47535c',
			  ),

			  array(
				  'id'       => 'lucent_buttons_bg',
				  'type'         => 'color',
				  'title'      => __( 'Buttons Background', 'lucent' ),
				  'default'  => '#f2b632',
			  ),
			  array(
				  'id'       => 'lucent_select_bg',
				  'type'      => 'color_rgba',
				  'title'     => 'Select Fields Background',
				  'output'   => array(
					  'background-color' => 'select, .asHolder',
				  ),
				  'default'   => array(
					  'color'     => '#f2b632',
					  'alpha'     => 0.7,
				  ),
			  ),
			  array(
				  'id'       => 'lucent_fonts_color',
				  'type'         => 'color',
				  'title'      => __( 'Fonts Color', 'lucent' ),
				  'default'  => '#d0d0d0',
			  ),

			  array(
				  'id'       => 'lucent_links_color',
				  'type'         => 'color',
				  'title'      => __( 'Links Color', 'lucent' ),
				  'default'  => '#f2b632',
			  ),
		  ),
	  )
  );
