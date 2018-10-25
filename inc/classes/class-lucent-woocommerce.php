<?php
/**
 *
 * Class to load WooCommerce functions
 *
 * @package Lucent
 **/

if ( ! defined( 'ABSPATH' ) ) {
		exit;
}

if ( ! class_exists( 'Lucent_WooCommerce' ) ) {

	/**
	 * Class Lucent_WooCommerce
	 */
	class Lucent_WooCommerce {

		/**
		 *
		 * Global Variable
		 *
		 * @var mix $lucent_opts global variable.
		 */
		protected static $lucent_opts;

		/**
		 *
		 * Function __construct
		 */
		public function __construct() {

			global $lucent_opts;

			$this->lucent_options =& $lucent_opts;

			add_action( 'init', array( $this, 'lucent_remove_woo_breadcrumb' ) );

			add_action( 'init', array( $this, 'lucent_change_woo_defaults' ) );

			add_action( 'init', array( $this, 'lucent_woocommerce_defaults' ) );

			add_action( 'wp_print_styles', array( $this, 'lucent_deregister_prettystyles' ), 100 );

			add_action( 'init',array( $this, 'lucent_add_to_cart' ) );

			add_action( 'wp_ajax_woocommerce_add_to_cart_variable_rc',array( $this, 'woocommerce_add_to_cart_variable_rc_callback' ) );

			add_action( 'wp_ajax_nopriv_woocommerce_add_to_cart_variable_rc',array( $this, 'woocommerce_add_to_cart_variable_rc_callback' ) );

			add_filter( 'loop_shop_per_page', array( $this, 'lucent_products_per_page' ), 20 );

			add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'lucent_header_add_to_cart_fragment' ) );

			add_filter( 'post_class',  array( $this, 'category_id_class' ) );

			add_action( 'woocommerce_account_dashboard', array( $this, 'lucent_myaccount_customer_avatar' ), 5 );

			add_filter( 'woocommerce_cart_updated', array( $this, 'lucent_cart_ajax_quantity' ), 10, 0 );

			add_action( 'woocommerce_before_cart_table', array( $this, 'lucent_cart_table' ) );

			add_action('woocommerce_payment_complete', array($this, 'tcb_prepare_order_data'), 10, 1);

		}

		public function tcb_prepare_order_data() {
			$order = new WC_Order( $order_id );
			echo 'thank you';
            var_dump($order);
        }

		/**
		 *
		 * Function removes WooCommerce shop breadcrumb
		 */
		function lucent_remove_woo_breadcrumb() {

			if ( 'dont' === $this->lucent_options['lucent_woo_breadcrumb'] ) {

					remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0 );
			}

		}

		/**
		 *
		 * Function removes WooCommerce Prettyphoto
		 */
		function lucent_deregister_prettystyles() {

			wp_deregister_style( 'woocommerce_prettyPhoto_css' );

		}

		/**
		 *
		 * Function sets number of products per page
		 *
		 * @param int $cols number of columns.
		 */
		function lucent_products_per_page( $cols ) {

			$lucent_global = lucent_global();

			return $lucent_global['lucent_products_per_page'];
		}

		/**
		 *
		 * Function changes defaults set by WooCommerce
		 */
		function lucent_change_woo_defaults() {

			add_filter( 'woocommerce_enqueue_styles', '__return_false' );
			remove_action( 'woocommerce_sidebar','woocommerce_get_sidebar',10 );

			remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
			remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

			remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
			remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
			// Remove default Checkout button so we can add it over Cart Item table.
			//remove_action( 'woocommerce_cart_totals', 'woocommerce_proceed_to_checkout' );

			// Move Cross Sells below cart totals for better mobile experience.
			remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
			add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' , 10 );
		}

		/**
		 *
		 * Function disables cart
		 */
		function lucent_add_to_cart() {

			if ( 'yes' === $this->lucent_options['lucent_disable_cart'] ) {
				remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
				remove_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );
				remove_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );
			}

		}

		/**
		 *
		 * Function sets default image sizes
		 */
		function lucent_woocommerce_defaults() {
			$catalog = array(
				'width'     => '535',
				'height'    => '535',
				'crop'      => 0,
			);

			$single = array(
				'width'     => '535',
				'height'    => '950',
				'crop'      => 0,
			);

			$thumbnail = array(
				'width'     => '165',
				'height'    => '165',
				'crop'      => 0,
			);
			// Image sizes.
			update_option( 'shop_catalog_image_size', $catalog );
			update_option( 'shop_single_image_size', $single );
			update_option( 'shop_thumbnail_image_size', $thumbnail );
			update_option( 'woocommerce_frontend_css' , false );
			update_option( 'woocommerce_enable_lightbox' , false );
			update_option( 'woocommerce_single_image_crop', 'no' );
			update_option( 'lucent_woo_activation', 'activated' );
		}

		/**
		 *
		 * Function woocommerce ajax callback
		 *
		 */
		function woocommerce_add_to_cart_variable_rc_callback() {
			ob_start();

			$product_id = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $_POST['product_id'] ) );
			$quantity = empty( $_POST['quantity'] ) ? 1 : apply_filters( 'woocommerce_stock_amount', $_POST['quantity'] );
			$variation_id = $_POST['variation_id'];
			$variation  = $_POST['variation'];
			$passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );
			echo '' . $product_id . ' ' . $quantity . ' ' . $variation_id . ' ' . $variation . '';
			if ( $passed_validation && WC()->cart->add_to_cart( $product_id, $quantity, $variation_id, $variation ) ) {
				do_action( 'woocommerce_ajax_added_to_cart', $product_id );
				if ( get_option( 'woocommerce_cart_redirect_after_add' ) == 'yes' ) {
					wc_add_to_cart_message( $product_id );
				}

				// Return fragments
				WC_AJAX::get_refreshed_fragments();
			} else {
				$this->json_headers();

				// If there was an error adding to the cart, redirect to the product page to show any errors
				$data = array(
					'error' => true,
					'product_url' => apply_filters( 'woocommerce_cart_redirect_after_error', get_permalink( $product_id ), $product_id ),
				);
				echo json_encode( $data );
			}
			die();
		}

		/**
		 *
		 * Function updates number of items in cart
		 *
		 * @param string $fragments cart item values.
		 */
		function lucent_header_add_to_cart_fragment( $fragments ) {

			ob_start();
			$count = WC()->cart->cart_contents_count;

			echo '<span class="itemsnumber">' . sprintf( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ) . '</span>';

			$fragments['.itemsnumber'] = ob_get_clean();

			return $fragments;

		}

		/**
		 *
		 * Function retrieves product classes
		 *
		 * @param string $classes Product classes.
		 */
		function category_id_class( $classes ) {
			global $post;
			$product_cats = get_the_terms( $post->id, 'product_cat' );
			if ( $product_cats ) {
				foreach ( $product_cats as $category ) {
							$classes[] = $category->slug;
				}
			}
			return $classes;

		}

		/**
		 *
		 * Function change default avatar for customers
		 */
		function lucent_myaccount_customer_avatar() {
			$current_user = wp_get_current_user();
			echo  '<div class="lucent-user">';
	?>
				<?php
							{ echo  '<div class="lucent-avatar">' . get_avatar( $current_user->user_email, 72, '', $current_user->display_name ) . '</div>'; // WPCS: XSS ok.
				};
?>
				<?php
							{ echo  '<div class="lucent-userinfo"><h2>' . $current_user->user_firstname , ' ', $current_user->user_lastname . '</h2></div>'; // WPCS: XSS ok.
				};
?>
				<?php
				echo '</div>';
		}

		public function lucent_cart_ajax_quantity() {
			if ( ! empty( $_POST['is_lucent_ajax'] ) ) {
				$resp = array();
				$resp['update_label'] = __( 'Update Cart', 'lucent' );
				$resp['checkout_label'] = __( 'Checkout', 'lucent' );
				$resp['price'] = 0;
				$resp['carttotalqty'] = WC()->cart->get_cart_contents_count();
				$resp['productid'] = '';
				// render the cart totals (cart-totals.php)
				ob_start();
				do_action( 'woocommerce_after_cart_table' );
				remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
				do_action( 'woocommerce_cart_collaterals' );
				//do_action( 'woocommerce_after_cart' );
				$resp['html'] = ob_get_clean();
				$resp['price'] = 0;

										// calculate the item price
				if ( ! empty( $_POST['cart_item_key'] ) ) {
					$items = WC()->cart->get_cart();
					$cart_item_key = $_POST['cart_item_key'];

					if ( array_key_exists( $cart_item_key, $items ) ) {
						$cart_item = $items[ $cart_item_key ];
						$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$price = apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
						$resp['price'] = $price;
					}
				}

				echo json_encode( $resp );
				exit;
			}
		}

		public function lucent_cart_table() {

				$this->lucent_zero_alert();
		}

		/**
		 *
		 * Function adds alert when cart quantity changed to 0
		 */
		static function lucent_zero_alert() {
				wp_add_inline_script(
					'wooajaxcart', 'jQuery(document).ready(function(jQuery){
                    lucentZeroQuantityCheck = function(el_qty) {
                        return true;
                    };
                });'
				);
		}

	}

}
new Lucent_WooCommerce();
