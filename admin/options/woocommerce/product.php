<?php
  /**
   *
   * Product Page Options
   *
   * @package Lucent
   **/

  Redux::setSection(
	  'lucent_opts',
	  array(
		  'id'         => 'lucent_woocommerce_product_page',
		  'title'      => __( 'Product Page Options','lucent' ),
		  'desc'         => __( 'Setup options for your single product page here.', 'lucent' ),
		  'icon'       => 'panel-document',
		  'subsection' => true,
		  'fields'     => array(
			  array(
				  'id'       => 'lucent_product_page',
				  'type'         => 'select',
				  'title'      => __( 'Product page layout', 'lucent' ),
				  'desc'     => __( 'Choose single product page layout.', 'lucent' ),
				  'options'  => array(
					  'standard'      => 'Standard WooCommerce Style',
					  'elegant'   => 'Elegant Lucent Theme Style',
				  ),
				  'default'   => 'elegant',
			  ),
			  array(
				  'id'       => 'lucent_plus_minus',
				  'type'         => 'button_set',
				  'title'      => __( 'Plus minus buttons?', 'lucent' ),
				  'desc'     => __( 'Show plus minus buttons for quantity input?', 'lucent' ),
				  'options'  => array(
					  'yes'       => 'Yes',
					  'no'    => 'No',
				  ),
				  'default'   => 'yes',
			  ),
			  array(
				  'id'       => 'lucent_woo_single_countdown',
				  'type'         => 'button_set',
				  'title'      => __( 'Show product sale countdown?', 'lucent' ),
				  'options'  => array(
					  'show'  => 'Show',
					  'dont'  => 'Don\'t show',
				  ),
				  'default'   => 'show',
			  ),
			  array(
				  'id'       => 'lucent_countdown_theme',
				  'type'         => 'select',
				  'title'      => __( 'Countdown Theme', 'lucent' ),
				  'required' => array( 'lucent_woo_single_countdown', '=', 'show' ),
				  'options'  => array(
					  'transparent'         => 'Transparent',
					  'white'             => 'white',
					  'black'             => 'Black',
					  'red'               => 'Red',
					  'flat'              => 'Flat',
					  'custom'            => 'Custom',
				  ),
				  'default'   => 'transparent',
			  ),
			  array(
				  'id'       => 'lucent_elegant_images',
				  'type'         => 'button_set',
				  'title'      => __( 'Images Position', 'lucent' ),
				  'desc'         => __( 'Choose position for images on product page.', 'lucent' ),
				  'required' => array( 'lucent_product_page', '=', 'elegant' ),
				  'options'  => array(
					  'left'      => 'Left',
					  'right'     => 'Right',
				  ),
				  'default'   => 'left',
			  ),

			  array(
				  'id'       => 'lucent_woo_carousel',
				  'type'         => 'button_set',
				  'title'      => __( 'Carousel', 'lucent' ),
				  'desc'     => __( 'Option No will work only with standard WooCommerce page option chosen.', 'lucent' ),
				  'options'  => array(
					  'yes'   => 'Yes',
					  'no'    => 'No',
				  ),
				  'default'   => 'yes',
			  ),
			  array(
				  'id'       => 'lucent_woo_tabs',
				  'type'         => 'button_set',
				  'title'      => __( 'Wocommerce tabs styles', 'lucent' ),
				  'desc'     => __( 'Choose style for WooCommerce tabs.', 'lucent' ),
				  'options'  => array(
					  'vertical'  => 'Vertical Tabs',
					  'smaccordion'   => 'Smart Jquery Accordion',
					  'standard'  => 'Standard Tabs',
				  ),
				  'default'   => 'smaccordion',
			  ),
			  array(
				  'id'       => 'lucent_woo_pagination',
				  'type'         => 'button_set',
				  'title'      => __( 'Pagination', 'lucent' ),
				  'desc'     => __( 'Show next previous product navigation?', 'lucent' ),
				  'options'  => array(
					  'yes'   => 'Yes',
					  'no'    => 'No',
				  ),
				  'default'   => 'yes',
			  ),
			  array(
				  'id'       => 'lucent_woo_recent_products',
				  'type'         => 'button_set',
				  'title'      => __( 'Recent Viewed', 'lucent' ),
				  'desc'         => __( 'Show recently viewed products?', 'lucent' ),
				  'options'  => array(
					  'yes'   => 'Yes',
					  'np'    => 'No',
				  ),
				  'default'   => 'yes',
			  ),
			  array(
				  'id'        => 'lucent_woo_related_products',
				  'type'        => 'button_set',
				  'title'     => __( 'Related Products', 'lucent' ),
				  'desc'  => __( 'Show related products on single product pages?', 'lucent' ),
				  'options'   => array(
					  'yes'   => 'Show',
					  'no'    => 'Don\'t show',
				  ),
				  'default'   => 'yes',
			  ),


			  array(
				  'id'        => 'lucent_woo_upsells_products',
				  'type'        => 'button_set',
				  'title'     => __( 'Upsells', 'lucent' ),
				  'desc'  => __( 'Show upsells products on single product pages?', 'lucent' ),
				  'options'   => array(
					  'yes'   => 'Show',
					  'no'    => 'Don\'t show',
				  ),
				  'default'   => 'yes',
			  ),
			  array(
				  'id'        => 'lucent_woo_crossells_products',
				  'type'        => 'button_set',
				  'title'     => __( 'Cross Sells', 'lucent' ),
				  'desc'  => __( 'Show Cross sells products on cart page?', 'lucent' ),
				  'options'   => array(
					  'yes'   => 'Show',
					  'no'    => 'Don\'t show',
				  ),
				  'default'   => 'yes',
			  ),
			  array(
				  'id'        => 'lucent_woo_review_color',
				  'type'        => 'color',
				  'title'     => __( 'Review Stars Color', 'lucent' ),
				  'desc'  => __( 'Choose product review stars color.', 'lucent' ),
				  'validate'  => 'color',
				  'default'   => '#0b7da3',
				  'output'    => array(
					  'color'     => '.woocommerce p.stars a',
				  ),
			  ),
			  array(
				  'id'       => 'lucent_woo_tabs_bg',
				  'type'         => 'color_rgba',
				  'title'      => __( 'Tab background', 'lucent' ),
				  'output'   => array(
					  'background-color' => '.lucent-accordion-item-active .lucent-accordion-header',
				  ),
				  'options'    => array(
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
				  'input_text'                => 'Select Color',
				  ),
				  'default'   => array(
					  'color'     => '#0B7DA3',
				  ),
			  ),
		  ),
	  )
  );
