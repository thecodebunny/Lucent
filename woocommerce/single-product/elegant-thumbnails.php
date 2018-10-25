<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product, $woocommerce;
$lucent_global = lucent_global();

$attachment_ids = $product->get_gallery_image_ids();

if ( $attachment_ids ) {
	$loop 		= 0;
	$columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
	?>
	<div class="thumbs">
	<?php
if ( has_post_thumbnail() ) {

            $classes = array( 'item' );
			$image_title 	= esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image_caption 	= get_post( get_post_thumbnail_id() )->post_excerpt;
			$image       	= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_thumbnail' ), array(
				'title'	=> $image_title,
				'alt'	=> $image_title
				) );

				$image_class = esc_attr( implode( ' ', $classes ) );

			$attachment_count = count( $product->get_gallery_image_ids() );

			if ( $attachment_count > 0 ) {
				$gallery = '[product-gallery]';
			} else {
				$gallery = '';
			}

			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a class="%s">%s</a>', $image_class, $image),  $post->ID );

		}
		foreach ( $attachment_ids as $attachment_id ) {

			$classes = array( 'item' );

			if ( $loop === 0 || $loop % $columns === 0 )
				$classes[] = 'first';

			if ( ( $loop + 1 ) % $columns === 0 )
				$classes[] = 'last';

			$image_title 	= esc_attr( get_the_title( $attachment_id ) );
			$image_caption 	= esc_attr( get_post_field( 'post_excerpt', $attachment_id ) );
			$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ), 0, $attr = array(
				'title'	=> $image_title,
				'alt'	=> $image_title
				) );

			$image_class = esc_attr( implode( ' ', $classes ) );



			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a class="%s" title="%s">%s</a>', $image_class, $image_caption, $image ), $attachment_id, $post->ID, $image_class );

			$loop++;
		}

	?>
	</div>

<?php }
