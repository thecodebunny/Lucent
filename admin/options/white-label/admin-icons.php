<?php

  /****************************************
  *
  * Admin Icons options
  *
  * since 1.1
  *
  ****************************************/

  Redux::setSection(
      'lucent_opts',
      array(
             'id'         => 'lucent_admin_icons',
             'title'      => __('Admin Menu Icons','lucent'),
             'desc'		=> __('Change default WordPress Admin Icons','lucent'),
             'icon'       => 'panel-lightbulb',
             'subsection' => true,
             'fields'		=> array (
          array(
                  'id'        => 'lucent_dashboard_icon',
                  'type'      => 'dashboard_icons',
          'title'     => __('Select Dashboard Icon.', 'redux-framework'),
          'subtitle'  => __('','lucent'),
                  'desc'      => __('','lucent'),
                  'default'   => 'dash-nfc',
          ),
          array(
                  'id'        => 'lucent_posts_icon',
                  'type'      => 'post_icons',
          'title'     => __('Select Posts Icon.', 'redux-framework'),
          'subtitle'  => __('','lucent'),
                  'desc'      => __('','lucent'),
                  'default'   => 'posts-documents',
          ),
          array(
                  'id'        => 'lucent_media_icon',
                  'type'      => 'media_icons',
          'title'     => __('Select Media Icon.', 'redux-framework'),
          'subtitle'  => __('','lucent'),
                  'desc'      => __('','lucent'),
                  'default'   => 'medias-folder-video',
          ),
          array(
                  'id'        => 'lucent_pages_icon',
                  'type'      => 'post_icons',
          'title'     => __('Select Pages Icon.', 'redux-framework'),
          'subtitle'  => __('','lucent'),
                  'desc'      => __('','lucent'),
                  'default'   => 'posts-files2',
          ),
          array(
                  'id'        => 'lucent_portfolio_icon',
                  'type'      => 'post_icons',
          'title'     => __('Select Portfolio Icon.', 'redux-framework'),
          'subtitle'  => __('','lucent'),
                  'desc'      => __('','lucent'),
                  'default'   => 'posts-sports-club',
          ),
          array(
                  'id'        => 'lucent_comment_icon',
                  'type'      => 'comments_icons',
          'title'     => __('Select Comments Icon.', 'redux-framework'),
          'subtitle'  => __('','lucent'),
                  'desc'      => __('','lucent'),
                  'default'   => 'reviews-chat',
          ),
          array(
                  'id'        => 'lucent_appearance_icon',
                  'type'      => 'appearance_icons',
          'title'     => __('Select Appearance Icon.', 'redux-framework'),
          'subtitle'  => __('','lucent'),
                  'desc'      => __('','lucent'),
                  'default'   => 'apc-paintcan',
          ),
          array(
                  'id'        => 'lucent_plugins_icon',
                  'type'      => 'plugins_icons',
          'title'     => __('Select Plugins Icon.', 'redux-framework'),
          'subtitle'  => __('','lucent'),
                  'desc'      => __('','lucent'),
                  'default'   => 'plc-plug3',
          ),
          array(
                  'id'        => 'lucent_user_icon',
                  'type'      => 'user_icons',
          'title'     => __('Select Users Icon.', 'redux-framework'),
          'subtitle'  => __('','lucent'),
                  'desc'      => __('','lucent'),
                  'default'   => 'users-profile-female',
          ),
          array(
                  'id'        => 'lucent_tools_icon',
                  'type'      => 'tools_icons',
          'title'     => __('Select Tools Icon.', 'redux-framework'),
          'subtitle'  => __('','lucent'),
                  'desc'      => __('','lucent'),
                  'default'   => 'tool-toolbox',
          ),
          array(
                  'id'        => 'lucent_settings_icon',
                  'type'      => 'setting_icons',
          'title'     => __('Select Settings Icon.', 'redux-framework'),
          'subtitle'  => __('','lucent'),
                  'desc'      => __('','lucent'),
                  'default'   => 'stg-cogs',
          ),
          array(
                  'id'        => 'lucent_home_icon',
                  'type'      => 'home_icons',
          'title'     => __('Select Admin bar home Icon.', 'redux-framework'),
          'subtitle'  => __('','lucent'),
                  'desc'      => __('','lucent'),
                  'default'   => 'home-library',
          ),
          array(
                  'id'        => 'lucent_new_icon',
                  'type'      => 'new_plus_icons',
          'title'     => __('Select Admin bar new plus button.', 'redux-framework'),
          'subtitle'  => __('','lucent'),
                  'desc'      => __('','lucent'),
                  'default'   => 'new-file-add',
          ),
          )
      )
  );
