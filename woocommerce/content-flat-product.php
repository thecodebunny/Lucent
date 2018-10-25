<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
global $post, $product, $woocommerce_loop;
$lucent_global = lucent_global();
$Lucent_Archives = new Lucent_Archives;
// Extra post classes
$classes[] = 'flat-item '.$lucent_global['lucent_shop_columns'].' '.get_the_id().'';


// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$sharetitle = 'Share '.get_the_title().'';

?>
<li <?php post_class($classes); ?>>
    <div class="<?php echo $linkclass  ?>">
	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
    //do_action( 'woocommerce_before_shop_loop_item' );
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 10);
    wc_get_template( 'single-product/sale-flash.php' );
    if ( 'yes' === $lucent_global['lucent_flat_hover'] ) { do_action('lucent_woo_images'); } else {

    echo '<a href="'. get_the_permalink() .'">';

    the_post_thumbnail( 'shop_catalog', array( 'class' => 'flat-image' ) ); 

	echo '</a>';
	
    } ?>
    <div class="flat-info">
    <?php
	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
	do_action( 'woocommerce_before_shop_loop_item_title' );
	/**
	 * woocommerce_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
	do_action( 'woocommerce_shop_loop_item_title' );
	/**
	 * woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	do_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
	do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
    <h3 class="flat-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <?php

    do_action( 'woocommerce_after_shop_loop_item' );

    echo '<div class="flat-links">'; ?>
            <a href="<?php the_permalink() ?>" class="flat-details"><i class="icon-list"></i></a>
            <a class="flat-popup" data-iziModal-open="#<?php echo $product->get_ID() ?>"><i class="icon-eye"></i></a>
            <?php
            echo '<a class="flat-share" data-iziModal-open="#share-'.$product->get_ID().'"><i class="icon-share"></i></a>';
            echo '<div id="share-'.$product->get_ID().'" class="share-product iziModal" data-izimodal-title="'.__($sharetitle,'lucent').'">
                    <div class="popup-share">';
            ?>
            	<a href="#" data-type="facebook" data-url="<?php the_permalink(); ?>" data-description="" data-via="<?php get_bloginfo('name'); ?>" class="social-share icon-facebook"></a>
                <a href="#" data-type="twitter" data-url="<?php the_permalink(); ?>" data-description="" data-via="<?php get_bloginfo('name'); ?>" class="social-share icon-twitter"></a>
                <a href="#" data-type="googleplus" data-url="<?php the_permalink(); ?>" data-description="" data-via="<?php get_bloginfo('name'); ?>" class="social-share icon-google-plus"></a>
                <a href="#" data-type="pinterest" data-url="<?php the_permalink(); ?>" data-description="" data-via="<?php get_bloginfo('name'); ?>" class="social-share icon-pinterest"></a>
                <a href="#" data-type="linkedin" data-url="<?php the_permalink(); ?>" data-description="" data-via="<?php get_bloginfo('name'); ?>" class="social-share icon-linkedin"></a>
            <?php
            echo    '</div>
            </div>
        </div>';
	?>
    </div>
</li>