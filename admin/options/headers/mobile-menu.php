<?php

  /**
  *
  * Mobile Menu options
  * @package Lucent
  * @author TheCodeBunny
  * @link www.thecodebunny.com
  **/

  Redux::setSection(
          'lucent_opts',
          array(
                 'id'         => 'lucent_mobile_menu',
                 'title'      => __('Mobile Header','lucent'),
                 'icon'       => 'panel-mobile',
                 'subsection' => true,
                 'fields'		=> array(
                    array(
                        'id'  	    => 'lucent_mobile_style',
                        'type'     	=> 'select',
                        'title'     	=> __('Mobile Menu Style/Type', 'lucent'),
                        'options' 	=> array(
                           'dropdown' 	=> 'Standard Submenu Slide Down',
                           'paged' 	=> 'Paged Navigation',
                        ),
                        'default' 	=> 'paged'
                    ),
                    array(
                        'id'         => 'lucent_mobile_side',
                        'type'       => 'select',
                        'title'      => __( 'Slide Animation Directon For Submenus','lucent' ),
                        'options'  => array(
                            'top'      => 'Slide From Top',
                            'left'      => 'Slide From Left',
                            'right'     => 'Slide From Right',
                        ),
                        'default'   => 'left',
                    ),
                    array(
                        'id'       => 'lucent_mobile_fx',
                        'type'         => 'select',
                        'title'      => __( 'Mobile Navigation FX', 'lucent' ),
                        'options'  => array(
                            'simpleslide'     => 'Static over content',
                            'push'     => 'Content Push',
                            'reverseslide'     => 'Slider Slide Reverse',
                            'rotate3din'     => 'Menu 3D rotate in',
                            'roate3dout'     => 'Menu 3D rotate out',
                            'scaledowncontent'     => 'Content Scale out',
                            'scaleup'     => 'Menu Scale Up',
                            'scalerotate'     => 'Content Scale Up & Rotate',
                            'slidedown'     => 'Menu slide down',
                            'delay3d'     => 'Menu 3D Rotate with delay',
                        ),
                        'default'   => 'rotate3din',
                    ),
                    array(
                        'id'  	    => 'lucent_mobile_sticky',
                        'type'     	=> 'button_set',
                        'title'     	=> __('Show Sticky Menu on mobile?', 'lucent'),
                        'subtitle'  	=> __('', 'lucent'),
                        'options' 	=> array(
                        'yes' 	=> 'Yes',
                        'no' 	=> 'No'
                        ),
                        'default' 	=> 'yes'
                    ),      
                    array(
                        'id'  	    => 'lucent_mobile_topbar',
                        'type'     	=> 'button_set',
                        'title'     	=> __('Enable Topbar?', 'lucent'),
                        'subtitle'  	=> __('', 'lucent'),
                        'options' 	=> array(
                                    'yes' 	=> 'Yes',
                                    'no' 	=> 'No'
                        ),
                                'default' 	=> 'yes'
                    ),
                    array(
                        'id'         => 'lucent_mobile_width',
                        'type'       => 'dimensions',
                        'height'	 => 'false',
                        'units'      => array('em','px','%'),
                        'units_extended' => 'true',
                        'title'      => __( 'Mobile Navigation Width','lucent' ),
                        'default'    => array(
                            'width'=>'70',
                            'units'=>'%',
                        ),
                    ),
                ),
            )
        );
