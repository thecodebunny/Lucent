<?php
  /**
   *
   * Typography Options
   *
   * @package Lucent
   **/

  Redux::setSection(
	  'lucent_opts',
	  array(
		  'id'         => 'lucent_typography',
		  'title'      => __( 'Typography','lucent' ),
		  'icon'       => 'panel-type',
		  'subsection' => false,
		  'fields'     => array(
			  array(
				  'id'       => 'lucent_typo_main_menu',
				  'type'         => 'button_set',
				  'title'      => __( 'Menus', 'lucent' ),
				  'desc'     => __( 'Use custom typography for menus?','lucent' ),
				  'options'  => array(
					  'yes'   => 'Yes',
					  'no'    => 'No',
				  ),
				  'default'   => 'no',
			  ),
			  array(
				  'id'       => 'lucent_typo_menu',
				  'type'         => 'typography',
				  'title'      => __( 'Main menu fonts', 'lucent' ),
				  'desc'       => __( 'You can choose backup non-google fonts to use in case of google api problems.', 'lucent' ),
				  'required'   => array( 'lucent_typo_main_menu', '=', 'yes' ),
				  'color'        => true,
				  'line-height' => false,
				  'text-align'   => false,
				  'font-size'    => true,
				  'font-style'   => true,
				  'subset'       => false,
				  'font-weight' => true,
				  'font-backup' => true,
				  'output'     => array( '#main-navigation ul.menu li, .verticalNav li a, #main-navigation ul.menu li.menu-item-no-children a, #main-navigation ul.menu li ul.sub-menu li a, #main-navigation ul.menu li a, #main-navigation ul.menu li, .verticalNav li a, #main-navigation ul.menu li.menu-item-no-children a, #main-navigation ul.menu li ul.sub-menu li a, #main-navigation ul.menu li a ' ),
				  'default'     => array(
					  'color'       => '#3C585E',
					  'font-style'  => '700',
					  'font-family' => 'Lato',
					  'google'      => true,
					  'font-size'   => '18px',
					  'font-weight' => 400,
				  ),

			  ),
			  array(
				  'id'       => 'lucent_typo_main_content',
				  'type'         => 'button_set',
				  'title'      => __( 'Main body content', 'lucent' ),
				  'desc'     => __( 'Use custom typography for main body contents?','lucent' ),
				  'options'  => array(
					  'yes'   => 'Yes',
					  'no'    => 'No',
				  ),
				  'default'   => 'no',
			  ),
			  array(
				  'id'       => 'lucent_typo_content',
				  'type'         => 'typography',
				  'title'      => __( 'Main Content fonts', 'lucent' ),
				  'output'     => array( 'body' ),
				  'required'   => array( 'lucent_typo_main_content', '=', 'yes' ),
				  'default'     => array(
					  'color'       => '#3C585E',
					  'font-style'  => '400',
					  'font-family' => 'Merriweather',
					  'google'      => true,
					  'font-size'   => '16px',
				  ),
				  'color'        => true,
				  'line-height' => false,
				  'text-align'   => false,
				  'font-size'    => true,
				  'subset'       => false,
				  'font-weight' => true,
				  'font-backup' => true,
			  ),
			  array(
				  'id'       => 'lucent_typo_title_text',
				  'type'         => 'button_set',
				  'title'      => __( 'Titles', 'lucent' ),
				  'desc'     => __( 'Use custom typography for sitewide titles?','lucent' ),
				  'options'  => array(
					  'yes'   => 'Yes',
					  'no'    => 'No',
				  ),
				  'default'   => 'no',
			  ),
			  array(
				  'id'       => 'lucent_typo_title',
				  'type'         => 'typography',
				  'title'      => __( 'Page title', 'lucent' ),
				  'desc'       => __( 'Used for all pages including shop and archives.', 'lucent' ),
				  'required'   => array( 'lucent_typo_title_text', '=', 'yes' ),
				  'output'     => array( '.page-title' ),
				  'default'     => array(
					  'color'       => '#3C585E',
					  'font-style'  => '800',
					  'font-family' => 'Lato',
					  'google'      => true,
					  'font-size'   => '21px',
				  ),
				  'color'        => true,
				  'line-height' => false,
				  'text-align'   => false,
				  'font-size'    => true,
				  'subset'       => false,
				  'font-weight' => true,
				  'font-backup' => true,
			  ),
			  array(
				  'id'       => 'lucent_typo_footer_text',
				  'type'         => 'button_set',
				  'title'      => __( 'Footer', 'lucent' ),
				  'desc'     => __( 'Use custom typography for footer?','lucent' ),
				  'options'  => array(
					  'yes'   => 'Yes',
					  'no'    => 'No',
				  ),
				  'default'   => 'no',
			  ),
			  array(
				  'id'       => 'lucent_typo_footer',
				  'type'         => 'typography',
				  'title'      => __( 'Footer fonts', 'lucent' ),
				  'required'   => array( 'lucent_typo_footer_text', '=', 'yes' ),
				  'output'     => array( '.footer' ),
				  'default'     => array(
					  'color'       => '#3C585E',
					  'font-style'  => '400',
					  'font-family' => 'Merriweather',
					  'google'      => true,
					  'font-size'   => '16px',
				  ),
				  'color'        => true,
				  'line-height' => false,
				  'text-align'   => false,
				  'font-size'    => true,
				  'subset'       => false,
				  'font-weight' => true,
				  'font-backup' => true,
			  ),
			  array(
				  'id'       => 'lucent_typo_headings',
				  'type'         => 'button_set',
				  'title'      => __( 'Headings', 'lucent' ),
				  'subtitle'     => __( 'Use custom headings?', 'lucent' ),
				  'desc'     => __( 'Select if you want to choose custom heading options (H1-H6)','lucent' ),
				  'options'  => array(
					  'yes'   => 'Yes',
					  'no'    => 'No',
				  ),
				  'default'   => 'no',
			  ),
			  array(
				  'id'       => 'lucent_typo_h1',
				  'type'         => 'typography',
				  'title'      => __( 'H1 Headings', 'lucent' ),
				  'required'   => array( 'lucent_typo_headings', '=', 'yes' ),
				  'output'     => array( '.h1' ),
				  'default'     => array(
					  'color'       => '#3C585E',
					  'font-style'  => '700',
					  'font-family' => 'Lato',
					  'google'      => true,
					  'font-size'   => '32px',
				  ),
				  'color'        => true,
				  'line-height' => false,
				  'text-align'   => false,
				  'font-size'    => true,
				  'subset'       => false,
				  'font-weight' => true,
				  'font-backup' => true,
				  'font-weght'  => '700',
			  ),
			  array(
				  'id'       => 'lucent_typo_h2',
				  'type'         => 'typography',
				  'title'      => __( 'H2 Headings', 'lucent' ),
				  'required'   => array( 'lucent_typo_headings', '=', 'yes' ),
				  'output'     => array( '.h2' ),
				  'default'     => array(
					  'color'       => '#3C585E',
					  'font-style'  => '700',
					  'font-family' => 'Lato',
					  'google'      => true,
					  'font-size'   => '28px',
					  'font-weght'  => '600',
				  ),
				  'color'        => true,
				  'line-height' => false,
				  'text-align'   => false,
				  'font-size'    => true,
				  'subset'       => false,
				  'font-weight' => true,
				  'font-backup' => true,
			  ),
			  array(
				  'id'       => 'lucent_typo_h3',
				  'type'         => 'typography',
				  'title'      => __( 'H3 Headings', 'lucent' ),
				  'required'   => array( 'lucent_typo_headings', '=', 'yes' ),
				  'output'     => array( '.h3' ),
				  'default'     => array(
					  'color'       => '#3C585E',
					  'font-style'  => '700',
					  'font-family' => 'Lato',
					  'google'      => true,
					  'font-size'   => '24px',
					  'font-weght'  => '500',
				  ),
				  'color'        => true,
				  'line-height' => false,
				  'text-align'   => false,
				  'font-size'    => true,
				  'subset'       => false,
				  'font-weight' => true,
				  'font-backup' => true,
			  ),
			  array(
				  'id'       => 'lucent_typo_h4',
				  'type'         => 'typography',
				  'title'      => __( 'H4 Headings', 'lucent' ),
				  'required'   => array( 'lucent_typo_headings', '=', 'yes' ),
				  'output'     => array( '.h4' ),
				  'default'     => array(
					  'color'       => '#3C585E',
					  'font-style'  => '700',
					  'font-family' => 'Lato',
					  'google'      => true,
					  'font-size'   => '18px',
					  'font-weght'  => '400',
				  ),
				  'color'        => true,
				  'line-height' => false,
				  'text-align'   => false,
				  'font-size'    => true,
				  'subset'       => false,
				  'font-weight' => true,
				  'font-backup' => true,
			  ),
			  array(
				  'id'       => 'lucent_typo_h5',
				  'type'         => 'typography',
				  'title'      => __( 'H5 Headings', 'lucent' ),
				  'required'   => array( 'lucent_typo_headings', '=', 'yes' ),
				  'output'     => array( '.h5' ),
				  'default'     => array(
					  'color'       => '#3C585E',
					  'font-style'  => '700',
					  'font-family' => 'Lato',
					  'google'      => true,
					  'font-size'   => '15px',
					  'font-weght'  => 'normal',
				  ),
				  'color'        => true,
				  'line-height' => false,
				  'text-align'   => false,
				  'font-size'    => true,
				  'subset'       => false,
				  'font-weight' => true,
				  'font-backup' => true,
			  ),
			  array(
				  'id'       => 'lucent_typo_h6',
				  'type'         => 'typography',
				  'title'      => __( 'H6 Headings', 'lucent' ),
				  'required'   => array( 'lucent_typo_headings', '=', 'yes' ),
				  'output'     => array( '.h6' ),
				  'default'     => array(
					  'color'       => '#3C585E',
					  'font-style'  => '700',
					  'font-family' => 'Lato',
					  'google'      => true,
					  'font-size'   => '12px',
					  'font-weght'  => 'normal',
				  ),
				  'color'        => true,
				  'line-height' => false,
				  'text-align'   => false,
				  'font-size'    => true,
				  'subset'       => false,
				  'font-weight' => true,
				  'font-backup' => true,
			  ),
		  ),
	  )
  );