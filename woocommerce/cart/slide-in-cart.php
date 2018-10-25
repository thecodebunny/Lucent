<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.3.8
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
 ?>
<div id="lucent-cart">
<div class="woocommerce">
<div class="slidein_button_wrapper">
<div class="wc-full-cart">
	<a class="full-cart-button" href="<?php echo esc_url(wc_get_cart_url() ); ?>"> Full Cart </a>
</div>

<div class="wc-elegant-to-checkout">
		<?php do_action ('woocommerce_proceed_to_checkout') ; ?>
</div>
</div>
<form action="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart-form" method="post">

<?php do_action( 'woocommerce_before_cart_table' ); ?>

<table class="shop_table slidein_shop_table shop_table_responsive cart">
	<tbody>
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>

		<?php
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); echo '  ' . $cart_item['product_id'] . ' ' ?>">
					
                    <td class="product-thumbnail">
						<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

							if ( ! $_product->is_visible() ) {
								echo $thumbnail;
							} else {
								printf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $thumbnail );
							}
						?>
					</td>
					
					<td class="product-name product-quantity name-quantity" data-title="<?php _e( 'Product', 'lucent' ); ?>">
						<?php

							if ( $_product->is_sold_individually() ) {
								$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
							} else {
								$product_quantity = woocommerce_quantity_input( array(
									'input_name'  => "cart[{$cart_item_key}][qty]",
									'input_value' => $cart_item['quantity'],
									'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
									'min_value'   => '0'
								), $_product, false );
							}
							echo '<a class="slidein-quantity">';
							echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); echo ' X '; 
							echo '</a>';

							echo '<a class="slidein-name">';
							if ( ! $_product->is_visible() ) {
								echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
							} else {
								echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $_product->get_title() ), $cart_item, $cart_item_key );
							}
							echo '</a>';

							echo '<a class="slidein-product-price product-price">';
							_e( 'Price : ', 'lucent' ); echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							echo '</a>';

							echo '<a class="slidein-product-total product-subtotal">';
							echo esc_attr_e('Total: ','lucent'); echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
							echo '</a>';

							// Meta data Product Quantity X Product Name
							echo wc_get_formatted_cart_item_data( $cart_item );

							// Backorder notification
							if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
								echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'lucent' ) . '</p>';
							}							
						?>
					</td>
					<td class="product-removal product-remove">
						<?php
							echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
								'<a href="%s" class="remove slidein-remove" title="%s" data-product_id="%s" data-product_sku="%s"><i class="icon-cross"></i></a>',
								esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
								__( 'Remove this item', 'lucent' ),
								esc_attr( $product_id ),
								esc_attr( $_product->get_sku() )
							), $cart_item_key );
						?>
					</td>
							
				</tr>
				<?php
			}
		}

		do_action( 'woocommerce_cart_contents' );
		?>
		<tr>
			<td colspan="6" class="actions">

				<?php if ( wc_coupons_enabled() ) { ?>
					<div class="slidein-coupon">

						<input type="text" name="coupon_code" class="input-text slidein-coupon-input" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'lucent' ); ?>" /> 

						<?php do_action( 'woocommerce_cart_coupon' ); ?>
					</div>
				<?php } ?>
			</td>
			</tr>
            <tr>
            <td colspan="6" class="actions">
            <input type="submit" class="button apply-coupon slidein-apply-coupon" name="apply_coupon" value="<?php esc_attr_e( 'Apply Coupon', 'lucent' ); ?>" />
            
			<input type="submit" class="button update-cart slidein-update-cart" name="update_cart" value="<?php esc_attr_e( 'Update Cart', 'lucent' ); ?>" />
            </td>
				<?php do_action( 'woocommerce_cart_actions' ); ?>

				<?php wp_nonce_field( 'woocommerce-cart' ); ?>
			
			</tr>

		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
	</tbody>
</table>

<?php do_action( 'woocommerce_after_cart_table' ); ?>

</form>


<div class="cart-collaterals slidein-collaterals">

	<?php do_action( 'woocommerce_cart_collaterals' ); ?>

</div> 
</div>
</div>