<?php

  /****************************************
  *
  * Login Background options
  *
  * since 1.1
  *
  ****************************************/

  Redux::setSection(
        'lucent_opts',
		array(
               'id'         => 'lucent_admin_login_bg',
               'title'      => __('Login Page Background Options','lucent'),
               'desc'		=> __('Choose Login Styles and Layouts','lucent'),
               'icon'       => 'panel-bucket',
               'subsection' => true,
               'fields'		=> array (
	    array(
               'id'         => 'lucent_login_background',
               'type'       => 'button_set',
               'title'      => __('Login Page Background.','lucent'),
               'subtitle'   => __('Select Type Of Background','lucent'),
               'desc'       => __('','lucent'),
               'options' => array(
                            'color' => 'Color/Image',
                            'video' => 'Video',
                             ),
                            'default' => 'video'
			 ),
		array(
               'id'         => 'lucent_login_color_background',
               'type'       => 'background',
               'url'		=> true,
               'title'      => __('Color or Image Background.','lucent'),
               'subtitle'   => __('','lucent'),
               'desc'       => __('','lucent'),
               'required'   => array( 'lucent_login_background', '=', 'color' ),
               'default'  => array(
                            'background-color' => '#02ABE3',
                            )
			 ),
        array(
               'id'         => 'lucent_video_autoplay',
               'type'       => 'button_set',
               'title'      => __('Video Autoplay?','lucent'),
               'subtitle'   => __('','lucent'),
               'desc'       => __('','lucent'),
               'options' => array(
                            'true' => 'yes',
                            'false' => 'no',
                             ),
                            'default' => 'true'
			 ),
        array(
                    'id'        => 'lucent_video_overlay',
                    'type'      => 'color_rgba',
                    'title'     => 'RGBA Color Picker',
                    'subtitle'  => 'Choose Video Overlay Color',
                    'desc'      => '',
                    'default'   => array(
                        'color'     => '#000',
                        'alpha'     => 0.7,
                        'rgba'      => '(0,0,0,0.7)'
                ),
            ),
		array(
               'id'         => 'lucent_video_transition',
               'type'       => 'button_set',
               'title'      => __('Transition on load?','lucent'),
               'subtitle'   => __('','lucent'),
               'desc'       => __('','lucent'),
               'options' => array(
                            'true' => 'yes',
                            'false' => 'no',
                             ),
                            'default' => 'true'
			 ),
		array(
               'id'         => 'lucent_video_loop',
               'type'       => 'button_set',
               'title'      => __('Loop Video?','lucent'),
               'subtitle'   => __('','lucent'),
               'desc'       => __('','lucent'),
               'options' => array(
                            'true' => 'yes',
                            'false' => 'no',
                             ),
                            'default' => 'true'
			 ),
		array(
               'id'         => 'lucent_video_muted',
               'type'       => 'button_set',
               'title'      => __('Mute Video?','lucent'),
               'subtitle'   => __('','lucent'),
               'desc'       => __('','lucent'),
               'options' => array(
                            'true' => 'yes',
                            'false' => 'no',
                             ),
                            'default' => 'true'
			 ),
		array(
               'id'         => 'lucent_video_controls',
               'type'       => 'button_set',
               'title'      => __('Show Controls?','lucent'),
               'subtitle'   => __('','lucent'),
               'desc'       => __('','lucent'),
               'options' => array(
                            'true' => 'yes',
                            'false' => 'no',
                             ),
                            'default' => 'false'
			 ),
		array(
               'id'         => 'lucent_custom_poster',
               'type'       => 'media',
               'url'		=> true,
               'title'      => __('Upload Image To Show on Mobile','lucent'),
               'subtitle'   => __('','lucent'),
               'desc'       => __('','lucent'),
               'library_filter' => array('mp4'),
               'mode'       => false,
               'preview'    => true,
               'default'    => array(
                            'url'=>''
                            ),
			 ),
		array(
               'id'         => 'lucent_bg_source',
               'type'       => 'button_set',
               'title'      => __('Choose Video Source','lucent'),
               'subtitle'   => __('','lucent'),
               'desc'       => __('','lucent'),
               'options' => array(
                            'youtube' => 'Youtube',
                            'vimeo' => 'Vimeo',
                            'custom' => 'Custom Upload',
                             ),
                            'default' => 'youtube'
			 ),
		array(
               'id'         => 'lucent_youtube_id',
               'type'       => 'text',
               'url'		=> true,
               'title'      => __('Youtube Video ID.','lucent'),
               'subtitle'   => __('','lucent'),
               'desc'       => __('','lucent'),
               'required'   => array( 'lucent_bg_source', '=', 'youtube' ),
               'default'    => 'C4qks3IG91o'
			 ),
		array(
               'id'         => 'lucent_vimeo_id',
               'type'       => 'text',
               'url'		=> true,
               'title'      => __('Vimeo Video ID.','lucent'),
               'subtitle'   => __('','lucent'),
               'desc'       => __('','lucent'),
               'required'   => array( 'lucent_bg_source', '=', 'vimeo' ),
               'default'    => 'C4qks3IG91o'
			 ),
		array(
               'id'         => 'lucent_custom_video',
               'type'       => 'media',
               'url'		=> true,
               'title'      => __('Upload custom video.','lucent'),
               'subtitle'   => __('','lucent'),
               'desc'       => __('Supported File Format - MP4.','lucent'),
               'library_filter' => array('mp4'),
               'mode'       => false,
               'preview'    => false,
               'required'   => array( 'lucent_bg_source', '=', 'custom' ),
               'default'    => array(
                            'url'=>'https://www.youtube.com/watch?v=C4qks3IG91o'
                            ),
			    ),
            )
        )
    );
