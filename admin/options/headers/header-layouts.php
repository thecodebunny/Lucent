<?php
  /**
   *
   * Header Layouts options
   *
   * @package Lucent
   **/

  Redux::setSection(
	  'lucent_opts',
	  array(
		  'id'         => 'lucent_header',
		  'title'      => __( 'Header','lucent' ),
		  'desc'       => __( 'Header layout options.','lucent' ),
		  'icon'       => 'panel-browser',
		  'subsection' => true,
		  'fields'     => array(
			  array(
				  'id'         => 'header_position',
				  'type'       => 'select',
				  'title'      => __( 'Header Position','lucent' ),
				  'options'  => array(
					  'top'    => 'Top',
					  'side'   => 'Side',
					  'bottom' => 'Bottom',
					  'hidden' => 'Hidden With Slide, Push or Fullscreen',
				  ),
				  'default'   => 'top',
			  ),
			  array(
				  'id'         => 'header_top',
				  'type'       => 'image_select',
				  'title'      => __( 'Top Header Layouts','lucent' ),
				  'required' => array( 'header_position', '=', 'top' ),
				  'options'  => array(
					  'boxed'      => array(
						  'alt'   => __( 'Boxed Header','lucent' ),
						  'img'   => ReduxFramework::$_url . 'assets/img/header-presets/boxed.png',
					  ),
					  'simple'      => array(
						  'alt'   => __( 'Simple header', 'lucent' ),
						  'img'   => ReduxFramework::$_url . 'assets/img/header-presets/simple.png',
					  ),
					  'logo_left'      => array(
						  'alt'   => __( 'Logo left with Menu below','lucent' ),
						  'img'   => ReduxFramework::$_url . 'assets/img/header-presets/logo-left.png',
					  ),
					  'logo_center_slogan'      => array(
						  'alt'   => __( 'Logo left with Menu below','lucent' ),
						  'img'   => ReduxFramework::$_url . 'assets/img/header-presets/logo_center_slogan.jpg',
					  ),
					  'menu-below'      => array(
						  'alt'   => __( 'Logo Center Menu Below','lucent' ),
						  'img'   => ReduxFramework::$_url . 'assets/img/header-presets/menu-below.png',
					  ),
				  ),
				  'default' => 'simple',
			  ),
			  array(
				  'id'         => 'header_side_position',
				  'type'       => 'image_select',
				  'title'      => __( 'Left Header Layouts','lucent' ),
				  'required' => array( 'header_position', '=', 'side' ),
				  'options'  => array(
					  'left-side'      => array(
						  'alt'   => __( 'Left Side Header','lucent' ),
						  'img'   => ReduxFramework::$_url . 'assets/img/header-presets/left-side.png',
					  ),
					  'right-side'      => array(
						'alt'   => __( 'Right Side Header','lucent' ),
						'img'   => ReduxFramework::$_url . 'assets/img/header-presets/right-side.png',
					  ),
				  ),
				  'default'	=> 'left-side',
			  ),
			  array(
				  'id'         => 'header_bottom',
				  'type'       => 'image_select',
				  'title'      => __( 'Bottom Header Layouts','lucent' ),
				  'required' => array( 'header_position', '=', 'bottom' ),
				  'options'  => array(
					  'boxed'      => array(
						  'alt'   => __( 'Boxed Header','lucent' ),
						  'img'   => ReduxFramework::$_url . 'assets/img/header-presets/boxed.png',
					  ),
					  'simple'      => array(
						  'alt'   => __( 'Simple header', 'lucent' ),
						  'img'   => ReduxFramework::$_url . 'assets/img/header-presets/simple.png',
					  ),
					  'logo_left'      => array(
						  'alt'   => __( 'Logo left with Menu below','lucent' ),
						  'img'   => ReduxFramework::$_url . 'assets/img/header-presets/logo-left.png',
					  ),
					  'logo_center_slogan'      => array(
						  'alt'   => __( 'Logo left with Menu below','lucent' ),
						  'img'   => ReduxFramework::$_url . 'assets/img/header-presets/logo_center_slogan.jpg',
					  ),
				  ),
			  ),
			  array(
				'id'         => 'header_toggle_position',
				'type'       => 'image_select',
				'title'      => __( 'Toggle Position','lucent' ),
				'required' => array( 'header_position', '=', 'hidden' ),
				'options'  => array(
					'top-left'      => array(
						'alt'   => __( 'Top Left','lucent' ),
						'img'   => ReduxFramework::$_url . 'assets/img/header-presets/boxed.png',
					),
					'top-right'      => array(
						'alt'   => __( 'Top Right','lucent' ),
						'img'   => ReduxFramework::$_url . 'assets/img/header-presets/boxed.png',
					),
					'left'      => array(
						'alt'   => __( 'Left', 'lucent' ),
						'img'   => ReduxFramework::$_url . 'assets/img/header-presets/simple.png',
					),
					'right'      => array(
						'alt'   => __( 'Right','lucent' ),
						'img'   => ReduxFramework::$_url . 'assets/img/header-presets/logo-left.png',
					),
				),
				'default'	=> 'left',
			),
			  array(
				  'id'         => 'header_hidden',
				  'type'       => 'select',
				  'title'      => __( 'Hidden Header Style','lucent' ),
				  'required' => array( 'header_position', '=', 'hidden' ),
				  'options'  => array(
					'slide'      => 'Slide/Push Animations',
					'full'       => 'Full Screen',
				  ),
				  'default'   => 'slide',
			  ),
			array(
				'id'         => 'header_hidden_slide',
				'type'       => 'select',
				'title'      => __( 'Slide Animation Directon','lucent' ),
				'required' => array( 
					array('header_position', '=', 'hidden'),
					array('header_hidden', '=', 'slide'),
				),
				'options'  => array(
				  'left'      => 'Slide From Left',
				  'right'     => 'Slide From Right',
				  'top'       => 'Slide From Top',				  
				),
				'default'   => 'left',
			 ),
			array(
				  'id'       => 'lucent_hidden_fx',
				  'type'         => 'select',
				  'title'      => __( 'Hidden Header Fx', 'lucent' ),
				  'required' => array( 'header_hidden', '=', 'slide' ),
				  'options'  => array(
					  'simpleslide'     => 'Static over content',
					  'reveal'      => 'Slide Reveal',
					  'push'     => 'Content Push',
					  'slidealong'     => 'Slide Along',
					  'reverseslide'     => 'Slider Slide Reverse',
					  'rotate3din'     => 'Header 3D rotate in',
					  'rotate3dout'     => 'Header 3D rotate out',
					  'scaledowncontent'     => 'Content Scale out',
					  'scaleup'     => 'Header Scale Up',
					  'scalerotate'     => 'Content Scale Up & Rotate',
					  'slidedown'     => 'Header slide down',
					  'delay3d'     => 'Header 3D Rotate with delay',
				  ),
				  'default'   => 'rotate3din',
			),
			array(
				  'id'       => 'lucent_hidden_fullfx',
				  'type'         => 'select',
				  'title'      => __( 'FullScreen Header Fx', 'lucent' ),
				  'required' => array( 'header_hidden', '=', 'full' ),
				  'options'  => array(
					  'overlay'     => 'Reveal Overlay with small boxes',
					  'slide'      => 'Full Screen Slide',
				  ),
				  'default'   => 'overlay',
			),

			array(
				'id'         => 'header_hiddenfull_slide',
				'type'       => 'select',
				'title'      => __( 'Slide Animation Directon','lucent' ),
				'required' => array( 
					array('header_position', '=', 'hidden'),
					array('header_hidden', '=', 'full'),
					array('lucent_hidden_fullfx', '=', 'slide'),
				),
				'options'  => array(
				  'left'      => 'Slide From Left',
				  'right'     => 'Slide From Right',
				),
				'default'   => 'left',
			 ),
			array(
				  'id'       => 'lucent_hiddenfull_fx',
				  'type'         => 'select',
				  'title'      => __( 'Hidden Fullscreen Header Fx', 'lucent' ),
				  'required' => array( 'lucent_hidden_fullfx', '=', 'slide' ),
				  'options'  => array(
					  'simpleslide'     => 'Static over content',
					  'reveal'      => 'Slide Reveal',
					  'push'     => 'Content Push',
					  'reverseslide'     => 'Slider Slide Reverse',
					  'rotate3din'     => 'Header 3D rotate in',
					  'rotate3dout'     => 'Header 3D rotate out',
					  'scaleup'     => 'Header Scale Up',
					  'slidedown'     => 'Header slide down',
					  'delay3d'     => 'Header 3D Rotate with delay',
				  ),
				  'default'   => 'rotate3din',
			),
			array(
				  'id'       => 'lucent_hidden_overlayfx',
				  'type'         => 'select',
				  'title'      => __( 'FullScreen Header Fx', 'lucent' ),
				  'required' => array( 'header_hidden', '=', 'full' ),
				  'required' => array( 'lucent_hidden_fullfx', '=', 'overlay' ),
				  'options'  => array(
					  'boxflip'     => 'Flip Boxes',
					  'boxslide'      => 'Slide Boxes',
					  'boxscaleup'     => 'Scale Up Boxes',
					  'boxscaledown'     => 'Boxes Scaled Down',
				  ),
				  'default'   => 'boxflip',
			),
			array(
			  'id'         => 'lucent_hiddenside_width',
			  'type'       => 'dimensions',
			  'height'	 => 'false',
			  'units'      => array('em','px','%'),
			  'units_extended' => 'true',
			  'title'      => __( 'Hidden header side width','lucent' ),
			  'required' => array(
				  array( 'header_position', '=', 'hidden' ),
				  array( 'header_hidden_slide', '!=', 'top' ),
				  array( 'header_hidden_slide', '!=', 'bottom' ),
				),
			  'default'    => array(
				  'width'=>'18',
				  'units'=>'%',
			  ),
			  ),
			  array(
			  'id'         => 'lucent_hidden_height',
			  'type'       => 'dimensions',
			  'width'	 => 'false',
			  'units'      => array('em','px','%'),
			  'units_extended' => 'true',
			  'title'      => __( 'Hidden header height','lucent' ),
			  'required' => array(
				  array( 'header_position', '=', 'hidden' ),
				  array( 'header_hidden_slide', '!=', 'left' ),
				  array( 'header_hidden_slide', '!=', 'right' ),
				),
			  'default'    => array(
				  'height'=>'160',
				  'units'=>'px',
			  ),
		  	),
			array(
				'id'       => 'lucent_hidden_shadow',
				'type'         => 'button_set',
				'title'      => __( 'Shadow', 'lucent' ),
				'subtitle'     => __( 'Show shadow?.', 'lucent' ),
				'required' => array( 'header_position', '=', 'hidden' ),
				'options'  => array(
					'yes'   => 'Yes',
					'no'    => 'No',
				),
				'default'   => 'no',
			),
			array(
				'id'       => 'lucent_topheader_shadow',
				'type'         => 'button_set',
				'title'      => __( 'Top Header Shadow', 'lucent' ),
				'required' => array( 'header_position', '=', 'top' ),
				'options'  => array(
					'yes'   => 'Yes',
					'no'    => 'No',
				),
				'default'   => 'yes',
			),
			array(
				'id'         => 'lucent_topshadow_style',
				'type'       => 'image_select',
				'title'      => __( 'Topheader shadow Style','lucent' ),
				'width'		 => '40%',
				'required'	 => array(
					array( 'lucent_topheader_shadow','=','yes' ),
					array( 'header_position', '=', 'top' ),
				),
				'options'  => array(
					''      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/1.png',
					),
					'avdbox1'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/1.png',
					),
					'avdbox2'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/2.png',
					),
					'avdbox3'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/3.png',
					),
					'avdbox4'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/4.png',
					),
					'avdbox5'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/5.png',
					),
					'avdbox6'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/6.png',
					),
					'avdbox7'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/7.png',
					),
					'avdbox8'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/8.png',
					),
				),
				'default' => 'avdbox6',
			),
			  array(
				  'id'       => 'lucent_menu_uppercase',
				  'type'         => 'button_set',
				  'title'      => __( 'Transform Uppercase', 'lucent' ),
				  'subtitle'     => __( 'Transform menu fonts to uppercase?', 'lucent' ),
				  'required' => array( 'header_position', '=', 'top' ),
				  'options'  => array(
					  'yes'   => 'Yes',
					  'no'    => 'No',
				  ),
				  'default'   => 'yes',
			  ),
			  array(
				  'id'       => 'lucent_menu_sticky',
				  'type'         => 'button_set',
				  'title'      => __( 'Enable Sticky Menu?', 'lucent' ),
				  'subtitle'     => __( 'Switch on sticky menu?', 'lucent' ),
				  'required' => array( 'header_position', '=', 'top' ),
				  'options'  => array(
					  'true'   => 'Yes',
					  'false'    => 'No',
				  ),
				  'default'   => 'true',
			  ),
			  array(
				  'id'       => 'lucent_sticky_shadow',
				  'type'         => 'button_set',
				  'title'      => __( 'Sticky Header Shadow', 'lucent' ),
				  'required' => array( 'header_position', '=', 'top' ),
				  'options'  => array(
					  'true'  => 'Yes',
					  'false'     => 'No',
				  ),
				  'default'   => 'true',
			  ),
			  array(
				  'id'       => 'lucent_sticky_animation',
				  'type'         => 'select',
				  'title'      => __( 'Animation Type', 'lucent' ),
				  'required' => array( 'header_position', '=', 'top' ),
				  'options'  => array(
					  'slide'     => 'Slide',
					  'fade'      => 'Fade',
				  ),
				  'default'   => 'slide',
			  ),
			  array(
				  'id'       => 'lucent_sticky_bg',
				  'type'         => 'color_rgba',
				  'title'      => __( 'Choose sticky nav background color.', 'lucent' ),
				  'subtitle'     => __( 'You can also set up transparency.', 'lucent' ),
				  'required' => array( 'header_position', '=', 'top' ),
				  'default'   => array(
					  'color'     => '#FFF',
					  'alpha'     => 0.95,
				  ),
				  'options'  => array(
					  'show_input'                => true,
					  'show_initial'              => true,
					  'show_alpha'                => true,
					  'show_palette'              => true,
					  'show_palette_only'         => false,
					  'show_selection_palette'    => true,
					  'max_palette_size'          => 10,
					  'allow_empty'               => true,
					  'clickout_fires_change'     => false,
					  'choose_text'               => 'Choose',
					  'cancel_text'               => 'Cancel',
					  'show_buttons'              => true,
					  'use_extended_classes'      => true,
					  'palette'                   => null,  // show default.
					   'input_text'                => 'Select Sticky Nav BG Color',
				  ),
				  'output' => array(
					  'background' => '.header-is-sticky',
				  ),
			  ),
			  array(
				  'id'       => 'lucent_mobile_sticky',
				  'type'         => 'button_set',
				  'title'      => __( 'Show Sticky Menu on mobile?', 'lucent' ),
				  'required' => array( 'header_position', '=', 'top' ),
				  'options'  => array(
					  'yes'   => 'Yes',
					  'no'    => 'No',
				  ),
				  'default'   => 'yes',
			  ),
			  array(
				'id'       => 'lucent_side_topbar',
				'type'         => 'button_set',
				'title'      => __( 'Topbar', 'lucent' ),
				'subtitle'     => __( 'Show topbar?.', 'lucent' ),
				'required' => array( 'header_position', '=', 'side' ),
				'options'  => array(
					'yes'   => 'Yes',
					'no'    => 'No',
				),
				'default'   => 'yes',
			),
			array(
				'id'       => 'lucent_side_topbar_select',
				'type'         => 'button_set',
				'title'      => __( 'Select Topbar', 'lucent' ),
				'required' => array( 'header_position', '=', 'side' ),
				'options'  => array(
					'global'    => 'Global Topbar',
					'inside'    => 'Inside Side Header',
				),
				'default'   => 'inside',
			),
			array(
			  'id'         => 'lucent_sideheader_width',
			  'type'       => 'dimensions',
			  'height'	 => 'false',
			  'units'      => array('em','px','%'),
			  'units_extended' => 'true',
			  'title'      => __( 'Side Header Width','lucent' ),
			  'required' => array( 'header_position', '=', 'side' ),
			  'default'    => array(
				  'width'=>'18',
				  'units'=>'%',
			  ),
		  	),
			array(
				'id'       => 'lucent_side_shadow',
				'type'         => 'button_set',
				'title'      => __( 'Shadow', 'lucent' ),
				'subtitle'     => __( 'Show shadow?.', 'lucent' ),
				'required' => array( 'header_position', '=', 'side' ),
				'options'  => array(
					'yes'   => 'Yes',
					'no'    => 'No',
				),
				'default'   => 'no',
			),
		  ),
	)
);
