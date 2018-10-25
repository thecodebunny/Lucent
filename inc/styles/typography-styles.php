<?php

/**
 * Lucent Theme Options
 *
 * Load Theme related dynamic css
 *
 * @package Lucent
 * @since Lucent 1.0
 */
 
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
 /*****************************************************
  * 
  * SITE WIDE LAYOUTS
  * 
  ****************************************************/
  
  $lucent_global = lucent_global();
  
  if ($lucent_global['lucent_menu_uppercase'] == 'yes') { ?>
 
    #main-navigation ul.menu, .verticalNav ul, .verticalNav li a { text-transform: uppercase;}
 
 <?php  } ?>
 
 .lucentnav .touch-button, #main-navigation ul.menu, 
 .verticalNav li a, .verticalNav ul li a {
    font-family:<?php echo $lucent_global['lucent_typo_menu']['font-family'] ?>;
    font-size:<?php echo $lucent_global['lucent_typo_menu']['font-size'] ?>;
    font-weight:<?php echo $lucent_global['lucent_typo_menu']['font-weight'] ?>;
    color:<?php echo $lucent_global['lucent_typo_menu']['color'] ?>;
    }
body  {
    font-family:<?php echo $lucent_global['lucent_typo_content']['font-family'] ?>;
    font-size:<?php echo $lucent_global['lucent_typo_content']['font-size'] ?>;
    font-weight:<?php echo $lucent_global['lucent_typo_content']['font-weight'] ?>;
    color:<?php echo $lucent_global['lucent_typo_content']['color'] ?> !important;
    }
    
.woocommerce .variations  {
    font-family:<?php echo $lucent_global['lucent_typo_content']['font-family'] ?>;
    font-size:<?php echo $lucent_global['lucent_typo_content']['font-size'] ?>;
    font-weight:<?php echo $lucent_global['lucent_typo_content']['font-weight'] ?>;
    color:<?php echo $lucent_global['lucent_typo_content']['color'] ?>;
    }
    
.entry-summary .textarea .comment-form  {
    font-family:<?php echo $lucent_global['lucent_typo_content']['font-family'] ?>;
    font-size:<?php echo $lucent_global['lucent_typo_content']['font-size'] ?>;
    font-weight:<?php echo $lucent_global['lucent_typo_content']['font-weight'] ?>;
    color:<?php echo $lucent_global['lucent_typo_content']['color'] ?>;
    }
    
.page-title {
    font-family:<?php echo $lucent_global['lucent_typo_title']['font-family'] ?>;
    font-size:<?php echo $lucent_global['lucent_typo_title']['font-size'] ?>;
    font-weight:<?php echo $lucent_global['lucent_typo_title']['font-weight'] ?>;
    color:<?php echo $lucent_global['lucent_typo_title']['color'] ?>;
    }
    
.lucent-footer {
    font-family:<?php echo $lucent_global['lucent_typo_footer']['font-family'] ?>;
    font-size:<?php echo $lucent_global['lucent_typo_footer']['font-size'] ?>;
    font-weight:<?php echo $lucent_global['lucent_typo_footer']['font-weight'] ?>;
    color:<?php echo $lucent_global['lucent_typo_footer']['color'] ?>;
    }
    
h1 .entry-title {
    font-family:<?php echo $lucent_global['lucent_typo_h1']['font-family'] ?>;
    font-size:<?php echo $lucent_global['lucent_typo_h1']['font-size'] ?>;
    font-weight:<?php echo $lucent_global['lucent_typo_h1']['font-weight'] ?>;
    color:<?php echo $lucent_global['lucent_typo_h1']['color'] ?>;
    }
    
h2 {
    font-family:<?php echo $lucent_global['lucent_typo_h2']['font-family'] ?>;
    font-size:<?php echo $lucent_global['lucent_typo_h2']['font-size'] ?>;
    font-weight:<?php echo $lucent_global['lucent_typo_h2']['font-weight'] ?>;
    color:<?php echo $lucent_global['lucent_typo_h2']['color'] ?>;
    }
    
h3 {
    font-family:<?php echo $lucent_global['lucent_typo_h3']['font-family'] ?>;
    font-size:<?php echo $lucent_global['lucent_typo_h3']['font-size'] ?>;
    font-weight:<?php echo $lucent_global['lucent_typo_h3']['font-weight'] ?>;
    color:<?php echo $lucent_global['lucent_typo_h3']['color'] ?>;
    }
    
h4 {
    font-family:<?php echo $lucent_global['lucent_typo_h4']['font-family'] ?>;
    font-size:<?php echo $lucent_global['lucent_typo_h4']['font-size'] ?>;
    font-weight:<?php echo $lucent_global['lucent_typo_h4']['font-weight'] ?>;
    color:<?php echo $lucent_global['lucent_typo_h4']['color'] ?>;
    }
    
h5 {
    font-family:<?php echo $lucent_global['lucent_typo_h5']['font-family'] ?>;
    font-size:<?php echo $lucent_global['lucent_typo_h5']['font-size'] ?>;
    font-weight:<?php echo $lucent_global['lucent_typo_h5']['font-weight'] ?>;
    color:<?php echo $lucent_global['lucent_typo_h5']['color'] ?>;
    }
    
h6 {
    font-family:<?php echo $lucent_global['lucent_typo_h6']['font-family'] ?>;
    font-size:<?php echo $lucent_global['lucent_typo_h6']['font-size'] ?>;
    font-weight:<?php echo $lucent_global['lucent_typo_h6']['font-weight'] ?>;
    color:<?php echo $lucent_global['lucent_typo_h6']['color'] ?>;
    }