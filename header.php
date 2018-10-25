<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lucent
 */

 $lucent_global = lucent_global();

?>
<!DOCTYPE html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?>  class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php
if ( 'wp-login.php' !== $GLOBALS['pagenow'] || ! is_search() ) {
	do_action( 'lucent_seo' );}

	$beforepush = array( 'simpleslide', 'reveal', 'reverseslide', 'slidealong', 'scaledowncontent', 'scaleup', 'scalerotate', 'slidedown' );

	$afterpush = array( 'push', 'rotate3din', 'rotate3dout', 'delay3d' );

?>
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php

	do_action( 'lucent_favicons' );
	do_action( 'lucent_head_hooks' );

if ( 'side' === $lucent_global['header_position'] ) {
	$contentside = '' . $lucent_global['header_side_position'] . '-content';
} else {
	$contentside = ''; }

if ( 'boxed' == $lucent_global['site_layout'] ) {
	$boxed = 'boxed-page';
} else {
	$boxed = '';}

?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
if ( 'boxed_layout' === $lucent_global['site_layout'] ) {
	echo '<div class="lucent-boxed">';}
?>

<div id="LucentMain" class="lucent-main <?php echo  'slide-'. $lucent_global['header_hidden_slide'] . ''; ?>">

	<?php

	if ( class_exists( 'WooCommerce' ) ) {
		if ( 'slideout' === $lucent_global['lucent_fancy_cart'] && in_array( $lucent_global['lucent_slidecart_fx'], $beforepush ) ) {
			do_action( 'lucent_fancy_cart' ); }
	}

	if ( ('hidden' === $lucent_global['header_position'] && 'slide' === $lucent_global['header_hidden'] && in_array( $lucent_global['lucent_hidden_fx'], $beforepush )) ||
		 ('hidden' === $lucent_global['header_position'] && 'full' === $lucent_global['header_hidden'] && 'slide' === $lucent_global['lucent_hidden_fullfx'] && in_array( $lucent_global['lucent_hiddenfull_fx'],$beforepush )) ) {
		get_template_part( '/template-parts/headers/header-hidden' ); }
	?>
	
	<div class="lucent-pusher">
		<?php
		if ( in_array( $lucent_global['lucent_mobile_fx'], $beforepush ) ) {
			get_template_part( '/template-parts/headers/header-mobile' );}
?>
			<div class="lucent-slide-mask"></div>
	<?php
	if ( 'hidden' === $lucent_global['header_position'] ) {
		get_template_part( '/template-parts/headers/top-bar-hidden' ); }

	if ( 'slideout' === $lucent_global['lucent_fancy_cart'] && in_array( $lucent_global['lucent_slidecart_fx'],$afterpush ) ) {
		do_action( 'lucent_fancy_cart' ); }

	if ( 'popup' === $lucent_global['lucent_fancy_cart'] ) {
		do_action( 'lucent_fancy_cart' ); }

	if ( in_array( $lucent_global['lucent_mobile_fx'],$afterpush ) ) {
		get_template_part( '/template-parts/headers/header-mobile' );}

	if ( 'top' === $lucent_global['header_position'] ) {
		get_template_part( '/template-parts/headers/header-top' ); }

	if ( ('hidden' === $lucent_global['header_position'] && 'slide' === $lucent_global['header_hidden'] && in_array( $lucent_global['lucent_hidden_fx'], $afterpush )) ||
		 ('hidden' === $lucent_global['header_position'] && 'full' === $lucent_global['header_hidden'] && 'slide' === $lucent_global['lucent_hidden_fullfx'] && in_array( $lucent_global['lucent_hiddenfull_fx'],$afterpush )) ) {
		get_template_part( '/template-parts/headers/header-hidden' ); }

	if ( 'side' === $lucent_global['header_position'] ) {
		get_template_part( '/template-parts/headers/header-side' ); }

	if ( 'bottom' === $lucent_global['header_position'] ) {
		get_template_part( '/template-parts/headers/header-bottom' ); }
	?>

<div id="content" class="lucent-content <?php echo $contentside; ?> <?php echo $boxed; ?>">
