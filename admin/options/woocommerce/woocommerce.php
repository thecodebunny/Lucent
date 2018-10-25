<?php
  /**
   *
   * WooCommerce options Init
   *
   * @package Lucent
   **/

Redux::setSection(
	'lucent_opts',
	array(
		'id'         => 'lucent_woocommerce',
		'title'      => __( 'Shop Options','lucent' ),
		'desc'     => __( 'Choose your store settings here options.','lucent' ),
		'desc'     => __( 'Requires free WooCommerce plugin.', 'lucent' ),
		'icon'       => 'panel-basket',
		'subsection' => false,
	)
);

  require_once( LUCENT_OPTIONS . 'woocommerce/global.php' );

  require_once( LUCENT_OPTIONS . 'woocommerce/shop.php' );

  require_once( LUCENT_OPTIONS . 'woocommerce/product.php' );

  require_once( LUCENT_OPTIONS . 'woocommerce/accounts.php' );
