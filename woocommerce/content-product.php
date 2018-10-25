<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;
$lucent_global = lucent_global();
// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
// Extra post classes
$classes = array($lucent_global['lucent_item_style']);
$linkclass = '';

if ( 'lucent-masonry grid' === $lucent_global['lucent_shop_layout'] || 'grid' === $lucent_global['lucent_shop_layout'] ) { $classes[] = 'grid-item '.$lucent_global['lucent_shop_columns'].''; }
elseif ( 'list' === $lucent_global['lucent_shop_layout'] ) {$classes[] = 'list-item';}
	
if ( 'lucent-masonry grid' === $lucent_global['lucent_shop_layout'] || 'grid' === $lucent_global['lucent_shop_layout'] ) { $linkclass = 'grid-item-content'; } 
elseif ( 'list' === $lucent_global['lucent_shop_layout'] ) {$linkclass = 'list-item-content';}

if ('flat' === $lucent_global['lucent_shop_page']) {require(LUCENT_FILES . '/woocommerce/content-flat-product.php');} else {
?>
<li <?php post_class($classes); ?>>
    <div class="<?php echo $linkclass  ?>">
	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );
	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );
	/**
	 * woocommerce_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' );
	/**
	 * woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
    do_action( 'woocommerce_after_shop_loop_item_title' );
	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
    if ( 'list' === $lucent_global['lucent_shop_layout']) do_action('Lucent_Acrhives_Title');
    echo '<div class="lucent-addto-cart">';
    do_action( 'woocommerce_after_shop_loop_item' );
    echo '</div>';
	?>
    </div>
</li>
<?php }