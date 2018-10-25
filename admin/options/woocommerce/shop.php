<?php
/**
 * Shop Page Options
 *
 * @package Lucent
 **************************************/

Redux::setSection(
	'lucent_opts',
	array(
		'id'         => 'lucent_woocommerce_shop_page',
		'title'      => __( 'Shop Page Options','lucent' ),
		'icon'       => 'panel-document',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'         => 'lucent_products_per_page',
				'type'       => 'text',
				'title'      => __( 'No. of Products', 'lucent' ),
				'desc'       => __( 'Choose number of products shown on Shop and Category pages.', 'lucent' ),
				'validate'   => 'number',
				'default'   => '-1',
			),
			array(
				'id'         => 'lucent_shop_page',
				'type'       => 'select',
				'title'      => __( 'Shop page design', 'lucent' ),
				'desc'   => __( 'Choose shop page design.', 'lucent' ),
				'options'    => array(
					'standard'      => 'Standard Shop Page Style',
					'flat'          => 'Flat Lucent Theme Style',
				),
				'default'   => 'standard',
			),
			array(
				'id'         => 'lucent_cart_text',
				'type'       => 'text',
				'title'      => __( 'Add to cart text', 'lucent' ),
				'desc'       => __( 'Change default add to cart text','lucent' ),
				'default'   => 'Add To Cart',
			),
			array(
				'id'         => 'lucent_woo_title',
				'type'       => 'switch',
				'title'      => __( 'Show shop title?', 'lucent' ),
				'default'   => true,
			),
			array(
				'id'         => 'lucent_woo_addtocart',
				'type'       => 'switch',
				'title'      => __( 'Enable Global Add To Cart Button', 'lucent' ),
				'desc'   => __( 'Show add to cart button for all products including variable, grouped and external products', 'lucent' ),
				'default'   => true,
			),
			array(
				'id'         => 'lucent_compact_product',
				'type'       => 'switch',
				'title'      => __( 'Enable Compact Product View?', 'lucent' ),
				'default'   => true,
			),
			array(
				'id'         => 'lucent_woo_loop_rating',
				'type'       => 'switch',
				'title'      => __( 'Show product rating?', 'lucent' ),
				'default'   => true,
			),
			array(
				'id'         => 'lucent_loop_rating_color',
				'type'       => 'color_rgba',
				'title'      => __( 'Rating Stars Color', 'lucent' ),
				'output'    => array(
					'color' => '.woocommerce .star-rating span:before',
				),
				'default'   => array(
					'color'     => '#999999',
					'alpha'     => 0.8,
				),
			),
			array(
				'id'         => 'lucent_loop_word_count',
				'type'       => 'spinner',
				'title'      => __( 'Limit Word Count', 'lucent' ),
				'description' => __( 'Limit Product Description', 'lucent' ),
				'default'    => '55',
				'step'       => '5',
			),
			array(
				'id'         => 'lucent_woo_countdown',
				'type'       => 'switch',
				'title'      => __( 'Show product sale countdown?', 'lucent' ),
				'default'   => true,
			),

			array(
				'id'         => 'lucent_woo_desc',
				'type'       => 'switch',
				'title'      => __( 'Show Description?', 'lucent' ),
				'desc'       => __( 'Show description under product thumbnail?','lucent' ),
				'default'   => false,
			),
			array(
				'id'         => 'lucent_woo_filter',
				'type'       => 'switch',
				'title'      => __( 'Show Filter?', 'lucent' ),
				'desc'       => __( 'Show Category Filter?','lucent' ),
				'default'   => true,
			),

			array(
				'id'         => 'lucent_added_to_cart',
				'type'       => 'switch',
				'title'      => __( 'Show Popup?', 'lucent' ),
				'desc'       => __( 'Show a popup window when product is added to cart?','lucent' ),
				'default'   => true,
			),

			array(
				'id'           => 'lucent_shop_layout',
				'type'         => 'select',
				'title'        => __( 'Shop layout', 'lucent' ),
				'subtitle'     => __( 'Choose shop page layout.', 'lucent' ),
				'desc'         => __( 'Choose between the number of columns (grid) or masonry layout.','lucent' ),
				'options'  => array(
					'list'      => 'List',
					'grid'      => 'Simple Columns',
					'lucent-masonry grid'      => 'Masonry / Isotop',
					),
					'default'	=> 'lucent-masonry grid',
				),
				'default' => 'lucent-masonry grid',
			array(
				'id'         => 'lucent_shop_columns',
				'type'       => 'select',
				'title'      => __( 'Number Of Columns', 'lucent' ),
				'desc'       => __( 'Choose number of columns.', 'lucent' ),
				'required'   => array( 'lucent_shop_layout', '!=', 'list' ),
				'options'    => array(
					'col-2'     => '2 Columns',
					'col-3'     => '3 Columns',
					'col-4'     => '4 Columns',
					'col-5'     => '5 Columns',
					'col-6'     => '6 Columns',
				),
				'default'   => 'col-4',
			),
			array(
				'id'         => 'lucent_item_style',
				'type'       => 'image_select',
				'title'      => __( 'Item Style','lucent' ),
				'width'		 => '40%',
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
				'default' => '',
			),
			array(
               'id'  	    => 'lucent_flat_hover',
               'type'     	=> 'button_set',
			   'title'     	=> __('Enable Hover Style for Flat Style?', 'lucent'),
               'options' 	=> array(
					        'yes' 	=> 'Yes',
					        'no' 	=> 'No'
					     ),
					    'default' 	=> 'yes'
			),
			array(
				  'id'       => 'lucent_compact_in',
				  'type'         => 'select',
				  'title'      => __( 'Compact Product In', 'lucent' ),
				  'desc'         => __( 'Choose Compact Product In Animation', 'lucent' ),
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
				  'default'   => 'flipInX',
			  ),
			  array(
				  'id'       => 'lucent_compact_out',
				  'type'         => 'select',
				  'title'        => __( 'Compact Product Out', 'lucent' ),
				  'desc'         => __( 'Choose Compact Product Out Animation', 'lucent' ),
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
				  'default'   => 'flipInOut',
			  ),
			array(
				'id'       => 'lucent_woo_hover_images',
				'type'     => 'select',
				'title'    => __( 'Images Hover Effects', 'lucent' ),
				'desc'     => __( '', 'lucent' ),
				'options'  => array(
					'links'     => 'Product Links',
					'image'     => 'Secondary Product Image',
				),
				'default'  => 'links',
			),
			array(
				'id'       => 'lucent_woo_hover_styles',
				'type'     => 'image_select',
				'title'    => __( 'Image hover styles', 'lucent' ),
				'desc'     => __( 'Select what happens on image hover.', 'lucent' ),
				'required' => array('lucent_woo_hover_images','=','links'),
				'width'	   => '30%',
				'class'	   => 'lucent-hover-title',
				'options'  => array(
					'effect1'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/1.png',
					),
					'effect2'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/1.png',
					),
					'effect3'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/2.png',
					),
					'effect4'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/3.png',
					),
					'effect5'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/4.png',
					),
					'effect6'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/5.png',
					),
					'effect7'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/6.png',
					),
					'effect8'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/7.png',
					),
					'effect9'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/8.png',
					),
					'effect10'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/8.png',
					),
					'effect11'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/8.png',
					),
					'effect12'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/8.png',
					),
					'effect13'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/8.png',
					),
					'effect14'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/8.png',
					),
					'effect15'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/8.png',
					),
					'effect16'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/8.png',
					),
					'effect17'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/4.png',
					),
					'effect18'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/4.png',
					),
					'effect19'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/4.png',
					),
					'effect20'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/4.png',
					),
					'effect21'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/4.png',
					),
				),
				'default'  => 'effect1',
			),
			array(
				'id'         => 'lucent_links_1',
				'type'       => 'select',
				'title'      => __( 'Effect 1', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_styles', '=', 'effect1' ),
				'options'    => array(
					'left_and_right'    => 'Title Top left & Icons Bottom Right',
					'top_to_bottom'      => 'Title & Icons on top',
					'bottom_to_top'      => 'Title & Icons in bottom',
				),
				'default'    => 'left_and_right',
			),
			array(
				'id'         => 'lucent_links_3',
				'type'       => 'select',
				'title'      => __( 'Effect 3', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_styles', '=', 'effect3' ),
				'options'    => array(
					'top_to_bottom'      => 'Title & Icons on top',
					'bottom_to_top'      => 'Title & Icons in bottom',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_links_5',
				'type'       => 'select',
				'title'      => __( 'Effect 5', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_styles', '=', 'effect5' ),
				'options'    => array(
					'left_to_right'      => 'Skew in from left',
					'right_to_left'      => 'Skew in from right',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_links_6',
				'type'       => 'select',
				'title'      => __( 'Effect 6', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_styles', '=', 'effect6' ),
				'options'    => array(
					'from_top_and_bottom'      => 'Title slide in from top & Icons vise versa',
					'from_left_and_right'      => 'Title slide in from left',
					'top_to_bottom'      => 'Title & Icons slide in from top',
					'bottom_to_top'      => 'Title & Icons slide in from bottom',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_links_8',
				'type'       => 'select',
				'title'      => __( 'Effect 8', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_styles', '=', 'effect8' ),
				'options'    => array(
					'scale_up'      => 'Image Scale Up',
					'scale_down'      => 'Image Scale Down',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_links_9',
				'type'       => 'select',
				'title'      => __( 'Effect 9', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_styles', '=', 'effect9' ),
				'options'    => array(
					'bottom_to_top'      => 'Flip image from bottom',
					'left_to_right'      => 'Flip image from left',
					'right_to_left'      => 'Flip image from right',
					'top_to_bottom'      => 'Flip image from top',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_links_10',
				'type'       => 'select',
				'title'      => __( 'Effect 10', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_styles', '=', 'effect10' ),
				'options'    => array(
					'bottom_to_top'      => 'Slide image from bottom',
					'left_to_right'      => 'Slide image from left',
					'right_to_left'      => 'Slide image from right',
					'top_to_bottom'      => 'Slide image from top',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_links_11',
				'type'       => 'select',
				'title'      => __( 'Effect 11', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_styles', '=', 'effect11' ),
				'options'    => array(
					'bottom_to_top'      => 'Slide icons from bottom',
					'left_to_right'      => 'Slide icons from left',
					'right_to_left'      => 'Slide icons from right',
					'top_to_bottom'      => 'Slide icons from top',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_links_12',
				'type'       => 'select',
				'title'      => __( 'Effect 12', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_styles', '=', 'effect12' ),
				'options'    => array(
					'bottom_to_top'      => '3D icons flip from bottom',
					'left_to_right'      => '3D icons flip from left',
					'right_to_left'      => '3D icons flip from right',
					'top_to_bottom'      => '3D icons flip from top',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_links_13',
				'type'       => 'select',
				'title'      => __( 'Effect 13', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_styles', '=', 'effect13' ),
				'options'    => array(
					'bottom_to_top'      => 'Overlay slide icons from bottom',
					'left_to_right'      => 'Overlay slide icons from left',
					'right_to_left'      => 'Overlay slide icons from right',
					'top_to_bottom'      => 'Overlay slide icons from top',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_links_14',
				'type'       => 'select',
				'title'      => __( 'Effect 14', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_styles', '=', 'effect14' ),
				'options'    => array(
					'bottom_to_top'      => '3D flip out image from bottom',
					'left_to_right'      => '3D flip out image from left',
					'right_to_left'      => '3D flip out image from right',
					'top_to_bottom'      => '3D flip out image from top',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_links_15',
				'type'       => 'select',
				'title'      => __( 'Effect 15', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_styles', '=', 'effect15' ),
				'options'    => array(
					'bottom_to_top'      => 'Flip out image from bottom',
					'left_to_right'      => 'Flip out image from left',
					'right_to_left'      => 'Flip out image from right',
					'top_to_bottom'      => 'Flip out image from top',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_links_16',
				'type'       => 'select',
				'title'      => __( 'Effect 16', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_styles', '=', 'effect16' ),
				'options'    => array(
					'bottom_to_top'      => 'Flip out image from bottom',
					'left_to_right'      => 'Flip out image from left',
					'right_to_left'      => 'Flip out image from right',
					'top_to_bottom'      => 'Flip out image from top',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_links_17',
				'type'       => 'select',
				'title'      => __( 'Effect 17', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_styles', '=', 'effect17' ),
				'options'    => array(
					'bottom_to_top'      => 'Knock out image to bottom',
					'left_to_right'      => 'Knock out image to left',
					'right_to_left'      => 'Knock out image to right',
					'top_to_bottom'      => 'Knock out image to top',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_links_18',
				'type'       => 'select',
				'title'      => __( 'Effect 18', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_styles', '=', 'effect18' ),
				'options'    => array(
					'bottom_to_top'      => 'Slide out image to bottom',
					'left_to_right'      => 'Slide out image to left',
					'right_to_left'      => 'Slide out image to right',
					'top_to_bottom'      => 'Slide out image to top',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_links_19',
				'type'       => 'select',
				'title'      => __( 'Effect 19', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_styles', '=', 'effect19' ),
				'options'    => array(
					'bottom_to_top'      => 'Roll out image to bottom',
					'left_to_right'      => 'Roll out image to left',
					'right_to_left'      => 'Roll out image to right',
					'top_to_bottom'      => 'Roll out image to top',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_links_20',
				'type'       => 'select',
				'title'      => __( 'Effect 20', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_styles', '=', 'effect20' ),
				'options'    => array(
					'left_to_right'      => 'Hang image to right',
					'right_to_left'      => 'Hang image to left',
				),
				'default'    => 'left_to_right',
			),
			array(
				'id'         => 'lucent_links_21',
				'type'       => 'select',
				'title'      => __( 'Effect 21', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_styles', '=', 'effect21' ),
				'options'    => array(
					'bottom_to_top'      => '3D box flip up',
					'top_to_bottom'      => '3D box flip down',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'       => 'lucent_woo_hover_image',
				'type'     => 'image_select',
				'title'    => __( 'Image hover styles', 'lucent' ),
				'desc'     => __( 'Select what happens on image hover.', 'lucent' ),
				'required' => array('lucent_woo_hover_images','=','image'),
				'width'	   => '30%',
				'class'	   => 'lucent-hover-title',
				'options'  => array(
					'effect2'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/7.png',
					),
					'effect5'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/7.png',
					),
					'effect7'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/7.png',
					),
					'effect8'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/7.png',
					),
					'effect9'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/8.png',
					),
					'effect10'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/8.png',
					),
					'effect11'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/8.png',
					),
					'effect12'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/8.png',
					),
					'effect13'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/8.png',
					),
					'effect14'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/8.png',
					),
					'effect15'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/8.png',
					),
					'effect16'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/8.png',
					),
					'effect17'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/4.png',
					),
					'effect18'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/4.png',
					),
					'effect19'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/4.png',
					),
					'effect20'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/4.png',
					),
					'effect21'      => array(
						'img'   => ReduxFramework::$_url . 'assets/img/box-shadows/4.png',
					),
				),
				'default'  => 'effect1',
			),
			array(
				'id'         => 'lucent_image_1',
				'type'       => 'select',
				'title'      => __( 'Effect 1', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_image', '=', 'effect5' ),
				'options'    => array(
					'left_to_right'      => 'Skew in from Left',
					'right_to_left'      => 'Skew in from Right',
				),
				'default'    => 'left_to_right',
			),
			array(
				'id'         => 'lucent_image_2',
				'type'       => 'select',
				'title'      => __( 'Effect 2', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_image', '=', 'effect8' ),
				'options'    => array(
					'scale_up'      => 'Scale Image Up',
					'scale_down'      => 'Scale Image Down',
				),
				'default'    => 'left_to_right',
			),
            array(
				'id'         => 'lucent_image_3',
				'type'       => 'select',
				'title'      => __( 'Effect 3', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_image', '=', 'effect9' ),
				'options'    => array(
					'bottom_to_top'      => 'Flip image over bottom',
					'left_to_right'      => 'Flip image over left',
					'right_to_left'      => 'Flip image over right',
					'top_to_bottom'      => 'Flip image over top',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_image_4',
				'type'       => 'select',
				'title'      => __( 'Effect 4', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_image', '=', 'effect10' ),
				'options'    => array(
					'bottom_to_top'      => 'Push image from bottom',
					'left_to_right'      => 'Push image from left',
					'right_to_left'      => 'Push image from right',
					'top_to_bottom'      => 'Push image from top',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_image_5',
				'type'       => 'select',
				'title'      => __( 'Effect 5', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_image', '=', 'effect11' ),
				'options'    => array(
					'bottom_to_top'      => 'Slide image from bottom',
					'left_to_right'      => 'Slide image from left',
					'right_to_left'      => 'Slide image from right',
					'top_to_bottom'      => 'Slide image from top',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_image_6',
				'type'       => 'select',
				'title'      => __( 'Effect 6', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_image', '=', 'effect12' ),
				'options'    => array(
					'bottom_to_top'      => '3D image flip from bottom',
					'left_to_right'      => '3D image flip from left',
					'right_to_left'      => '3D image flip from right',
					'top_to_bottom'      => '3D image flip from top',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_image_7',
				'type'       => 'select',
				'title'      => __( 'Effect 7', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_image', '=', 'effect13' ),
				'options'    => array(
					'bottom_to_top'      => 'Overlay slide image from bottom',
					'left_to_right'      => 'Overlay slide image from left',
					'right_to_left'      => 'Overlay slide image from right',
					'top_to_bottom'      => 'Overlay slide image from top',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_image_8',
				'type'       => 'select',
				'title'      => __( 'Effect 8', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_image', '=', 'effect14' ),
				'options'    => array(
					'bottom_to_top'      => '3D rotate image to bottom',
					'left_to_right'      => '3D rotate image to left',
					'right_to_left'      => '3D rotate image to right',
					'top_to_bottom'      => '3D rotate image to top',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_image_9',
				'type'       => 'select',
				'title'      => __( 'Effect 9', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_image', '=', 'effect15' ),
				'options'    => array(
					'bottom_to_top'      => 'Flip in image from bottom',
					'left_to_right'      => 'Flip in image from left',
					'right_to_left'      => 'Flip in image from right',
					'top_to_bottom'      => 'Flip in image from top',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_image_10',
				'type'       => 'select',
				'title'      => __( 'Effect 10', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_image', '=', 'effect16' ),
				'options'    => array(
					'bottom_to_top'      => 'Push and Scale down image to top',
					'left_to_right'      => 'Push and Scale down image to right',
					'right_to_left'      => 'Push and Scale down image to left',
					'top_to_bottom'      => 'Push and Scale down image to bottom',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_image_11',
				'type'       => 'select',
				'title'      => __( 'Effect 11', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_image', '=', 'effect17' ),
				'options'    => array(
					'bottom_to_top'      => 'Knock out image to bottom',
					'left_to_right'      => 'Knock out image to left',
					'right_to_left'      => 'Knock out image to right',
					'top_to_bottom'      => 'Knock out image to top',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_image_12',
				'type'       => 'select',
				'title'      => __( 'Effect 12', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_image', '=', 'effect18' ),
				'options'    => array(
					'bottom_to_top'      => 'Reverse Scale Images to Bottom',
					'left_to_right'      => 'Reverse Scale Images to Left',
					'right_to_left'      => 'Reverse Scale Images to Right',
					'top_to_bottom'      => 'Reverse Scale Images to Top',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_image_13',
				'type'       => 'select',
				'title'      => __( 'Effect 13', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_image', '=', 'effect19' ),
				'options'    => array(
					'bottom_to_top'      => 'Roll out image to bottom',
					'left_to_right'      => 'Roll out image to left',
					'right_to_left'      => 'Roll out image to right',
					'top_to_bottom'      => 'Roll out image to top',
				),
				'default'    => 'top_to_bottom',
			),
			array(
				'id'         => 'lucent_image_14',
				'type'       => 'select',
				'title'      => __( 'Effect 14', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_image', '=', 'effect20' ),
				'options'    => array(
					'left_to_right'      => 'Hang image to right',
					'right_to_left'      => 'Hang image to left',
				),
				'default'    => 'left_to_right',
			),
			array(
				'id'         => 'lucent_image_15',
				'type'       => 'select',
				'title'      => __( 'Effect 15', 'lucent' ),
				'required'   => array( 'lucent_woo_hover_image', '=', 'effect21' ),
				'options'    => array(
					'bottom_to_top'      => '3D box flip up',
					'top_to_bottom'      => '3D box flip down',
				),
				'default'    => 'top_to_bottom',
			),
		),
	)
);
