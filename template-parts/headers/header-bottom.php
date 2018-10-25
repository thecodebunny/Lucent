<?php 

/***********************************************
 * 
 * Template part for Top Header Styles
 * 
 **********************************************/
 
 get_template_part('/template-parts/headers/top-bar' );
 
 ?>
 
 <header id="masthead-bottom" class="lucent-header" role="banner">
		<div class="bottom-lucent-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="lucent-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="lucent-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .lucent-branding -->

		<nav id="lucent-navigation" class="main-navigation" role="navigation">
			<?php do_action('Lucent_Main_Nav_Bottom'); ?>
		</nav><!-- #lucent-navigation -->
	</header><!-- #masthead -->