<?php
  /**
   *
   *
   * Minify options
   *
   * @package Lucent
   */

Redux::setSection(
	'lucent_opts',
	array(
		'id'         => 'minify',
		'title'      => __( 'Minify','lucent' ),
		'desc'     => __( 'Minify CSS/JS and/or combine them.','lucent' ),
		'icon'       => 'panel-document',
		'subsection' => true,
		'fields'       => array(
			array(
				'id'         => 'lucent_minify_HTML',
				'type'       => 'switch',
				'title'      => __( 'Enable Minify HTML','lucent' ),
				'subtitle'   => __( 'Minify HTML Output','lucent' ),
				'desc'       => __( 'Though this is good for pagespeed, please disable this option if your site breaks.','lucent' ),
				'default'    => true,
			),
			array(
				'id'         => 'lucent_minify_inline_CSS',
				'type'       => 'switch',
				'title'      => __( 'Enable Minify Inline CSS & JS','lucent' ),
				'desc'       => __( 'NOT RECOMMONDED','lucent' ),
				'required'   => array( 'lucent_minify_HTML', 'equals', '1' ),
				'default'    => false,
			),
			array(
				'id'         => 'lucent_minify_css',
				'type'       => 'switch',
				'title'      => __( 'Enable Minify CSS','lucent' ),
				'subtitle'   => __( 'Use minified version of css files.','lucent' ),
				'desc'       => __( 'Though this is good for pagespeed, please disable this option if your site breaks.','lucent' ),
				'default'    => true,
			),
			array(
				'id'         => 'lucent_minify_js',
				'type'       => 'switch',
				'title'      => __( 'Enable Minify JS','lucent' ),
				'subtitle'   => __( 'Use minified version of js files.','lucent' ),
				'desc'       => __( 'Though this is good for pagespeed, please disable this option if your site breaks.','lucent' ),
				'default'    => true,
			),
			array(
				'id'         => 'lucent_combine_css',
				'type'       => 'switch',
				'title'      => __( 'Enable Combine CSS','lucent' ),
				'subtitle'   => __( 'Combine all css files into one.','lucent' ),
				'desc'       => __( 'Though this is good for pagespeed, please disable this option if your site breaks.','lucent' ),
				'default'    => false,
			),
			array(
				'id'         => 'lucent_combine_js',
				'type'       => 'switch',
				'title'      => __( 'Enable Combine JS','lucent' ),
				'subtitle'   => __( 'Combine all js files into one.','lucent' ),
				'desc'       => __( 'Though this is good for pagespeed, please disable this option if your site breaks.','lucent' ),
				'default'    => false,
			),
			array(
				'id'         => 'lucent_mini_combine_css',
				'type'       => 'switch',
				'title'      => __( 'Enable Minify & Combine CSS','lucent' ),
				'subtitle'   => __( 'Combine all css files into one and minify it.','lucent' ),
				'desc'       => __( 'Though this is good for pagespeed, please disable this option if your site breaks.','lucent' ),
				'default'    => false,
			),
			array(
				'id'         => 'lucent_mini_combine_js',
				'type'       => 'switch',
				'title'      => __( 'Enable Minify & Combine JS','lucent' ),
				'subtitle'   => __( 'Combine all js files into one and minify it.','lucent' ),
				'desc'       => __( 'Though this is good for pagespeed, please disable this option if your site breaks.','lucent' ),
				'default'    => false,
			),
		),
	)
);
