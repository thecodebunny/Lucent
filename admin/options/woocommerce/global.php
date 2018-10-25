<?php
  /**
   *
   * WooCommerce Global options
   *
   * @package Lucent
   **/

  Redux::setSection(
	  'lucent_opts',
	  array(
		  'id'         => 'lucent_woocommerce_global',
		  'title'      => __( 'Global Shop Options','lucent' ),
		  'icon'       => 'panel-globe',
		  'subsection' => true,
		  'fields'     => array(
			  array(
				  'id'        => 'lucent_woo_cart_icon',
				  'type'      => 'cart_icons',
				  'title'     => __( 'Select Cart Icon.', 'redux-framework' ),
				  'default'   => 'avd-basket',
				  'ajax_save' => true,
			  ),
			  array(
				  'id'       => 'lucent_disable_cart',
				  'type'         => 'button_set',
				  'title'      => __( 'Disable cart?', 'lucent' ),
				  'desc'         => __( 'Good idea if you are using WooCommerce in demo or catalog mode.', 'lucent' ),
				  'options'  => array(
					  'yes'   => 'Yes',
					  'no'    => 'No',
				  ),
				  'default'   => 'no',
			  ),
			array(
				'id'         => 'lucent_addtocart_ajax',
				'type'       => 'switch',
				'title'      => __( 'Enable Ajax?', 'lucent' ),
				'desc'		 => __( 'Enable advanced ajax add to cart buttons?' , 'lucent' ),
				'default'   => true,
			),
			  array(
				  'id'       => 'lucent_fancy_cart',
				  'type'         => 'select',
				  'title'      => __( 'Mini Cart Style', 'lucent' ),
				  'desc'         => __( '', 'lucent' ),
				  'options'  => array(
					  'slideout'  => 'Slide/Push Out',
					  'popup'     => 'Pupup',
				  ),
				  'default'   => 'slideout',
			  ),
			  array(
				'id'         => 'lucent_fancycart_slide',
				'type'       => 'select',
				'title'      => __( 'Slide/Push Animation Directon','lucent' ),
				'required' => array( 'lucent_fancy_cart', 'equals', 'slideout' ),
				'options'  => array(
				  'left'      => 'Slide From Left',
				  'right'     => 'Slide From Right',
				),
				'default'   => 'left',
			 ),
			  array(
				  'id'       => 'lucent_slidecart_fx',
				  'type'         => 'select',
				  'title'      => __( 'Sliding Cart Fx', 'lucent' ),
				  'required' => array( 'lucent_fancy_cart', 'equals', 'slideout' ),
				  'options'  => array(
					  'simpleslide'     => 'Static over content',
					  'push'     => 'Content Push',
					  'reverseslide'     => 'Slider Slide Reverse',
					  '3drotatein'     => 'Cart 3D rotate in',
					  '3drotateout'     => 'Cart 3D rotate out',
					  'scaledowncontent'     => 'Content Scale out',
					  'scaleup'     => 'Cart Scale Up',
					  'scalerotate'     => 'Content Scale Up & Rotate',
					  'slidedown'     => 'Cart slide down',
					  '3ddelay'     => 'Cart 3D Rotate with delay',
				  ),
				  'default'   => 'scaledown',
			),
			array(
			  'id'         => 'lucent_slidecart_width',
			  'type'       => 'dimensions',
			  'height'	 => 'false',
			  'units'      => array('em','px','%'),
			  'units_extended' => 'true',
			  'title'      => __( 'Slide cart width','lucent' ),
			  'required' => array(
				  array( 'lucent_fancy_cart', 'equals', 'slideout' ),
				),
			  'default'    => array(
				  'width'=>'25',
				  'units'=>'%',
			  ),
			  ),
			  array(
				  'id'       => 'lucent_fancy_cart_in',
				  'type'         => 'select',
				  'title'      => __( 'Fancy Cart In', 'lucent' ),
				  'desc'         => __( 'Choose Fancy Cart In Animation', 'lucent' ),
				  'required' => array( 'lucent_fancy_cart', '=', 'popup' ),
				  'options'  => array(
					  'comingIn'    => 'Come In',
					  'bounceInDown'    => 'Bounce In Down',
					  'bounceInUp'     => 'Bounce In Up',
					  'fadeInDown'    => 'Fade In Down',
					  'fadeInUp'     => 'Fade In Up',
					  'fadeInLeft'    => 'Fade In Left',
					  'fadeInRight'   => 'Fade In Right',
					  'flipInX'   => 'Flip In X',
				  ),
				  'default'   => 'bounceInUp',
			  ),
			  array(
				  'id'       => 'lucent_fancy_cart_out',
				  'type'         => 'select',
				  'title'        => __( 'Fancy Cart Out', 'lucent' ),
				  'required' => array( 'lucent_fancy_cart', '=', 'popup' ),
				  'desc'         => __( 'Choose Fancy Cart Out Animation', 'lucent' ),
				  'options'  => array(
					  'comingOut'   => 'Go Out',
					  'bounceOutDown'   => 'Bounce Out Down',
					  'bounceOutUp'    => 'Bounce Out Up',
					  'fadeOutLeft'   => 'Fade Out Left',
					  'fadeOutDown'    => 'Fade Out Down',
					  'fadeOutUp'  => 'Fade Out Up',
					  'fadeOutRight'     => 'Fade Out Right',
					  'flipOutX'  => 'Flip Out X',
				  ),
				  'default'   => 'bounceOutDown',
			  ),
			  array(
				  'id'       => 'lucent_woo_breadcrumb',
				  'type'         => 'button_set',
				  'title'      => __( 'Show breadcrumbs?', 'lucent' ),
				  'options'  => array(
					  'show'  => 'Show',
					  'dont'  => 'Don\'t show',
				  ),
				  'default'   => 'show',
			  ),
			  array(
				  'id'       => 'lucent_breadcrumb_style',
				  'type'         => 'select',
				  'title'      => __( 'Breadcrumb Style', 'lucent' ),
				  'desc'         => __( 'Choose appearance of breadcrumbs', 'lucent' ),
				  'required' => array( 'lucent_woo_breadcrumb', '=', 'show' ),
				  'options'  => array(
					  'simple'            => 'Simple',
					  'tabs'              => 'Tabs style',
					  'triangle'          => 'Triangle',
				  ),
				  'default'   => 'triangle',
			  ),
		  ),
	  )
  );
