<?php
  /**
   *
   *
   * Mobile Menu options
   *
   * @package Lucent
   **/

  Redux::setSection(
	  'lucent_opts',
	  array(
		  'id'         => 'lucent_mobile_menu',
		  'title'      => __( 'Mobile Header','lucent' ),
		  'icon'       => 'panel-mobile',
		  'subsection' => true,
		  'fields'       => array(
			  array(
				  'id'        => 'lucent_mobile_menu_icon',
				  'type'      => 'mobilemenu_icons',
				  'title'     => __( 'Select Mobile Menu Icon.', 'redux-framework' ),
				  'default'   => 'mobilemenu-th-list-outline',
				  'ajax_save' => true,
			  ),
			  array(
				  'id'       => 'lucent_mobile_sticky',
				  'type'         => 'button_set',
				  'title'        => __( 'Show Sticky Menu on mobile?', 'lucent' ),
				  'options'  => array(
					  'yes'   => 'Yes',
					  'no'    => 'No',
				  ),
				  'default'   => 'yes',
			  ),
			  array(
				  'id'       => 'lucent_mobile_topbar',
				  'type'         => 'button_set',
				  'title'        => __( 'Enable Topbar?', 'lucent' ),
				  'options'  => array(
					  'yes'   => 'Yes',
					  'no'    => 'No',
				  ),
				  'default'   => 'yes',
			  ),
			  array(
				  'id'       => 'lucent_mobile_left',
				  'type'         => 'select',
				  'title'      => __( 'Select Topbar Left Content', 'lucent' ),
				  'options'  => array(
					  'social'    => 'Social Icons',
					  'info'  => 'Topbar Info',
					  'slogan'    => 'Slogan',
				  ),
				  'default'   => 'social',
			  ),
		  ),
)
  );
