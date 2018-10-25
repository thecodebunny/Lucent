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
             'id'         => 'lucent_dashboard_theming',
             'title'      => __('Dashboard Options','lucent'),
             'desc'		=> __('Setup Dashboard Options','lucent'),
             'icon'       => 'panel-speedometer',
             'subsection' => true,
             'fields'		=> array (
      array(
                 'id'         => 'lucent_site_name',
                 'type'       => 'text',
                 'title'      => __('Site Name','lucent'),
                 'subtitle'   => __('','lucent'),
                 'desc'       => __('Custom Site Name in Admin Bar','lucent'),
                  'default'    => 'Lucent Theme'
                  ),
          array(
                 'id'         => 'lucent_adminbar_logo',
                 'type'       => 'media',
                 'url'        => 'true',
                 'mode'       => false,
                 'title'      => __('Admin Bar Logo','lucent'),
                 'subtitle'   => __('','lucent'),
                 'desc'       => __('Use Logo instead of Site Name','lucent'),
                 'default'    => array(
                              'url'=>ReduxFramework::$_url.'assets/img/logo-light.png'
                              ),
                  ),
          array(
                 'id'         => 'lucent_dashboard_title',
                  'type'       => 'text',
                 'title'      => __('Change Dashboard Title','lucent'),
                 'subtitle'   => __('','lucent'),
                 'desc'       => __('','lucent'),
                 'default'    => 'Control Panel'
                  ),
          array(
                 'id'         => 'lucent_admin_menu_style',
                 'type'       => 'button_set',
                 'title'      => __('Choose Admin Menu Style','lucent'),
                 'subtitle'   => __('','lucent'),
                 'desc'       => __('','lucent'),
                 'options' => array(
                              'folded'  => 'Folded',
                              'unfolded'       => 'Unfolded'
                              ),
                              'default' => 'unfolded'
              ),
          array(
                 'id'         => 'lucent_admin_fonts',
                 'type'       => 'typography',
                 'google'      => true,
                 'font-backup' => true,
                 'font-size'  => false,
                 'font-weight'  => false,
                 'font-style'  => false,
                 'text-align'  => false,
                 'subsets'  => false,
                 'line-height'  => false,
                 'color'  => false,
                 'title'      => __('Admin Fonts','lucent'),
                 'subtitle'   => __('Choose Global Admin Fonts','lucent'),
                 'desc'       => __('','lucent'),
                 'default'     => array(
                  'color'       => '#333',
                  'font-style'  => '700',
                  'font-family' => 'Raleway',
                  'google'      => true,
                  'line-height' => '40'
                  ),
              ),
          array(
                  'id'       => 'admin_button_styles',
                  'type'     => 'select',
                  'title'    => __('Admin Button Style', 'lucent'),
                  'subtitle' => __('', 'lucent'),
                  'desc'     => __('', 'lucent'),
                  'options'  => array(
                      'flat' => 'Flat / Square',
                      'rounded' => 'Rounded',
                  ),
                  'default'  => 'flat',
              ),

          array(
                 'id'         => 'lucent_footer_text',
                 'type'       => 'text',
                 'title'      => __('Footer Text','lucent'),
                 'subtitle'   => __('','lucent'),
                 'desc'       => __('Change default WordPress footer thank you message','lucent'),
                  'default'    => 'Thank you for using Lucent Theme'
                  ),
          array(
                 'id'         => 'lucent_admin_version',
                 'type'       => 'button_set',
                 'title'      => __('Footer Version','lucent'),
                 'subtitle'   => __('','lucent'),
                 'desc'       => __('Hide WordPress Version','lucent'),
                 'options' => array(
                              'yes'  => 'Yes',
                              'no'       => 'No'
                              ),
                              'default' => 'no'
              ),
          )
      )
  );
