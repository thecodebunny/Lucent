<?php

/**
 *
 * Side Navigation
 *
 * @package Lucent
 * @author TheCodeBunny
 * @link class="thecodebunny.com
 **/

 $lucent_global = lucent_global();
 
?>
	<header id="lucent-side-header" class="<?php echo $lucent_global['header_side_position']; ?>">
		<div class="">
			<div class = "lucent-socials">

				<?php do_action( 'Lucent_Socials' ); ?>

			</div>

			<div class = "slide-header-cart">

				<?php if ( class_exists( 'WooCommerce' ) ) { do_action( 'Lucent_Cart' );} ?>

			</div>
			
		</div>
		
		<div class= "side-logo">

			<?php do_action( 'Lucent_Logo' ); ?>

		</div>
		<a class="toggle-LucentVertical" href="#">&#9776;</a>
		<?php do_action( 'Lucent_Vertical_Nav' ); ?>

		<?php if ( ($lucent_global['lucent_side_topbar'] == 'yes') && ($lucent_global['lucent_side_topbar_select'] == 'inside') ) { ?>

		<div class="side-bottom">

			<ul class="side-social-bottom">

			</ul>

			<div class="side-search">

				<?php do_action( 'Lucent_Search' ); ?>

			</div>

			<?php } ?>
		</div>

	</div>

	</header>