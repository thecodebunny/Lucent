<?php
  /**
   *
   *
   * Layout options
   *
   * @package Lucent
   */

Redux::setSection(
	'lucent_opts',
	array(
		'id'    => 'layout_options',
		'title' => __( 'Layout','lucent' ),
		'icon'  => 'panel-browser',
		'subsection' => true,
		'fields' => array(
			array(
				'id'         => 'site_layout',
				'type'       => 'image_select',
				'title'      => __( 'Site layout','lucent' ),
				'desc'       => __( 'Choose site layout.','lucent' ),
				'width'		 => '40%',
				'class'      => 'layout_images background-preview',
				'options'  => array(
					'full_width'      => array(
						'alt'   => __( 'Full width layout', 'lucent' ),
						'img'   => ReduxFramework::$_url . 'assets/img/layout/full_width.jpg',
					),
					'boxed_layout'      => array(
						'alt'   => __( 'Boxed Layout', 'lucent' ),
						'img'   => ReduxFramework::$_url . 'assets/img/layout/boxed_layout.jpg',
					),
				),
				'default' => 'full_width',
			),
			array(
				'id'         => 'layout_width',
				'type'       => 'dimensions',
				'height'	 => 'false',
				'units'      => array('em','px','%'),
				'units_extended' => 'true',
				'title'      => __( 'Content width','lucent' ),
				'required' => array( 'site_layout', '=', 'full_width' ),
				'default'    => array(
					'width'=>'80',
					'units'=>'%',
				),
			),
			array(
				'id'         => 'boxed_layout_width',
				'type'       => 'dimensions',
				'height'	 => 'false',
				'required' => array( 'site_layout', '=', 'boxed_layout' ),
				'units'      => array('em','px','%'),
				'units_extended' => 'true',
				'title'      => __( 'Boxed Layout width','lucent' ),
				'default'    => array(
					'width'=>'80',
					'units'=>'%',
				),
			),
			array(
				'id'         => 'boxed_box_shadow',
				'type'       => 'switch',
				'title'      => __( 'Box Shadow','lucent' ),
				'subtitle'   => __( 'Enable Box Shadow for Content?','lucent' ),
				'default'   => true,
				'required' => array( 'site_layout', '=', 'boxed_layout' ),
			),
			array(
				'id'         => 'boxed_box_shadow_color',
				'type'       => 'color_rgba',
				'title'      => __( 'Box Shadow Color','lucent' ),
				'required' => array( 'site_layout', '=', 'boxed_layout' ),
				'default'   => array(
					'color'     => '#888',
					'alpha'     => 0.86,
				),
			),
			array(
				'id'        => 'lucent_boxed_margin',
				'type'      => 'spacing',
				'mode'           => 'margin',
				'units'          => array( 'em', 'px' ),
				'units_extended' => 'false',
				'required' => array( 'site_layout', '=', 'boxed_layout' ),
				'title'     => __( 'Boxed Layout Margin', 'lucent' ),
				'subtitle'  => __( 'Top and Bottom Margin', 'lucent' ),
				'default'            => array(
					'margin-top'     => '15px',
					'margin-right'   => '0',
					'margin-bottom'  => '15px',
					'margin-left'    => '0',
					'units'          => 'px',
				),
			),
			array(
				'id'         => 'lucent_boxed_background',
				'type'       => 'background',
				'title'      => __( 'Boxed site background','lucent' ),
				'subtitle'   => __( 'You can also choose background image.','lucent' ),
				'required' => array( 'site_layout', '=', 'boxed_layout' ),
				'desc'       => __( 'Additionaly you can choose image behaviour.','lucent' ),
				'default'    => '',
				'text_hint' => array(
					'title'     => '',
					'content'   => 'Works only with boxed width layout.',
				),
				'default' => array(
					'background-color' => '#e5e5e5',
				),
				'output' => array(
					'background-color' => 'body'
				)
			),
		),
	)
);
