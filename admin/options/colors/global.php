<?php
  /**
   * Global color options
   *
   * @package Lucent
   * @since 1.1
   */

  Redux::setSection(
	  'lucent_opts',
	  array(
		  'id'    => 'global_color',
		  'title' => __( 'Global Colors','lucent' ),
		  'icon'  => 'panel-global',
		  'subsection' => true,
		  'fields' => array(
              array(
				  'id'       => 'theme_main_background',
				  'type'     => 'background',
                  'title'    => __( 'Theme Dark Primary', 'lucent' ),
                  'desc'     => __( 'Applied to elements such as Primary Buttons, etc...', 'lucent'),
				  'default'  => array(
                        'background-color' => '#FFF',
                  ),
                  'output' => array('#LucentMain, #masthead, .lucent-pusher'),
              ),
			  array(
				  'id'       => 'theme_dark_primary',
				  'type'     => 'color_rgba',
                  'title'    => __( 'Theme Dark Primary', 'lucent' ),
                  'desc'     => __( 'Applied to elements such as Primary Buttons, etc...', 'lucent'),
				  'default'   => array(
                    'color'     => '#0b91da',
                    'alpha'     => 1
                ),
                'output'  => array(
                    'background-color'=>'.add_to_cart_button, .single_add_to_cart_button, .ajax_add_to_cart, .continue-button, .wc-full-cart, .checkout-button, .asSelectorOpen, .asToggle,
                                        .wc-proceed-to-checkout, .account-links a, .icon-strip-left, .icon-strip-middle, .icon-strip-right, .hidden-fullscreen, .hidden-fullslide, .iziModal-navigate>button',
                ),
              ),
              array(
				  'id'       => 'theme_light_primary',
				  'type'     => 'color_rgba',
                  'title'    => __( 'Theme Light Primary', 'lucent' ),
                  'desc'     => __( 'Applied to elements such as Primary Buttons, etc...', 'lucent'),
				  'default'   => array(
                    'color'     => '#51BEF9',
                    'alpha'     => 1
                  ),
                  'output'   => array(
                      'background-color'=>'.wc-backward, .overlay-particle, .lucent-hidden-toggle, #mobile-trigger-button'
                  )   
              ),
              array(
				  'id'       => 'theme_dark_secondary',
				  'type'     => 'color_rgba',
                  'title'    => __( 'Theme Dark Secondary', 'lucent' ),
                  'desc'     => __( 'Applied to elements such as Primary Buttons, etc...', 'lucent'),
				  'default'   => array(
                    'color'     => '#DF343C',
                    'alpha'     => 1
                ),
                'output'  => array(
                    'background-color'=>'.asHolder, .plus, .minus, .apply-coupon, .update-cart,
                                        #fancy_minicart span, .lucent3d-item .info',
                    'color'=>'#topbar li, #topbar a'
                ),
              ),
              array(
				  'id'       => 'theme_light_secondary',
				  'type'     => 'color_rgba',
                  'title'    => __( 'Theme Light Secondary', 'lucent' ),
                  'desc'     => __( 'Applied to elements such as Select elements etc...', 'lucent'),
				  'default'   => array(
                    'color'     => '#F7747B',
                    'alpha'     => 1
                ),
                'output'  => array(
                    'background-color'=>'.asOptions, .lucent3d-item .info h4, .flat-details,
                    .flat-popup, .flat-share, .overlay-close, .iziModal-header',
                    'border-color'=>'.iziModal',
                ),
             ),             
             array(
				  'id'       => 'theme_secondary_text',
				  'type'     => 'color_rgba',
                  'title'    => __( 'Theme Accent Text', 'lucent' ),
                  'desc'     => __( 'Applied to elements from and secondary color elements above', 'lucent'),
				  'default'   => array(
                    'color'     => '#FFF',
                    'alpha'     => 1
                ),
                'output'  => array(
                    'color'=>'.asHolder, .asOptions a:link, .add_to_cart_button, .single_add_to_cart_button, .ajax_add_to_cart, .woocommerce .wc-proceed-to-checkout,
                              .update-cart, .apply-coupon, .icon-strip-left, .icon-strip-middle, .icon-strip-right, .lucentnav ul li, .hidden-fullslide .LucentVertical li a, .overlay-close',
                ),
             ),
             array(
				  'id'       => 'theme_primary_text',
				  'type'     => 'color_rgba',
                  'title'    => __( 'Theme Text Primary', 'lucent' ),
                  'desc'     => __( 'Applied to elements such as Primary Buttons, etc...', 'lucent'),
				  'default'   => array(
                    'color'     => '#DDD',
                    'alpha'     => 1
                ),
                'output'  => array(
                    'color'=>'.asHolder, .plus, .minus, .continue-button, .wc-backward, .lucent-hidden-toggle, #mobile-trigger-button',
                    'border-color'=>".asHolder"
                ),
             ),
             array(
                'id'       => 'theme_accent',
                'type'     => 'color',
                'title'    => __( 'Theme Accent', 'lucent' ),
                'desc'     => __( 'Applied to elements such as Borders etc...', 'lucent'),
                'default'   =>  '#DDD',
                'output'   => array(
                    'background'=>'',
                    'border-color'=>".archive-images",
                )
             ),
		  ),
	  )
  );