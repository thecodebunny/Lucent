<?php
/**
 *
 * Custom Posts
 *
 * @package Lucent
 */

	Redux::setSection(
		'lucent_opts',
		array(
			'id'      => 'posts_options',
			'title'   => __( 'Post Options', 'lucent' ),
            'icon'    => 'panel-quote',
            'subsection' => false,
               
            'fields'     => array(
                array(
                    'id'         => 'lucent_posts_archive_desc',
                    'type'       => 'spinner',
                    'title'      => __( 'Posts Archive Desc. Length', 'lucent' ),
                    'desc'       => __( 'Applied to all posts including custom post types.','lucent' ),
                    'default'   => '40',
                    'min'       => '20',
                    'step'      => '1',
                ),
            ),
        )

    );


        require_once( LUCENT_OPTIONS . 'posts/posts.php' );

		require_once( LUCENT_OPTIONS . 'posts/custom-posts.php' );
