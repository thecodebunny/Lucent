<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lucent
 */
$lucent_global = lucent_global();
?>
	<footer id="colophon" class="lucent-footer">
		<div class="lucent-info">
			<a href="<?php echo esc_url( __( 'https://lucenttheme.org/', 'lucent' ) ); ?>">
								<?php
								/* translators: %s: CMS name, i.e. WordPress. */
								printf( esc_html__( 'Proudly powered by %s', 'lucent' ), 'Lucent THEME' );
			?>
			</a>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'lucent' ), 'lucent', '<a href="https://thecodebunny.com">TheCodeBunny</a>' );
			?>
		</div><!-- .lucent-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

</div><!-- .avoado-pusher -->

</div><!-- #LucentMain -->

<?php wp_footer(); ?>
<?php
if ( 'boxed_layout' === $lucent_global['site_layout'] ) {
	echo '</div>';}
?>
</body>
</html>
