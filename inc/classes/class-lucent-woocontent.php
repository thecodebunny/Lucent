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

if ( ! class_exists( 'Lucent_Woocontent' ) ) {

	/**
	 * Class Lucent_Woocontent
	 */
	class Lucent_Woocontent {

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

			add_filter( 'woocommerce_show_page_title' , array( $this, 'lucent_hide_shop_title' ) );

			add_filter( 'woocommerce_breadcrumb_defaults', array( $this, 'lucent_woocommerce_breadcrumbs' ) );

			add_action( 'woocommerce_after_shop_loop_item', array( $this, 'lucent_compact_product' ) );

			add_action( 'lucent_woo_images', array( $this, 'lucent_woo_shop_images' ) );

			add_action( 'woocommerce_register_form_start', array( $this, 'lucent_woo_registration_fields' ), 30 );

			add_action( 'woocommerce_created_customer', array( $this, 'lucent_save_woo_registration_fields' ) );

			add_action( 'show_user_profile', array( $this, 'lucent_editaccount_woo_registration_fields' ), 30 );

			add_action( 'edit_user_profile', array( $this, 'lucent_editaccount_woo_registration_fields' ), 10 );

			add_action( 'woocommerce_edit_account_form_start', array( $this, 'lucent_editaccount_woo_registration_fields' ), 10 );

			add_action( 'lucent_fancy_cart', array( $this, 'lucent_fancy_minicart' ) );

			add_action( 'personal_options_update', array( $this, 'lucent_save_editaccount_woo_registration_fields' ) );

			add_action( 'edit_user_profile_update', array( $this, 'lucent_save_editaccount_woo_registration_fields' ) );

			add_action( 'woocommerce_save_account_details', array( $this, 'lucent_save_editaccount_woo_registration_fields' ) );

			add_filter( 'woocommerce_registration_errors', array( $this, 'lucent_validate_registration_fields' ), 10, 3 );

			add_action( 'Lucent_Reg_Countries', array( $this, 'lucent_woo_countries' ) );

			add_action( 'Lucent_Reg_States', array( $this, 'lucent_woo_states' ) );

		}

		function lucent_woocommerce_breadcrumbs( $defaults ) {

			if ( $this->lucent_options['lucent_breadcrumb_style'] == 'simple' ) {
				$defaults['wrap_before'] = '<ul class="lucent-breadcrumb" itemprop="breadcrumb">';
			} elseif ( $this->lucent_options['lucent_breadcrumb_style'] == 'tabs' ) {
				$defaults['wrap_before'] = '<ul class="lucent-multi-steps text-center" itemprop="breadcrumb">';
			} else {
				$defaults['wrap_before'] = '<ul class="lucent-breadcrumb triangle" itemprop="breadcrumb">';}
				$defaults['wrap_after']  = '</ul>';
				$defaults['delimiter'] = '';
				$defaults['before'] = '<li>';
				$defaults['after'] = '</li>';
				return $defaults;
		}

		/**
		 *
		 * Function removes shop page title
		 *
		 * @param string $return page title.
		 */
		function lucent_hide_shop_title( $return = '' ) {

			if ( false === $this->lucent_options['lucent_woo_title'] ) {

				return $this->lucent_options['lucent_woo_title'];
			}

		}

				 /**
		 *
		 * Function Renders Archive page product images.
		 *
		 * @package Lucent
		 * @var string $extraclass retrieves Effect Class
		 **/

		function lucent_woo_shop_images() {

			global $product;

			echo '<div class="archive-images">';

			if ( 'links' === $this->lucent_options['lucent_woo_hover_images'] ) :
				{ $mainclass = $this->lucent_options['lucent_woo_hover_styles']; }
					elseif ( 'image' === $this->lucent_options['lucent_woo_hover_images'] ) :
						{ $mainclass = $this->lucent_options['lucent_woo_hover_image']; }

		endif;
					if ( 'links' === $this->lucent_options['lucent_woo_hover_images'] ) :
						{
						if ( 'effect1' === $this->lucent_options['lucent_woo_hover_styles'] ) :
							{ $extraclass = $this->lucent_options['lucent_links_1']; }
						elseif ( 'effect3' === $this->lucent_options['lucent_woo_hover_styles'] ) :
							{ $extraclass = $this->lucent_options['lucent_links_3']; }
						elseif ( 'effect5' === $this->lucent_options['lucent_woo_hover_styles'] ) :
							{ $extraclass = $this->lucent_options['lucent_links_5']; }
						elseif ( 'effect6' === $this->lucent_options['lucent_woo_hover_styles'] ) :
							{ $extraclass = $this->lucent_options['lucent_links_6']; }
						elseif ( 'effect8' === $this->lucent_options['lucent_woo_hover_styles'] ) :
							{ $extraclass = $this->lucent_options['lucent_links_8']; }
						elseif ( 'effect9' === $this->lucent_options['lucent_woo_hover_styles'] ) :
							{ $extraclass = $this->lucent_options['lucent_links_9']; }
						elseif ( 'effect10' === $this->lucent_options['lucent_woo_hover_styles'] ) :
							{ $extraclass = $this->lucent_options['lucent_links_10']; }
						elseif ( 'effect11' === $this->lucent_options['lucent_woo_hover_styles'] ) :
							{ $extraclass = $this->lucent_options['lucent_links_11']; }
						elseif ( 'effect12' === $this->lucent_options['lucent_woo_hover_styles'] ) :
							{ $extraclass = $this->lucent_options['lucent_links_12']; }
						elseif ( 'effect13' === $this->lucent_options['lucent_woo_hover_styles'] ) :
							{ $extraclass = $this->lucent_options['lucent_links_13']; }
						elseif ( 'effect14' === $this->lucent_options['lucent_woo_hover_styles'] ) :
							{ $extraclass = $this->lucent_options['lucent_links_14']; }
						elseif ( 'effect15' === $this->lucent_options['lucent_woo_hover_styles'] ) :
							{ $extraclass = $this->lucent_options['lucent_links_15']; }
						elseif ( 'effect16' === $this->lucent_options['lucent_woo_hover_styles'] ) :
							{ $extraclass = $this->lucent_options['lucent_links_16']; }
						elseif ( 'effect17' === $this->lucent_options['lucent_woo_hover_styles'] ) :
							{ $extraclass = $this->lucent_options['lucent_links_17']; }
						elseif ( 'effect18' === $this->lucent_options['lucent_woo_hover_styles'] ) :
							{ $extraclass = $this->lucent_options['lucent_links_18']; }
						elseif ( 'effect19' === $this->lucent_options['lucent_woo_hover_styles'] ) :
							{ $extraclass = $this->lucent_options['lucent_links_19']; }
						elseif ( 'effect20' === $this->lucent_options['lucent_woo_hover_styles'] ) :
							{ $extraclass = $this->lucent_options['lucent_links_20']; }
						elseif ( 'effect21' === $this->lucent_options['lucent_woo_hover_styles'] ) :
							{ $extraclass = $this->lucent_options['lucent_links_21']; }
						else :
							$extraclass = '';
						endif;
						} elseif ( 'image' === $this->lucent_options['lucent_woo_hover_images'] ) :
							{
							if ( 'effect5' === $this->lucent_options['lucent_woo_hover_image'] ) :
								{ $extraclass = $this->lucent_options['lucent_image_1']; }
							elseif ( 'effect8' === $this->lucent_options['lucent_woo_hover_image'] ) :
								{ $extraclass = $this->lucent_options['lucent_image_2']; }
							elseif ( 'effect9' === $this->lucent_options['lucent_woo_hover_image'] ) :
								{ $extraclass = $this->lucent_options['lucent_image_3']; }
							elseif ( 'effect10' === $this->lucent_options['lucent_woo_hover_image'] ) :
								{ $extraclass = $this->lucent_options['lucent_image_4']; }
							elseif ( 'effect11' === $this->lucent_options['lucent_woo_hover_image'] ) :
								{ $extraclass = $this->lucent_options['lucent_image_5']; }
							elseif ( 'effect12' === $this->lucent_options['lucent_woo_hover_image'] ) :
								{ $extraclass = $this->lucent_options['lucent_image_6']; }
							elseif ( 'effect13' === $this->lucent_options['lucent_woo_hover_image'] ) :
								{ $extraclass = $this->lucent_options['lucent_image_7']; }
							elseif ( 'effect14' === $this->lucent_options['lucent_woo_hover_image'] ) :
								{ $extraclass = $this->lucent_options['lucent_image_8']; }
							elseif ( 'effect15' === $this->lucent_options['lucent_woo_hover_image'] ) :
								{ $extraclass = $this->lucent_options['lucent_image_9']; }
							elseif ( 'effect16' === $this->lucent_options['lucent_woo_hover_image'] ) :
								{ $extraclass = $this->lucent_options['lucent_image_10']; }
							elseif ( 'effect17' === $this->lucent_options['lucent_woo_hover_image'] ) :
								{ $extraclass = $this->lucent_options['lucent_image_11']; }
							elseif ( 'effect18' === $this->lucent_options['lucent_woo_hover_image'] ) :
								{ $extraclass = $this->lucent_options['lucent_image_12']; }
							elseif ( 'effect19' === $this->lucent_options['lucent_woo_hover_image'] ) :
								{ $extraclass = $this->lucent_options['lucent_image_13']; }
							elseif ( 'effect20' === $this->lucent_options['lucent_woo_hover_image'] ) :
								{ $extraclass = $this->lucent_options['lucent_image_14']; }
							elseif ( 'effect21' === $this->lucent_options['lucent_woo_hover_image'] ) :
								{ $extraclass = $this->lucent_options['lucent_image_15']; }
							else :
								$extraclass = '';
							endif;
							}

		endif;

						echo '<div class="lucent3d-item ' . $mainclass . ' ' . $extraclass . '">';

						if ( 'effect18' === $this->lucent_options['lucent_woo_hover_styles'] ) {
							echo '<div class="img-container">';}

						echo '<div class="img">';
						the_post_thumbnail(
							'shop_catalog', array(
								'class' => '',
							)
						);
			echo '</div>';
					echo '<div id="popup-image-' . $product->get_ID() . '" class="img lucent-lightbox" data-izimodal-title="' . $product->get_title() . '">';
			the_post_thumbnail(
				'shop_catalog', array(
					'class' => '',
				)
			);
			echo '</div>';
			if ( 'effect4' === $this->lucent_options['lucent_woo_hover_styles'] ) {
				echo '<div class="mask1"></div><div class="mask2"></div>';}

			if ( 'effect18' === $this->lucent_options['lucent_woo_hover_styles'] ) {
				echo '</div> <div class="info-container">';} ?>
						<div class="info">

						<?php
						if ( 'effect9' === $this->lucent_options['lucent_woo_hover_styles'] || 'effect21' === $this->lucent_options['lucent_woo_hover_styles'] ) {
							echo '<div class="info-back">';}
?>

							<?php
							if ( 'image' === $this->lucent_options['lucent_woo_hover_images'] ) {
								echo '<h4 class="image-title"><a href=" ' . esc_url( $product->get_permalink() ) . ' "> ' . $product->get_title() . ' </a></h4>';

								$attachment_ids = $product->get_gallery_image_ids();

								foreach ( array_slice( $attachment_ids, 0,1 ) as $attachment_id ) {

									echo '<img src=" ' . wp_get_attachment_url( $attachment_id ) . ' " />';

								}
							} else {
?>

								<h3><a href="<?php echo esc_url( $product->get_permalink() ); ?>" > <?php echo $product->get_title(); ?> </a></h3>
								<p>
									<a rel="nofollow" class="icon-strip-left add_to_cart_button ajax_add_to_cart product_type_simple" href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" data-quantity="1" data-product_id="<?php echo esc_attr( $product->get_ID() ); ?>"><i class="<?php echo $this->lucent_options['lucent_woo_cart_icon']; ?>"></i></a>
									
									<a class="icon-strip-middle" data-iziModal-open="#popup-image-<?php echo $product->get_ID(); ?>" title="<?php the_title(); ?>"><i class="icon-search"></i></a>
									
									<a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="icon-strip-right" title="<?php the_title(); ?>"> <i class="icon-link"></i> </a>
								</p>

							<?php } ?>
							
						<?php
						if ( 'effect9' === $this->lucent_options['lucent_woo_hover_styles'] || 'effect21' === $this->lucent_options['lucent_woo_hover_styles'] ) {
							echo '</div>';}
?>

						</div>
						
					<?php
					if ( 'effect18' === $this->lucent_options['lucent_woo_hover_styles'] ) {
						echo '</div>';}

					echo '</div>';

		}

		/**
		 *
		 * Function outputs compact product view
		 */
		function lucent_compact_product() {

				global $post, $woocommerce, $product;
				$currency = get_woocommerce_currency_symbol();
				$price = get_post_meta( get_the_ID(), '_regular_price', true );
				$sale = get_post_meta( get_the_ID(), '_sale_price', true );
			if ( $sale ) {
				$izimodalprice = 'data-izimodal-subtitle="<del>' . $currency . '' . $price . '</del> / ' . $currency . '' . $sale . '"';
			} else {
				$izimodalprice = 'data-izimodal-subtitle="' . $currency . '' . $price . '"';}
				$dataizimodal = ' data-izimodal-group="products" data-izimodal-title="' . get_the_title() . '" ' . $izimodalprice . '';

				echo '<div id="' . $product->get_ID() . '" class="compact-view-content iziModal" ' . $dataizimodal . '>'; // WPCS: XSS ok.

				echo '<div class="compact-view-images lucent-gallery">';

				do_action( 'Lucent_Archive_Share' );

				wc_get_template( 'single-product/elegant-image.php' );

				echo '</div>';

				echo '<div class="lucent-elegant-short-summary compact-view-summary">';

				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

				do_action( 'woocommerce_single_product_summary' );

				echo '</div></div>';
		}

		/**
		 *
		 * Function generates fancy mini cart
		 */
		public function lucent_fancy_minicart() {

			$fancycartid = $this->lucent_options['lucent_fancy_cart'];

			$fancycartfx = $this->lucent_options['lucent_slidecart_fx'];

			$fancycartside = $this->lucent_options['lucent_fancycart_slide'];

			$fancycartsize = $this->lucent_options['lucent_slidecart_width']['width'];

			if ( 'slideout' === $this->lucent_options['lucent_fancy_cart'] ) {
				$cartclass = 'class="lucent-slidebar" data-position="' . $fancycartside . '" data-effect="' . $fancycartfx . '" data-size="' . $fancycartsize . '"';
			} else {
				$cartclass = 'class="lucentpopupcart iziModal"';
			}

			echo '<div id="lucent' . $fancycartid . 'cart" ' . $cartclass . '>';
			if ( 'slideout' === $this->lucent_options['lucent_fancy_cart'] ) {
				echo '<a class="close-cart lucentslide-close">
								<i class="icon-cross"></i>
							  </a>';
				require( LUCENT_FILES . '/woocommerce/cart/slide-in-cart.php' );
			} else {
				require( LUCENT_FILES . '/woocommerce/cart/popup-cart.php' );
			}
			echo '</div>';
		}

		/**
		 *
		 * Function generates extra registration fields
		 */
		public function lucent_woo_registration_fields() {

				wp_enqueue_script( 'wc-country-select' );

		}

		public function lucent_woo_countries() {
			global $woocommerce;
			$countries_obj   = new WC_Countries();
			$countries   = $countries_obj->get_allowed_countries( 'countries' );
			woocommerce_form_field(
				'billing_country', array(
					'type'       => 'country',
					'label'      => __( 'Country' ),
					'class'      => array( 'woocommerce-FormRow' ),
					'placeholder'    => __( 'Select your country' ),
					'options'    => $countries,
				)
			);
		}

		public function lucent_woo_states() {
			global $woocommerce;
			$countries_obj   = new WC_Countries();
			$countries   = $countries_obj->get_allowed_countries( 'countries' );
			$default_country = $countries_obj->get_base_country();
			$default_county_states = $countries_obj->get_states( $default_country );
			woocommerce_form_field(
				'billing_state', array(
					'type'       => 'state',
					'label'      => __( 'State' ),
					'class'      => array( 'woocommerce-FormRow', 'address-field' ),
					'placeholder'    => __( 'Select state' ),
					'options'   => $default_county_states,
				)
			);
		}

		public function lucent_save_woo_registration_fields( $customer_id ) {

			if ( isset( $_POST['lucent_customer_type'] ) ) {
					update_user_meta( $customer_id, 'lucent_customer_type', $_POST['lucent_customer_type'] );
			}
			if ( isset( $_POST['billing_first_name'] ) ) {
				update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
				update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
			}
			if ( isset( $_POST['billing_last_name'] ) ) {
				update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
				update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
			}
			if ( isset( $_POST['reg_email'] ) ) {
				update_user_meta( $customer_id, 'billing_email', $_POST['reg_email'] );
			}
			if ( isset( $_POST['lucent_bdate'] ) ) {
				update_user_meta( $customer_id, 'lucent_bdate', $_POST['lucent_bdate'] );
			}
			if ( isset( $_POST['billing_company_name'] ) ) {
				update_user_meta( $customer_id, 'billing_company_name', $_POST['billing_company_name'] );
				update_user_meta( $customer_id, 'billing_company', $_POST['billing_company_name'] );
			}
			if ( isset( $_POST['billing_department'] ) ) {
				update_user_meta( $customer_id, 'billing_department', $_POST['billing_department'] );
			}
			if ( isset( $_POST['billing_tax'] ) ) {
				update_user_meta( $customer_id, 'billing_tax', $_POST['billing_tax'] );
			}
			if ( isset( $_POST['billing_country'] ) ) {
				update_user_meta( $customer_id, 'billing_country', $_POST['billing_country'] );
			}
			if ( isset( $_POST['billing_state'] ) ) {
				update_user_meta( $customer_id, 'billing_state', $_POST['billing_state'] );
			}
			if ( isset( $_POST['billing_address_1'] ) ) {
				update_user_meta( $customer_id, 'billing_address_1', $_POST['billing_address_1'] );
			}
			if ( isset( $_POST['billing_address_2'] ) ) {
				update_user_meta( $customer_id, 'billing_address_2', $_POST['billing_address_2'] );
			}
			if ( isset( $_POST['billing_city'] ) ) {
				update_user_meta( $customer_id, 'billing_city', $_POST['billing_city'] );
			}
			if ( isset( $_POST['billing_postcode'] ) ) {
				update_user_meta( $customer_id, 'billing_postcode', $_POST['billing_postcode'] );
			}
			if ( isset( $_POST['billing_phone'] ) ) {
				update_user_meta( $customer_id, 'billing_phone', $_POST['billing_phone'] );
			}

		}

		public function lucent_editaccount_woo_registration_fields( $user ) {

			if ( empty( $user ) ) {
				$user_id = get_current_user_id();
				$user = get_userdata( $user_id );
			}

			?>

			<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
			<label for=""><?php _e( 'Your Customer Type', 'lucent' ); ?>  <span class="required">*</span></label>
			<select name="lucent_customer_type" id="lucent_customer_type" />
				<option disabled value><?php echo __( '-- select an option --','lucent' ); ?></option>
				<option value="private" 
				<?php
				if ( get_the_author_meta( 'lucent_customer_type', $user->ID ) == 'private' ) {
					echo 'selected="selected" ';}
?>
><?php echo __( 'Private Customer','lucent' ); ?></option>
				<option value="company" 
				<?php
				if ( get_the_author_meta( 'lucent_customer_type', $user->ID ) == 'company' ) {
					echo 'selected="selected" ';}
?>
><?php echo __( 'Company','lucent' ); ?></option>
			</select>
			</p>
			
			<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				<label for=""><?php _e( 'Salutation', 'lucent' ); ?>  <span class="required">*</span></label>
				<select name="lucent_salutation" id="lucent_salutation" />
					<option value="mr" 
					<?php
					if ( get_the_author_meta( 'lucent_salutation', $user->ID ) == 'mr' ) {
						echo 'selected="selected" ';}
?>
><?php echo __( 'Mr. ','lucent' ); ?></option>
					<option value="mrs" 
					<?php
					if ( get_the_author_meta( 'lucent_salutation', $user->ID ) == 'mrs' ) {
						echo 'selected="selected" ';}
?>
><?php echo __( 'Mrs. ','lucent' ); ?></option>
				</select>
			</p>

			<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				<label for=""><?php _e( 'Birth Date', 'lucent' ); ?>  <span class="required">*</span></label>
				<input type="date" class="woocommerce-Input woocommerce-Input--text input-text lucent-reg-field" placeholder="" name="lucent_bdate" id="lucent_bdate" value="<?php echo esc_attr( $user->lucent_bdate ); ?>" />
			</p>

			<?php

		}

		public function lucent_save_editaccount_woo_registration_fields( $customer_id ) {

			update_user_meta( $customer_id, 'lucent_customer_type', $_POST['lucent_customer_type'] );
			update_user_meta( $customer_id, 'lucent_salutation', $_POST['lucent_salutation'] );
			update_user_meta( $customer_id, 'account_first_name', $_POST['first_name'] );
			update_user_meta( $customer_id, 'account_last_name', $_POST['last_name'] );
			update_user_meta( $customer_id, 'lucent_bdate', $_POST['lucent_bdate'] );

		}


		public function lucent_validate_registration_fields( $validation_errors, $billing_first_name, $billing_last_name ) {
			if ( 'yes' === $this->lucent_options['lucent_company_registration'] && isset( $_POST['lucent_customer_type'] ) && empty( $_POST['lucent_customer_type'] ) ) {
				$validation_errors->add( 'customertype_error', __( ' Customer type is required!', 'lucent' ) );
			}
			if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
				$validation_errors->add( 'firstname_error', __( ' First name is required!', 'lucent' ) );
			}
			if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
				$validation_errors->add( 'lastname_error', __( ' Last name is required!.', 'lucent' ) );
			}
			if ( 'yes' === $this->lucent_options['lucent_bdate'] && isset( $_POST['lucent_bdate'] ) && empty( $_POST['lucent_bdate'] ) ) {
				$validation_errors->add( 'bdate_error', __( ' Birth date it required!', 'lucent' ) );
			}
			if ( 'yes' === $this->lucent_options['lucent_billing_address'] && isset( $_POST['billing_country'] ) && empty( $_POST['billing_country'] ) ) {
				$validation_errors->add( 'bdate_error', __( ' Birth date it required!', 'lucent' ) );
			}
			if ( 'yes' === $this->lucent_options['lucent_billing_address'] && isset( $_POST['billing_country'] ) && empty( $_POST['billing_country'] ) ) {
				$validation_errors->add( 'bdate_error', __( ' Birth date it required!', 'lucent' ) );
			}
			if ( 'yes' === $this->lucent_options['lucent_billing_address'] && isset( $_POST['billing_address_1'] ) && empty( $_POST['billing_address_1'] ) ) {
				$validation_errors->add( 'bdate_error', __( ' Birth date it required!', 'lucent' ) );
			}
			if ( 'yes' === $this->lucent_options['lucent_billing_address'] && isset( $_POST['billing_city'] ) && empty( $_POST['billing_city'] ) ) {
				$validation_errors->add( 'bdate_error', __( ' Birth date it required!', 'lucent' ) );
			}
			if ( 'yes' === $this->lucent_options['lucent_billing_address'] && isset( $_POST['billing_postcode'] ) && empty( $_POST['billing_postcode'] ) ) {
				$validation_errors->add( 'bdate_error', __( ' Birth date it required!', 'lucent' ) );
			}
			if ( 'yes' === $this->lucent_options['lucent_billing_address'] && isset( $_POST['billing_phone'] ) && empty( $_POST['billing_phone'] ) ) {
				$validation_errors->add( 'bdate_error', __( ' Birth date it required!', 'lucent' ) );
			}
			return $validation_errors;
		}

		public function lucent_sanitize_date( $input ) {
			$date = new DateTime( $input );
			return $date->format( 'm-d-Y' );
		}

	}

}
new Lucent_Woocontent();
