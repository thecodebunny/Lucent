<?php
  /**
   *
   * WooCommerce Social Media options
   *
   * @package Lucent
   ****************************************/

  Redux::setSection(
	  'lucent_opts',
	  array(
		  'id'         => 'lucent_woo_social',
		  'title'      => __( 'WooCommerce Sharing ','lucent' ),
		  'desc'     => __( 'Social sharing for WooCommerce.','lucent' ),
		  'icon'       => 'panel-basket',
		  'subsection' => true,
		  'multi'        => true,
		  'fields'       => array(
			  array(
				  'id'        => 'lucent_woo_share_label',
				  'type'        => 'button_set',
				  'title'     => __( 'Network Label', 'lucent' ),
				  'subtitle'  => __( 'Show Network label?', 'lucent' ),
				  'options'   => array(
					  'true'  => 'Yes',
					  'false'     => 'No',
				  ),
				  'default'  => 'false',
			  ),
			  array(
				  'id'        => 'lucent_woo_share_link',
				  'type'        => 'button_set',
				  'title'     => __( 'Share link behaviour', 'lucent' ),
				  'subtitle'  => __( 'Chose how to open the link when clicked.', 'lucent' ),
				  'options'   => array(
					  'self'      => 'Same Page',
					  'blank'     => 'New Tab',
					  'popup'     => 'New Window',
				  ),
				  'default'   => 'blank',
			  ),
			  array(
				  'id'        => 'lucent_woo_share_count',
				  'type'        => 'button_set',
				  'title'     => __( 'Share Count', 'lucent' ),
				  'subtitle'  => __( 'Show Share Counts?', 'lucent' ),
				  'options'   => array(
					  'true'  => 'Yes',
					  'false'     => 'No',

				  ),
				  'default'  => 'false',
			  ),
		  ),
	  )
  );
