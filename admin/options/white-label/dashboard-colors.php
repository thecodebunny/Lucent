<?php

  /****************************************
  *
  * Dashboard options
  *
  * since 1.1
  *
  ****************************************/

  Redux::setSection(
          'lucent_opts',
          array(
                 'id'         => 'lucent_dashboard_colors',
                 'title'      => __('Dashboard Colors','lucent'),
                 'desc'		=> __('Setup Dashboard Colors','lucent'),
                 'icon'       => 'panel-paintbrush',
                 'subsection' => true,
                 'fields'		=> array (
              array(
                      'id'       => 'dashboard_color_presets',
                      'type'     => 'image_select',
                      'presets'  => true,
                      'title'    => __('Color Presets', 'lucent'),
                      'subtitle' => __('', 'lucent'),
                      'default'  => 'blue_red',
                      'options'  => array(
                          // Array of preset options
                      'blue_red'      => array(
                              'alt'   => 'Blue and Red',
                              'img'   => ReduxFramework::$_url.'../redux-framework/assets/img/admin/blue-red.jpg',
                              'presets'   => array(
                                  'dashboard_body_background'     => '#FFF',
                                  'admin_menu_background'         => '#204160',
                                  'admin_buttons_primary'         => '#204160',
                                  'admin_buttons_secondary'       => '#db6a70',
                                  'admin_menu_hover'              => '#204160',
                                  'admin_submenu_bg'              => '#db6a70',
                                  'admin_submenu_head'            => '#b6010a',
                                  'admin_topbar_bg'               => '#204160',
                                  'admin_topbar_links'            => '#204160',
                                  'admin_icons_color'             => '#FFF',
                              )
                          ),
                      'gun_rust'      => array(
                              'alt'   => 'Gunmetal & Rusty Red',
                              'img'   => ReduxFramework::$_url.'../redux-framework/assets/img/admin/gun-rust.jpg',
                              'presets'   => array(
                                  'dashboard_body_background'     => '#fdf1d6',
                                  'admin_menu_background'         => '#233237',
                                  'admin_buttons_primary'         => '#233237',
                                  'admin_buttons_secondary'       => '#984b43',
                                  'admin_menu_hover'              => '#233237',
                                  'admin_submenu_bg'              => '#984b43',
                                  'admin_submenu_head'            => '#61241d',
                                  'admin_topbar_bg'               => '#233237',
                                  'admin_topbar_links'            => '#233237',
                                  'admin_icons_color'             => '#fdf1d6',
                              )
                          ),
                      'fresh_vermilion'      => array(
                              'alt'   => 'Fresh Vermilion',
                              'img'   => ReduxFramework::$_url.'../redux-framework/assets/img/admin/fresh-vermilion.jpg',
                              'presets'   => array(
                                  'dashboard_body_background'     => '#eae9ec',
                                  'admin_menu_background'         => '#fc4a1a',
                                  'admin_buttons_primary'         => '#fc4a1a',
                                  'admin_buttons_secondary'       => '#4abdac',
                                  'admin_menu_hover'              => '#fc4a1a',
                                  'admin_submenu_bg'              => '#4abdac',
                                  'admin_submenu_head'            => '#02806d',
                                  'admin_topbar_bg'               => '#fc4a1a',
                                  'admin_topbar_links'            => '#fc4a1a',
                                  'admin_icons_color'             => '#eae9ec',
                              )
                          ),
                      'sunflower_evening'      => array(
                              'alt'   => 'Sunflowe in Evening',
                              'img'   => ReduxFramework::$_url.'../redux-framework/assets/img/admin/sunflower-evening.jpg',
                              'presets'   => array(
                                  'dashboard_body_background'     => '#262228',
                                  'admin_menu_background'         => '#fdd83d',
                                  'admin_buttons_primary'         => '#fdd83d',
                                  'admin_buttons_secondary'       => '#0981c3',
                                  'admin_menu_hover'              => '#fdd83d',
                                  'admin_submenu_bg'              => '#0981c3',
                                  'admin_submenu_head'            => '#056499',
                                  'admin_topbar_bg'               => '#fdd83d',
                                  'admin_topbar_links'            => '#fdd83d',
                                  'admin_icons_color'             => '#262228',
                              )
                          ),
                      'skyblack'      => array(
                              'alt'   => 'Skyblack',
                              'img'   => ReduxFramework::$_url.'../redux-framework/assets/img/admin/skyblack.jpg',
                              'presets'   => array(
                                  'dashboard_body_background'     => '#1d2731',
                                  'admin_menu_background'         => '#328cc1',
                                  'admin_buttons_primary'         => '#328cc1',
                                  'admin_buttons_secondary'       => '#0b3c5d',
                                  'admin_menu_hover'              => '#328cc1',
                                  'admin_submenu_bg'              => '#0b3c5d',
                                  'admin_submenu_head'            => '#0b3c5d',
                                  'admin_topbar_bg'               => '#328cc1',
                                  'admin_topbar_links'            => '#328cc1',
                                  'admin_icons_color'             => '#1d2731',
                              )
                          ),
                      'forestred'      => array(
                              'alt'   => 'Forest Red',
                              'img'   => ReduxFramework::$_url.'../redux-framework/assets/img/admin/forest-red.jpg',
                              'presets'   => array(
                                  'dashboard_body_background'     => '#001529',
                                  'admin_menu_background'         => '#ff533d',
                                  'admin_buttons_primary'         => '#ff533d',
                                  'admin_buttons_secondary'       => '#f7882f',
                                  'admin_menu_hover'              => '#ff533d',
                                  'admin_submenu_bg'              => '#f7882f',
                                  'admin_submenu_head'            => '#eb6a02',
                                  'admin_topbar_bg'               => '#ff533d',
                                  'admin_topbar_links'            => '#ff533d',
                                  'admin_icons_color'             => '#FFF',
                              )
                          ),
                      'butter_peach'      => array(
                              'alt'   => 'Forest Red',
                              'img'   => ReduxFramework::$_url.'../redux-framework/assets/img/admin/butter-peach.jpg',
                              'presets'   => array(
                                  'dashboard_body_background'     => '#01a3a2',
                                  'admin_menu_background'         => '#fedc3d',
                                  'admin_buttons_primary'         => '#fedc3d',
                                  'admin_buttons_secondary'       => '#fea680',
                                  'admin_menu_hover'              => '#fedc3d',
                                  'admin_submenu_bg'              => '#fea680',
                                  'admin_submenu_head'            => '#fe804a',
                                  'admin_topbar_bg'               => '#fedc3d',
                                  'admin_topbar_links'            => '#fedc3d',
                                  'admin_icons_color'             => '#000',
                              )
                          ),
                      'seafoam'      => array(
                              'alt'   => 'Forest Red',
                              'img'   => ReduxFramework::$_url.'../redux-framework/assets/img/admin/seafoam.jpg',
                              'presets'   => array(
                                  'dashboard_body_background'     => '#c4dfe6',
                                  'admin_menu_background'         => '#003b46',
                                  'admin_buttons_primary'         => '#003b46',
                                  'admin_buttons_secondary'       => '#66a5ad',
                                  'admin_menu_hover'              => '#003b46',
                                  'admin_submenu_bg'              => '#66a5ad',
                                  'admin_submenu_head'            => '#2a95a3',
                                  'admin_topbar_bg'               => '#003b46',
                                  'admin_topbar_links'            => '#003b46',
                                  'admin_icons_color'             => '#c4dfe6',
                              )
                          ),
                      ),
                  ),
  		    array(
                      'id'       => 'dashboard_body_background',
                      'type'     => 'color',
                      'title'    => __('Dashboard Body Background', 'lucent'),
                      'subtitle' => __('Body background color.', 'lucent'),
                      'desc'     => __('', 'lucent'),
                      'default'  => '#FFF'
                  ),
              array(
                      'id'       => 'admin_menu_background',
                      'type'     => 'color',
                      'title'    => __('Admin Menu Background', 'lucent'),
                      'subtitle' => __('', 'lucent'),
                      'desc'     => __('', 'lucent'),
                      'default'  =>  '#19334C',
                  ),
              array(
                      'id'       => 'admin_menu_hover',
                      'type'     => 'color',
                      'title'    => __('Hover Background', 'lucent'),
                      'subtitle' => __('Admin menu link hover background', 'lucent'),
                      'desc'     => __('', 'lucent'),
                      'default'  => '#19334C',
                  ),
              array(
                      'id'       => 'admin_submenu_bg',
                      'type'     => 'color',
                      'title'    => __('Submenu Background', 'lucent'),
                      'subtitle' => __('Admin submenu background', 'lucent'),
                      'desc'     => __('', 'lucent'),
                      'default'  => '#F7747B',
                  ),
              array(
                      'id'       => 'admin_submenu_head',
                      'type'     => 'color',
                      'title'    => __('Submenu Head Background', 'lucent'),
                      'subtitle' => __('Admin submenu head background', 'lucent'),
                      'desc'     => __('', 'lucent'),
                      'default'  => '#19334C',
                  ),
              array(
                      'id'       => 'admin_topbar_bg',
                      'type'     => 'color',
                      'title'    => __('Topbar Background', 'lucent'),
                      'subtitle' => __('Admin Topbar background', 'lucent'),
                      'desc'     => __('', 'lucent'),
                      'default'  => '#19334C',
                  ),
              array(
                      'id'       => 'admin_topbar_links',
                      'type'     => 'color',
                      'title'    => __('Topbar Links Background', 'lucent'),
                      'subtitle' => __('Topbar links hover background', 'lucent'),
                      'desc'     => __('', 'lucent'),
                      'default'  => '#19334C',
                  ),
              array(
                      'id'       => 'admin_icons_color',
                      'type'     => 'color',
                      'title'    => __('Admin Icons Color', 'lucent'),
                      'subtitle' => __('', 'lucent'),
                      'desc'     => __('', 'lucent'),
                      'default'  => '#FFF',
                  ),
              array(
                      'id'       => 'admin_buttons_primary',
                      'type'     => 'color',
                      'title'    => __('Admin Primary Buttons Color', 'lucent'),
                      'subtitle' => __('', 'lucent'),
                      'desc'     => __('', 'lucent'),
                      'default'  => '#19334C',
                  ),
              array(
                      'id'       => 'admin_buttons_secondary',
                      'type'     => 'color',
                      'title'    => __('Admin Secondary Buttons Color', 'lucent'),
                      'subtitle' => __('', 'lucent'),
                      'desc'     => __('', 'lucent'),
                      'default'  => '#F7747B',
                  ),
              ),
          )
      );
