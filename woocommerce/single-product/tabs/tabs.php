<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs 	= apply_filters( 'woocommerce_product_tabs', array() );

$lucent_global = lucent_global();

if ( ! empty( $tabs ) ) : ?>

	<?php if(($lucent_global['lucent_woo_tabs'] == 'vertical') || ($lucent_global['lucent_woo_tabs'] == 'standard')): ?>
<?php if ($lucent_global['lucent_woo_tabs'] == 'vertical') : {echo '<div class="lucent-vert lucent-vert-vert">';} else : {echo'<div class ="lucent-tabs wc-tabs-wrapper">';} endif; ?>
		<?php if ($lucent_global['lucent_woo_tabs'] == 'vertical') : {echo '<ul class ="lucent-vert-legend">';} else : {echo'<ul class ="lucent-tabs wc-tabs">';} endif; ?>
			<?php foreach ( $tabs as $key => $tab ) : ?>
				<li class="<?php if ($lucent_global['lucent_woo_tabs'] == 'standard') echo'lucent-tabs';?> <?php echo esc_attr( $key ); ?>_tab">
					<a href="#tab-<?php echo esc_attr( $key ); ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php if ($lucent_global['lucent_woo_tabs'] == 'vertical') echo'<ul class="lucent-vert-content">'; ?>
		<?php foreach ( $tabs as $key => $tab ) : ?><?php if ($lucent_global['lucent_woo_tabs'] == 'vertical') echo'<li>'; ?>
		<?php if ($lucent_global['lucent_woo_tabs'] == 'vertical') { ?>
			<div  class="lucent-vert-content-wrapper" id="tab-<?php echo esc_attr( $key ); ?>"> <?php } else { ?>
			<div  class="panels panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>">
			<?php }
			call_user_func( $tab['callback'], $key, $tab ); ?>

			</div>

		<?php endforeach; ?>
		<?php if ($lucent_global['lucent_woo_tabs'] == 'vertical') echo'</li></ul>'; ?>

	</div>
	<?php else : ?>

		<div class="lucent-accordion">

				<?php foreach ( $tabs as $key => $tab ) : ?>
						<h1>
							<?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?>
						</h1>

						<div>
							<?php call_user_func( $tab['callback'], $key, $tab ) ?>
						</div>


				<?php endforeach; ?>
			</div>

	<?php endif; ?>

<?php endif; ?>
