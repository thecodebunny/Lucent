<?php

  /**********************************
  *
  * Custom CSS & JS Options
  *
  * @package Lucent
  *
  **********************************/

  Redux::setSection(
          'lucent_opts',
         	 	array(
                 'id'         => 'lucent_custom',
                 'title'      => __('Custom CSS & JS','lucent'),
                 'desc'		=> __('','lucent'),
                 'subtitle'  	=> __('', 'lucent'),
                 'icon'       => 'panel-clipboard',
                 'subsection' => false,
          	   'fields'		=> array (
          	array(
                 'id'  	    => 'lucent_custom_css',
                 'type'     	=> 'ace_editor',
  			   'title'     	=> __('Custom CSS', 'lucent'),
                 'subtitle'  	=> __('', 'lucent'),
                 'desc'		=> __('Add custom css.','lucent'),
                 'default'    => '/*********************************************************
   *
   * THESE CSS STYLES WILL BE ADDED AS INLINE STYLE
   * CHECK FOR Lucent THEME OPTIONS STYLE ID IN CONSOLE.
   *
   ********************************************************/',
                 'mode'		=> 'css',
                 'theme'    	=> 'chrome',
                 'options'    => array ('minLines' => 25),
                 ),
  			array(
                 'id'  	    => 'lucent_custom_js',
                 'type'     	=> 'ace_editor',
  			   'title'     	=> __('Custom Javascript', 'lucent'),
                 'subtitle'  	=> __('', 'lucent'),
                 'desc'		=> __('Add custom Javascript to the footer.','lucent'),
                 'mode'		=> 'javascript',
                 'theme'    	=> 'monokai',
                 'default'    => '/*********************************************************
   *
   * THESE SCRIPTS WILL BE ADDED TO THE FOOTER
   * GO AHEAD AND ADD IT BETWEEN THE TAGS.
   *
   ********************************************************/

      jQuery( document ).ready( function( $ ) {
      \'use-strict\';


      });',
                 'options'    => array ('minLines' => 25),
  					),
  					        )
  )
  );
