<?php

  /****************************************
  *
  * Login Page options
  *
  * since 1.1
  *
  ****************************************/

  Redux::setSection(
      'lucent_opts',
      array(
             'id'         => 'lucent_admin_login',
             'title'      => __('Login Form Options','lucent'),
             'desc'		=> __('Choose Login Styles and Layouts','lucent'),
             'icon'       => 'panel-lock',
             'subsection' => true,
             'fields'		=> array (
      array(
                 'id'         => 'lucent_login_logo',
                 'type'       => 'media',
                 'url'		=> true,
                 'title'      => __('Choose Logo to show on login screen.','lucent'),
                 'subtitle'   => __('','lucent'),
                 'desc'       => __('','lucent'),
                 'default'  => array(
                              'url'=>ReduxFramework::$_url.'assets/img/logo-light.png'
                              ),
         ),
      array(
                 'id'         => 'lucent_login_title',
                 'type'       => 'text',
                 'url'		=> true,
                 'title'      => __('Choose Logo image title.','lucent'),
                 'subtitle'   => __('','lucent'),
                 'desc'       => __('','lucent'),
                 'default'  => 'Lucent Theme - Custom Login.',
         ),
      array(
                      'id'        => 'lucent_logform_bg',
                      'type'      => 'color_rgba',
                      'title'     => 'RGBA Color Picker',
                      'subtitle'  => '',
                      'desc'      => '',
                      'default'   => array(
                      'color'     => '#000',
                      'alpha'     => 0.7
                      ),
              ),
      array(
                  'id'        => 'lucent_login_content',
                  'type'      => 'select',
          'title'     => __('Select Page to show content on login page.', 'redux-framework'),
          'desc'      => 'You can also change the default content with your own. </br> The default content is located in /white-label/login-content.php/',
          'data'      => 'pages',
          ),
      array(
             'id'         => 'lucent_login_button_bg',
             'type'       => 'background',
             'url'		=> true,
             'title'      => __('Choose button background.','lucent'),
             'subtitle'   => __('','lucent'),
             'desc'       => __('Will also be applied to Lost password and Back to blog links.','lucent'),
             'default'  => array(
                          'background-color' => '#02ABE3',
                          )
     ),
  )
  )
);
