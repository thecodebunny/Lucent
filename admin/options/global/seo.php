<?php
  /**
   *
   *
   * LAYOUT options
   *
   * @package Lucent
   **/

  Redux::setSection(
	  'lucent_opts',
	  array(
		  'id'         => 'analytics',
		  'title'      => __( 'SEO & Analytics','lucent' ),
		  'desc'     => __( 'Important settings for your site\'s SEO and Analytics.','lucent' ),
		  'icon'       => 'panel-bargraph',
		  'subsection' => true,
		  'fields'       => array(
			  array(
				  'id'         => 'lucent_ssl',
				  'type'       => 'switch',
				  'title'      => __( 'SSL', 'lucent' ),
				  'description' => __( 'Enable SSL Protocol?', 'lucent' ),
				  'default'    => false,
			  ),
			  array(
				  'id'         => 'lucent_facebook_opengraph',
				  'type'       => 'switch',
				  'title'      => __( 'Opengraph', 'lucent' ),
				  'description' => __( 'Enable Facebook Opengraph Protocol?', 'lucent' ),
				  'default'    => true,
			  ),
			  array(
				  'id'         => 'lucent_facebook_user_id',
				  'type'       => 'text',
				  'title'      => __( 'Facebook User ID', 'lucent' ),
				  'default'    => 'lucentwp',
			  ),
			  array(
				  'id'         => 'lucent_share_word_count',
				  'type'       => 'spinner',
				  'title'      => __( 'Limit Word Count', 'lucent' ),
				  'description' => __( 'Limit Share Popup Item Description', 'lucent' ),
				  'default'    => '20',
				  'step'       => '5',
			  ),
			  array(
				  'id'         => 'lucent_description',
				  'type'       => 'textarea',
				  'rows'     => 3,
				  'title'      => __( 'Global description for site.','lucent' ),
				  'desc'       => __( 'Enter global description to use for SEO. Meta descriptions can be any length, but search engines generally truncate snippets longer than 160 characters.','lucent' ),
			  ),
			  array(
				  'id'         => 'lucent_keywords',
				  'type'       => 'textarea',
				  'rows'     => 5,
				  'title'      => __( 'Global keywords for site.','lucent' ),
				  'desc'       => __( 'Enter global keywords to use for SEO.','lucent' ),
			  ),
			  array(
				  'id'       => 'lucent_header_javascript',
				  'type'         => 'ace_editor',
				  'title'      => __( 'Tracking Code', 'lucent' ),
				  'desc'     => __( 'Add custom Javascript or Analytics Code from Search Engines like Google, Bing etc...','lucent' ),
				  'mode'     => 'javascript',
				  'theme'        => 'monokai',
				  'default'    => '',
				  'options'    => array(
					  'minLines' => 5,
				  ),
			  ),
			  array(
				  'id'         => 'lucent_google_analytics_id',
				  'type'       => 'text',
				  'title'      => __( 'GOOGLE Property ID','lucent' ),
				  'desc'       => __( 'Google Analytics Propery ID.','lucent' ),
				  'validate' => '',
			  ),

		  ),
	  )
  );
