<?php
  /**
   *
   *
   * Topbar options
   *
   * @package Lucent
   **/

  Redux::setSection(
	  'lucent_opts',
	  array(
		  'id'         => 'lucent_topbar',
		  'title'      => __( 'Top Bar','lucent' ),
		  'desc'     => __( 'Choose topbar options.','lucent' ),
		  'icon'       => 'panel-lines',
		  'subsection' => true,
		  'fields'     => array(
			  array(
				  'id'       => 'lucent_topbar_on',
				  'type'         => 'button_set',
				  'title'      => __( 'Show topbar?', 'lucent' ),
				  'subtitle'     => __( 'Informative topbar above header.', 'lucent' ),
				  'options'  => array(
					  'yes'   => 'Show',
					  'no'    => 'Don\'t show',
				  ),
				  'default'   => 'no',
			  ),
			  array(
				  'id'       => 'lucent_topbar_bottom',
				  'type'         => 'border',
				  'all'      => false,
				  'top'      => false,
				  'left'     => false,
				  'right'        => false,
				  'bottom'       => true,
				  'title'      => __( 'Bottom Border', 'lucent' ),
				  'subtitle'     => __( 'Show topbar bottom border?', 'lucent' ),
				  'required'   => array( 'lucent_topbar_on', '=', 'yes' ),
				  'output'     => array( '#topbar' ),
				  'default'  => array(
					  'border-color'  => '#DDD',
					  'border-style'  => 'solid',
					  'border-bottom' => '1px',
				  ),
			  ),
			  array(
				  'id'       => 'lucent_topbar_shadow',
				  'type'         => 'button_set',
				  'title'      => __( 'Show shadow below topbar?', 'lucent' ),
				  'required'   => array( 'lucent_topbar_on', '=', 'yes' ),
				  'options'  => array(
					  'yes'   => 'Yes',
					  'no'    => 'No',
				  ),
				  'default'   => 'no',
			  ),

			  array(
				  'id'       => 'lucent_topbar_social',
				  'type'         => 'button_set',
				  'title'      => __( 'Show social icons in topbar?', 'lucent' ),
				  'subtitle'     => __( 'Put your social media at work.', 'lucent' ),
				  'required'   => array( 'lucent_topbar_on', '=', 'yes' ),
				  'options'  => array(
					  'yes'   => 'Yes',
					  'no'    => 'No',
				  ),
				  'default'   => 'yes',
			  ),
			  array(
				  'id'       => 'lucent_topbar_info',
				  'type'         => 'button_set',
				  'title'      => __( 'Topbar Info', 'lucent' ),
				  'subtitle'     => __( 'Show info in Topbar', 'lucent' ),
				  'required'   => array( 'lucent_topbar_on', '=', 'yes' ),
				  'options'  => array(
					  'yes'   => 'Yes',
					  'no'    => 'No',
				  ),
				  'default'   => 'no',
			  ),
			  array(
				  'id'       => 'lucent_topbar_info_1',
				  'type'         => 'text',
				  'title'      => __( 'Contact Number', 'lucent' ),
				  'desc'       => __( 'Show contact number in topbar','lucent' ),
				  'required'   => array( 'lucent_topbar_on', '=', 'yes' ),
				  'default'   => '+371-29 25 4105',
			  ),
			  array(
				  'id'       => 'lucent_topbar_info_2',
				  'type'         => 'text',
				  'title'      => __( 'Topbar Email', 'lucent' ),
				  'desc'       => __( 'Show extra email address in topbar','lucent' ),
				  'required'   => array( 'lucent_topbar_on', '=', 'yes' ),
				  'default'   => 'info@lucenttheme.com',
			  ),
		  ),
	  )
);
