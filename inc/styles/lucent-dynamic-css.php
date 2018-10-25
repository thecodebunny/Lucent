<?php

/**
 * 
 * Load CSS from our theme options 
 * 
 * @package Lucent
 * @author TheCodeBunny
 * @link www.thecodebunny.com 
 **/



$lucent_global = lucent_global();

if ('boxed_layout' === $lucent_global['site_layout'] ) { ?>
    .lucent-boxed {
        width: <?php echo $lucent_global['boxed_layout_width']['width']; ?>;
        margin-top: <?php echo $lucent_global['lucent_boxed_margin']['margin-top']; ?>;
        margin-bottom: <?php echo $lucent_global['lucent_boxed_margin']['margin-bottom']; ?>;
    }
<?php } if ('1' === $lucent_global['boxed_box_shadow'] ) { ?>
    .lucent-boxed {
       box-shadow: 8px 0 10px -4px rgba(0, 0, 0, 0.5), -12px 0 6px -4px rgba(0, 0, 0, 0.5);
    }
<?php }

/**
 *
 * Header CSS ouputs based on theme options.
 */
if (class_exists('WooCommerce')) {
if ( '1' === $lucent_global['lucent_woo_addtocart'] && is_shop()) { ?>

    ul.products li .single_add_to_cart_button,
    ul.products li .quantity {
        display:none !important;
    }

<?php }
} if ( 'flat' === $lucent_global['lucent_shop_page'] ) { ?>

    .lucent3d-item.effect1.left_and_right .info p {
        top: auto;
        bottom: 60px;
    }

<?php } if ( 'yes' === $lucent_global['lucent_topbar_shadow'] ) { ?>

    .topbar {
        -webkit-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.75);
        box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.75);
    }

<?php } 

/**
 *
 * Css Outputs only for desktops
 */

?>
@media (min-width: 768px) {
body #content {
    width: <?php echo $lucent_global['layout_width']['width']; ?>;
}
#lucent-side-header {
    width: <?php echo $lucent_global['lucent_sideheader_width']['width']; ?>;
}

<?php if ( 'boxed' !== $lucent_global['header_top'] ) { ?>
    
        #lucent-brand-container {
            width: <?php echo $lucent_global['layout_width']['width'];?>;
        }
    
<?php } if ( 'side' === $lucent_global['header_position'] && 'yes' === $lucent_global['lucent_side_shadow'] ) { ?>
    
        #lucent-side-header {
            -webkit-box-shadow: 5px 5px 5px 5px rgba(136,136,136,0.78);
            -moz-box-shadow: 5px 5px 5px 5px rgba(136,136,136,0.78);
            box-shadow: 5px 5px 5px 5px rgba(136,136,136,0.78);
        }
    
<?php } ?>
}