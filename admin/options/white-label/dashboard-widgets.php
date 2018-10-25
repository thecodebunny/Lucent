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
             'id'         => 'lucent_dashboard_widgets',
             'title'      => __('Dashboard Widgets','lucent'),
             'desc'		=> __('Remove default dashboard widgets','lucent'),
             'icon'       => 'panel-layers',
             'subsection' => true,
             'fields'		=> array (
  array(
             'id'         => 'lucent_dashboard_activity',
             'type'       => 'button_set',
             'url'		=> true,
             'title'      => __('Remove Activity Widget?','lucent'),
             'subtitle'   => __('','lucent'),
             'desc'       => __('','lucent'),
             'options' => array(
                          'unset'  => 'Remove',
                          ''       => 'Don\'t Remove'
                          ),
                          'default' => ''
                  ),
      array(
             'id'         => 'lucent_dashboard_glance',
             'type'       => 'button_set',
             'url'		=> true,
             'title'      => __('Remove At a Glance Widget?','lucent'),
             'subtitle'   => __('','lucent'),
             'desc'       => __('','lucent'),
             'options' => array(
                          'unset'  => 'Remove',
                          ''       => 'Don\'t Remove'
                          ),
                          'default' => ''
                  ),
      array(
             'id'         => 'lucent_dashboard_comments',
             'type'       => 'button_set',
             'url'		=> true,
             'title'      => __('Remove Recent Comments Widget?','lucent'),
             'subtitle'   => __('','lucent'),
             'desc'       => __('','lucent'),
             'options' => array(
                          'unset'  => 'Remove',
                          ''       => 'Don\'t Remove'
                          ),
                          'default' => ''
                  ),
      array(
             'id'         => 'lucent_dashboard_links',
             'type'       => 'button_set',
             'url'		=> true,
             'title'      => __('Remove Incoming Links Widget?','lucent'),
             'subtitle'   => __('','lucent'),
             'desc'       => __('','lucent'),
             'options' => array(
                          'unset'  => 'Remove',
                          ''       => 'Don\'t Remove'
                          ),
                          'default' => ''
                  ),
      array(
             'id'         => 'lucent_dashboard_plugins',
             'type'       => 'button_set',
             'url'		=> true,
             'title'      => __('Remove Plugins Widget?','lucent'),
             'subtitle'   => __('','lucent'),
             'desc'       => __('','lucent'),
             'options' => array(
                          'unset'  => 'Remove',
                          ''       => 'Don\'t Remove'
                          ),
                          'default' => ''
                  ),
      array(
             'id'         => 'lucent_dashboard_primary',
             'type'       => 'button_set',
             'url'		=> true,
             'title'      => __('Remove Primary Widget?','lucent'),
             'subtitle'   => __('','lucent'),
             'desc'       => __('','lucent'),
             'options' => array(
                          'unset'  => 'Remove',
                          ''       => 'Don\'t Remove'
                          ),
                          'default' => ''
                  ),
      array(
             'id'         => 'lucent_dashboard_secondary',
             'type'       => 'button_set',
             'url'		=> true,
             'title'      => __('Remove Secondary Widget?','lucent'),
             'subtitle'   => __('','lucent'),
             'desc'       => __('','lucent'),
             'options' => array(
                          'unset'  => 'Remove',
                          ''       => 'Don\'t Remove'
                          ),
                          'default' => ''
                  ),
      array(
             'id'         => 'lucent_dashboard_drafts',
             'type'       => 'button_set',
             'url'		=> true,
             'title'      => __('Remove Recent Drafts Widget?','lucent'),
             'subtitle'   => __('','lucent'),
             'desc'       => __('','lucent'),
             'options' => array(
                          'unset'  => 'Remove',
                          ''       => 'Don\'t Remove'
                          ),
                          'default' => ''
                  ),
      array(
             'id'         => 'lucent_dashboard_press',
             'type'       => 'button_set',
             'url'		=> true,
             'title'      => __('Remove Quick Press Widget?','lucent'),
             'subtitle'   => __('','lucent'),
             'desc'       => __('','lucent'),
             'options' => array(
                          'unset'  => 'Remove',
                          ''       => 'Don\'t Remove'
                          ),
                          'default' => ''
                  ),
      array(
             'id'         => 'lucent_dashboard_woo_reviews',
             'type'       => 'button_set',
             'url'		=> true,
             'title'      => __('Remove WooCommerce Reviews Widget?','lucent'),
             'subtitle'   => __('','lucent'),
             'desc'       => __('','lucent'),
             'options' => array(
                          'unset'  => 'Remove',
                          ''       => 'Don\'t Remove'
                          ),
                          'default' => ''
                  ),
      array(
             'id'         => 'lucent_dashboard_woo_status',
             'type'       => 'button_set',
             'url'		=> true,
             'title'      => __('Remove WooCommerce Status Widget?','lucent'),
             'subtitle'   => __('','lucent'),
             'desc'       => __('','lucent'),
             'options' => array(
                          'unset'  => 'Remove',
                          ''       => 'Don\'t Remove'
                          ),
                          'default' => ''
                  ),

              )
      )
  );
