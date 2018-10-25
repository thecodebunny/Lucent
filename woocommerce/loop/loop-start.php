<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */
$lucent_global = lucent_global();
 
$lucent_shop_columns = $lucent_global['lucent_shop_layout'];
$lucent_mason_columns = $lucent_global['lucent_shop_columns'];
 
?>

<?php if ( '1' === $lucent_global['lucent_woo_filter'] && is_shop()) : { do_action( 'Lucent_Archives_Category_Filter' ); } endif; ?>


<ul class="products <?php if ( 'lucent-masonry grid' !== $lucent_global['lucent_shop_layout'] ) : {echo $lucent_shop_columns;} ;  else : {echo 'lucent-masonry grid';} endif;?>">

