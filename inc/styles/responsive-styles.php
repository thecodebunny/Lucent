<?php

/**
 * Lucent Responsive Inline CSS
 *
 * Load Theme related dynamic css
 *
 * @package Lucent
 * @since Lucent 1.0
 */
 
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
 /*****************************************************
  * 
  * HEADER LAYOUTS
  * 
  ****************************************************/
  
  $lucent_global = lucent_global();
  
  /********************** MOBILE PHONES *************/
  
?>

@media only screen and (min-width: 320px) and (max-width: 568px) {

<?php  if (in_array($lucent_global['header_layouts'], array( 'hidden_secondary_menu'))) { ?>
 
    .header-column-left {right:auto}
 
<?php } 

 if (in_array($lucent_global['header_layouts'], array( 'logo_left_simple'))) { ?>
 
    .header-column-middle {display:none}
 
<?php }

 if (in_array($lucent_global['header_layouts'], array( 'hidden_secondary_menu'))) { ?>
 
    .header-column-left {right:auto}
 
<?php } 

 if ($lucent_global['header_layouts'] == 'logo_center_search') { ?>

    body.menu-open #main-navigation ul.menu {right: 0}

<?php } 

 if ($lucent_global['header_layouts'] == 'menu_left_logo_center') { ?>

    body.menu-open #main-navigation ul.menu {left: 0}

<?php } 

 if ($lucent_global['header_layouts'] == 'hidden_menu_with_logo' || $lucent_global['header_layouts'] == 'fancynav_left' || $lucent_global['header_layouts'] == 'fancynav_right') { ?>

    .lucent-vertical-nav {display: block}

<?php } if ($lucent_global['header_layouts'] == 'hidden_menu_with_logo' && $lucent_global['lucent_slide_direction'] == 'left') { ?>

    .header-column-left {text-align: left}

<?php } if ($lucent_global['header_layouts'] == 'hidden_menu_with_logo' && $lucent_global['lucent_slide_direction'] == 'right') { ?>

    .header-column-right {text-align: right}
    .header-column-middle {display: none}

<?php } 

 if ($lucent_global['lucent_secondary_direction'] == 'right' || $lucent_global['lucent_secondary_direction'] == 'top') { ?>

    .top-strip .strip-right {
    width: 40%;
    }
    .top-strip .strip-left {
    width: 60%;
    }
    .toggle-hiddensecond {
    margin-top: -10px;
    position: absolute;
    right: 0;
    }
<?php } ?>

}

<?php
/************************** TABS AND IPADS *********************/
?>
@media only screen and (min-width: 768px) and (max-width: 1024px) {

<?php  if (in_array($lucent_global['header_layouts'], array( 'hidden_secondary_menu'))) { ?>
 
    .header-column-left {right:auto; margin-right: 0}
 
<?php } 

 if (in_array($lucent_global['header_layouts'], array( 'menu_left_logo_center'))) { ?>
 
    .header-column-left {top: 140px;}
    .header-column-middle {margin-bottom: 50px; margin-top: -50px;}
 
<?php } 

 if (in_array($lucent_global['header_layouts'], array( 'logo_center_search'))) { ?>
 
    .mobile-nav {display:block}
    .header-column-left {width: 100%; text-align: center;}
    #search-box {display: none}
    .header-column-right { width: 100%; margin: 15px auto 0; }
    #searchform {margin: 0 auto;}
    
<?php } ?>


}

@media only screen and (min-width: 1024px) and (max-width: 1280px) {

<?php if (in_array($lucent_global['header_layouts'], array( 'logo_center_search'))) { ?>
 
    .mobile-nav {display:block}
    #search-box {display: none}
    .header-column-right {float: none; bottom:-80px !important; }
    #searchform {margin: 0 auto;}
    
<?php } 
 
 if (in_array($lucent_global['header_layouts'], array( 'menu_left_logo_center'))) { ?>
 
    .header-column-left {float:right}
    .header-column-right { padding: 0; bottom: -80px; width: 100%; float: none; }
    
<?php } ?>
}