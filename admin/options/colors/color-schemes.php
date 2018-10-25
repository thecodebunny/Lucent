<?php
  /**
   * Color Schemes options
   *
   * @package Lucent
   * @since 1.1
   */

  Redux::setSection(
	  'lucent_opts',
	  array(
		  'id'    => 'color_schemes',
		  'title' => __( 'Color Schemes','lucent' ),
		  'icon'  => 'panel-diamond',
		  'subsection' => true,
		  'fields' => array(
			  array(
				  'id'       => 'global_color_presets',
				  'type'     => 'image_select',
				  'presets'  => true,
				  'title'    => __( 'Color Presets', 'lucent' ),
				  'default'  => '',
				  'options'  => array(
					  // Array of preset options.
					  'solid_cement'      => array(
						  'alt'   => 'Solid Cement',
						  'img'   => ReduxFramework::$_url . 'assets/color-schemes/solid-cement.jpg',
						  'presets'   => array(
							  'lucent_header_bg'     => '#5b6871',
							  'lucent_content_bg'         => '#204160',
							  'lucent_footer_bg'         => '#5b6871',
							  'lucent_buttons_bg'       => '#f2b632',
							  'lucent_select_bg'              => '#f2b632',
							  'lucent_fonts_color'              => '#d0d0d0',
							  'lucent_links_color'            => '#f2b632',
							  'admin_topbar_bg'               => '#204160',
							  'admin_topbar_links'            => '#204160',
							  'admin_icons_color'             => '#FFF',
						  ),
					  ),
				  ),
			  ),
		  ),
	  )
  );
