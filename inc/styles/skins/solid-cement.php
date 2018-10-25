<?php

/**
 * Lucent Colors Inline CSS
 *
 * Load Theme related dynamic css
 *
 * @package Lucent
 * @since Lucent 1.0
 */
 
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 /****************************************************
 * 
 * SOLID CEMENT STYLE
 * 
 ****************************************************/
 $lucent_global = lucent_global();
 
 if ($lucent_global['global_color_presets'] == 'solid_cement') { ?>
 
    #button, button, .button, .flat-links a, .strip-social li a, .top-strip .strip-middle li a, .side-social li a, .lucent-socials li a, .side-social-bottom li a, .asHolder {
        background-color: #f2b632 !important;
        color: #FFF
    }
    
    #main-navigation ul.menu li a, #secondary-navigation ul.menu li a {
        border-top: 0 !important;
        border-bottom: 0 !important
    }
    #main-navigation ul.menu last-item, #secondary-navigation ul.menu last-item a {
        border-left: 0 !important
    }
    .top-strip, .bottom-strip, #main-navigation ul.menu li a, #secondary-navigation ul.menu li a, .asHolder {
        border: 1px solid #5b6871;
    }
    .top-strip, .bottom-strip {
        border-top: 1px solid #5b6871;
        border-bottom: 1px solid #5b6871;
    }
    
    body, #main-navigation ul.menu li a, #secondary-navigation ul.menu li a, .ac-woo .ac-element-title, .ac-woo .ac-element-value {color: <?php echo $lucent_global['lucent_fonts_color']; ?>;}
    
    li > a, #main-navigation ul.menu li.current-menu-item>a, #secondary-navigation ul.menu li.current-menu-item>a {color: <?php echo $lucent_global['lucent_links_color']; ?>;}
    
 <?php } 