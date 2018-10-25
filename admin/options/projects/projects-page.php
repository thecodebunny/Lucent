<?php
  /**
   *
   *
   * Projects Page options
   *
   * @package Lucent
   **/

  Redux::setSection(
	  'lucent_opts',
	  array(
		  'id'         => 'lucent_project_page',
		  'title'      => __( 'Projects Page Options','lucent' ),
		  'icon'       => 'panel-document',
		  'subsection' => true,
		  'fields'     => array(
			  array(
				  'id'       => 'lucent_projects_page_layout',
				  'type'         => 'select',
				  'title'      => __( 'Projects page design', 'lucent' ),
				  'desc'     => __( 'Choose projects page design.', 'lucent' ),
				  'options'  => array(
					  'standard'      => 'Standard Projects Page Style',
					  'flat'          => 'Flat Lucent Theme Style',
					  'full'          => 'Lucent Full Width Style',
				  ),
				  'default'   => 'flat',
			  ),
			  array(
				  'id'       => 'lucent_project_desc',
				  'type'         => 'button_set',
				  'title'      => __( 'Show Description?', 'lucent' ),
				  'desc'     => __( 'Show description under product thumbnail?','lucent' ),
				  'options'  => array(
					  'show'  => 'Show',
					  'dont'  => 'Don\'t show',
				  ),
				  'default'   => 'dont',
			  ),
			  array(
				  'id'       => 'lucent_projects_filter',
				  'type'         => 'button_set',
				  'title'      => __( 'Show Filter?', 'lucent' ),
				  'desc'     => __( 'Show Category Filter?','lucent' ),
				  'options'  => array(
					  'yes'   => 'Yes',
					  'no'    => 'No',
				  ),
				  'default'   => 'yes',
			  ),

			  array(
				  'id'       => 'lucent_project_popup',
				  'type'         => 'button_set',
				  'title'      => __( 'Show Popup?', 'lucent' ),
				  'desc'     => __( 'Show a popup window with project details?','lucent' ),
				  'options'  => array(
					  'yes'   => 'Yes',
					  'no'    => 'No',
				  ),
				  'default'   => 'yes',
			  ),

			  array(
				  'id'           => 'lucent_projects_layout',
				  'type'         => 'image_select',
				  'title'        => __( 'Projects layout', 'lucent' ),
				  'subtitle'     => __( 'Choose projects page layout.', 'lucent' ),
				  'desc'         => __( 'Choose between the number of columns (grid) or masonry layout.','lucent' ),
				  'required' => array( 'lucent_projects_page_layout', '!=', 'full' ),
				  'options'  => array(
					  'list'      => array(
						  'alt'   => __( 'List projects layout','lucent' ),
						  'img'   => ReduxFramework::$_url . 'assets/img/layout/list.png',
					  ),
					  'grid col-2'      => array(
						  'alt'   => __( '2 columns projects layout', 'lucent' ),
						  'img'   => ReduxFramework::$_url . 'assets/img/layout/projects/projects-standard-2.png',
					  ),
					  'grid col-3'      => array(
						  'alt'   => __( '3 columns projects layout','lucent' ),
						  'img'   => ReduxFramework::$_url . 'assets/img/layout/projects/projects-standard-3.png',
					  ),
					  'grid col-4'      => array(
						  'alt'   => __( '4 columns projects layout','lucent' ),
						  'img'   => ReduxFramework::$_url . 'assets/img/layout/projects/projects-standard-4.png',
					  ),
					  'grid col-5'      => array(
						  'alt'   => __( '5 columns projects layout','lucent' ),
						  'img'   => ReduxFramework::$_url . 'assets/img/layout/projects/projects-standard-5.png',
					  ),
					  'grid col-6'      => array(
						  'alt'   => __( '6 columns projects layout','lucent' ),
						  'img'   => ReduxFramework::$_url . 'assets/img/layout/projects/projects-standard-6.png',
					  ),
					  'lucent-masonry grid'      => array(
						  'alt'   => __( 'Masonry projects layout','lucent' ),
						  'img'   => ReduxFramework::$_url . 'assets/img/layout/projects/projects-standard-masonry-4.png',
					  ),
					  'lucent-masonry grid no-margin'      => array(
						  'alt'   => __( 'Masonry projects layout without margin','lucent' ),
						  'img'   => ReduxFramework::$_url . 'assets/img/layout/projects/project-masonry-no-margin.png',
					  ),
				  ),
				  'default' => 'lucent-masonry grid',
			  ),
			  array(
				  'id'           => 'lucent_full_projects_layout',
				  'type'         => 'image_select',
				  'title'        => __( 'Projects layout', 'lucent' ),
				  'subtitle'     => __( 'Choose projects page layout.', 'lucent' ),
				  'desc'         => __( 'Choose between the number of columns (grid) or masonry layout.','lucent' ),
				  'required' => array( 'lucent_projects_page_layout', '=', 'full' ),
				  'options'  => array(
					  'lucent-full-width-projects'      => array(
						  'alt'   => __( 'Masonry projects layout without margin','lucent' ),
						  'img'   => ReduxFramework::$_url . 'assets/img/layout/projects/full-width.png',
					  ),
					  'lucent-full-carousel-projects'      => array(
						  'alt'   => __( 'Masonry projects layout without margin','lucent' ),
						  'img'   => ReduxFramework::$_url . 'assets/img/layout/projects/horizontal.png',
					  ),
				  ),
				  'default' => 'lucent-full-width-projects',
			  ),
			  array(
				  'id'       => 'lucent_projects_masonry_columns',
				  'type'         => 'select',
				  'title'      => __( 'Masonry Columns', 'lucent' ),
				  'desc'         => __( 'Choose number of columns for masonry layout.', 'lucent' ),
				  'required' => array( 'lucent_projects_layout', '=', 'lucent-masonry grid' ),
				  'options'  => array(
					  'col-2'     => '2 Columns',
					  'col-3'     => '3 Columns',
					  'col-4'     => '4 Columns',
					  'col-5'     => '5 Columns',
					  'col-6'     => '6 Columns',
				  ),
				  'default'   => 'col-4',
			  ),
			  array(
				  'id'         => 'lucent_project_word_count',
				  'type'       => 'spinner',
				  'title'      => __( 'Limit Word Count', 'lucent' ),
				  'description' => __( 'Limit Project Description', 'lucent' ),
				  'default'    => '20',
				  'step'       => '5',
			  ),

			  array(
				  'id'       => 'lucent_projects_nomargin_columns',
				  'type'         => 'select',
				  'title'      => __( 'Masonry Columns', 'lucent' ),
				  'desc'         => __( 'Choose number of columns for masonry layout.', 'lucent' ),
				  'required' => array( 'lucent_projects_layout', '=', 'lucent-masonry grid no-margin' ),
				  'options'  => array(
					  'col-2'     => '2 Columns',
					  'col-3'     => '3 Columns',
					  'col-4'     => '4 Columns',
					  'col-5'     => '5 Columns',
					  'col-6'     => '6 Columns',
				  ),
				  'default'   => 'col-4',
			  ),
			  array(
				  'id'       => 'lucent_products_per_page',
				  'type'         => 'text',
				  'title'      => __( 'No. of Products', 'lucent' ),
				  'desc'         => __( 'Choose number of products shown on Projects and Category pages.', 'lucent' ),
				  'validate'     => 'number',
				  'default'   => '-1',
			  ),
			  array(
				  'id'       => 'lucent_projects_images',
				  'type'     => 'select',
				  'title'    => __( 'Images styles', 'lucent' ),
				  'desc'     => __( 'Select what happens on image hover.', 'lucent' ),
				  'required' => array( 'lucent_projects_page_layout', '=', 'standard' ),
				  'options'  => array(
					  'icons'     => 'Show icons with links on hover',
					  'image'     => 'Show secondory image on hover',
				  ),
				  'default'  => 'icons',
			  ),
			  array(
				  'id'       => 'lucent_projects_hover_styles',
				  'type'     => 'select',
				  'title'    => __( 'Image hover styles', 'lucent' ),
				  'desc'     => __( 'Select what happens on image hover.', 'lucent' ),
				  'required'  => array( 'lucent_projects_images', '=', 'icons' ),
				  'options'  => array(
					  'slide-bottom'  => 'Slide from bottom',
					  'slide-top'     => 'Slide from top',
					  'slide-right'   => 'Slide from right',
					  'slide-left'    => 'Slide from left',
				  ),
				  'default'  => 'slide-top',
			  ),
			  array(
				  'id'       => 'lucent_projects_effect',
				  'type'         => 'select',
				  'title'      => __( 'Effect', 'lucent' ),
				  'desc'     => __( 'Choose animation effect to show second image.', 'lucent' ),
				  'required' => array( 'lucent_projects_images', '=', 'image' ),
				  'options'  => array(
					  'rotate'    => '360 Rotation',
					  'zoom'      => 'Zoom in out',
				  ),
				  'default'    => 'zoom',
			  ),
		  ),
	  )
  );
