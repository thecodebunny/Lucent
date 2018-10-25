<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lucent
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

$lucent_global = lucent_global();

$sidebar_side = $lucent_global['lucent_sidebar_select'];

?>

<aside id="secondary" class="widget-area <?php echo esc_attr( $sidebar_side ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
