<?php

/**************************************************
 * Lucent Colors Inline CSS
 *
 * Load Theme Color options output
 *
 * @package Lucent
 * @since Lucent 1.0
 *
 *************************************************/
 
 $absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
 $wp_load = $absolute_path[0] . 'wp-load.php';
 require_once($wp_load);
 
 header("Content-type: text/css; charset: UTF-8");
 header('Cache-control: must-revalidate');
 
 $lucent_global = lucent_global();

 /****************************************************
 * 
 * Header & Navigation
 * 
 ****************************************************/
 
?>
    
    #masthead {
        background: <?php echo $lucent_global['lucent_header_bg']; ?>;
    }
    
    .lucentnav-clean a, .lucentnav-clean a:hover, .lucentnav-clean a:focus, .lucentnav-clean a:active, .lucentnav-clean a.highlighted {
        color: <?php echo $lucent_global['lucent_nav_fonts']; ?>;
    }
    
    .lucentnav-clean ul {
        background-color: <?php echo $lucent_global['lucent_submenu_bg']['rgba']; ?>;
        border-top: <?php echo $lucent_global['lucent_submenu_border']['border-top']; ?>;
        border-left: <?php echo $lucent_global['lucent_submenu_border']['border-left']; ?>;
        border-bottom: <?php echo $lucent_global['lucent_submenu_border']['border-bottom']; ?>;
        border-right: <?php echo $lucent_global['lucent_submenu_border']['border-right']; ?>;
        border-style: <?php echo $lucent_global['lucent_submenu_border']['border-style']; ?>;
        border-color: <?php echo $lucent_global['lucent_submenu_border']['border-color']; ?>;
    }
    
    .lucentnav-clean > li > ul:before, .lucentnav-clean > li > ul:after {
        border-bottom-color: <?php echo $lucent_global['lucent_submenu_bg']['rgba']; ?>;
    }
    
    .lucentnav-clean a span.sub-arrow {
        border-top-color: <?php echo $lucent_global['lucent_nav_fonts']; ?>;
        border-right-color: transparent;
        border-bottom-color: transparent;
        border-left-color: transparent;
    }
    
    .lucentnav-clean ul a span.sub-arrow {
        border-top-color: transparent;
        border-bottom-color: transparent;
        border-left-color: <?php echo $lucent_global['lucent_submenu_border']['border-color']; ?>;
        border-right-color: transparent;
    }
    
    .lucentnav-clean ul a:hover, .lucentnav-clean ul a:focus, .lucentnav-clean ul a:active, .lucentnav-clean ul a.highlighted {
        background-color: <?php echo $lucent_global['lucent_submenu_hover_link_bg']['rgba']; ?>;
        color: <?php echo $lucent_global['lucent_submenu_hover_fonts']; ?>;
    }