<?php 

/***********************************************
 * 
 * Template part for Top Header Styles
 * 
 **********************************************/

 $lucent_global = lucent_global();
 ?>
 
 

	<header id="masthead" <?php if ( 'yes' === $lucent_global['lucent_topheader_shadow'] ) echo 'class="'.$lucent_global['lucent_topshadow_style'].'"';?>>
	<?php get_template_part('/template-parts/headers/top-bar' ); ?>
	<?php if ( 'true' === $lucent_global['lucent_menu_sticky'] ) echo '<div class="lucent-sticky">'; ?>
		<div id="lucent-brand-container">
			<div class="lucent-branding">
				
				<?php do_action('Lucent_Logo'); ?>
				
			</div><!-- .lucent-branding -->
			<div class="lucent-navigation">
					
					<?php do_action('Lucent_Main_Nav_Top'); ?>
			
			</div><!-- #lucent-navigation -->		
		</div>		
	<?php if ( 'true' === $lucent_global['lucent_menu_sticky'] ) echo '</div>'; ?>
	</header><!-- #masthead -->