<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;
?>
<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
	 
	$lucent_global = lucent_global();
	
	if ($lucent_global['lucent_woo_pagination'] == 'yes'): { do_action('Lucent_Post_Nav'); } endif;
	
?>
	
<div itemscope id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="product_wrapper product_wrapper_inner clearfix">

<div class="column lucent-2-3 lucent-gallery">
	
 <?php do_action('Lucent_Social_Share'); ?>

 <?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
        remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
        remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

        /*** Load custom woocommerce gallery. ***/

		do_action( 'woocommerce_before_single_product_summary' );
		wc_get_template('single-product/elegant-image.php');
	?>
</div>
	<div class="column lucent-1-3 lucent-elegant-short-summary summary entry-summary">

		<?php
			/**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			 do_action( 'woocommerce_single_product_summary' );

			 $woocountdown = get_post_meta( $product->get_id(), '_sale_price_dates_to', true );

			if ( 'show' === $lucent_global['lucent_woo_single_countdown'] && '' !== $woocountdown ) {

			    echo '<a class="offer">'. esc_attr__('Offer ends in:', 'lucent') .'</a>';

			    echo '<div class="single-product-countdown"></div>';

		} ?>

		</div>

	<!-- .summary -->
</div>
<div class = "lucent-elegant-summary">
    <?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */


		do_action( 'woocommerce_after_single_product_summary' );

	?>
</div>

<?php $upsells = $product->get_upsell_ids();
if ( sizeof($upsells) !== 0 ) { ?>
<div class="column lucent-1 lucent-elegant-column">
	<?php woocommerce_upsell_display(); ?>
	</div>
<?php } ?>
    <div class="column lucent-1 lucent-elegant-column">
	<?php	woocommerce_output_related_products(); ?>
</div>

</div>
	<meta itemprop="url" content="<?php the_permalink(); ?>" />
</div>
<!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
