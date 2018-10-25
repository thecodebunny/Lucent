<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<div class="woocommerce-MyAccount-navigation">
	<?php echo _e('Navigate to : '); ?><select id="lucent-account-nav" class="account-navigation">
		<option value="#" class="account-links"><?php echo _e('Select Option','lucent'); ?></option>
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<option value="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" class="account-links <?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
			</option>
		<?php endforeach; ?>
	</select>
</div>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
