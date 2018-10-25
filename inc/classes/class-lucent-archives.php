<?php
/**
 *
 * Class generates base archives functions.
 *
 * @package Lucent
 * @author TheCodeBunny
 **/

if ( ! class_exists( 'Lucent_Archives' ) ) {

	/**
	 *
	 * Class Lucent_Archives
	 * @category Class
	 * @package Lucent
	 * @author TheCodeBunny
	 */
	class Lucent_Archives {

		/**
		 *
		 * Function Construct
		 *
		 * @package Lucent
		 * @var $lucent_opts mix Global variable
		 * @param string $lucent_opts global variable for theme options
		 * @param string $args retrieves user defined posttype.
		 **/
		public function __construct( $args = array() ) {

			global $lucent_opts;

			$this->lucent_options =& $lucent_opts;

			add_action( 'Lucent_Acrhives_Title' , array( $this, 'lucent_archive_post_title' ) );

			add_filter( 'excerpt_length', array( $this, 'lucent_archive_excerpt' ), 999 );

			add_action( 'Lucent_Archives_Share', array( $this, 'lucent_archive_share' ) );

			add_action( 'Lucent_Archives_Icons_Images', array( $this, 'lucent_hover_icons_images' ) );

			add_action( 'Lucent_Archives_Category_Filter', array( $this, 'lucent_archives_filter' ) );
		}

		/**
		 *
		 * Function limits excerpt length
		 *
		 * @param int $limit limit excerpt length.
		 */
		public function lucent_archives_excerpt( $limit ) {

			$limit = $this->lucent_options['lucent_posts_archive_desc'];

			$excerpt = explode( ' ', get_the_excerpt(), $limit );
			if ( count( $excerpt ) >= $limit ) {
				array_pop( $excerpt );
				$excerpt = implode( ' ',$excerpt ) . '...';
			} else {
				$excerpt = implode( ' ',$excerpt );
			}
			  $excerpt = preg_replace( '`[[^]]*]`','',$excerpt );
			  return $excerpt;

		}

		/**
		 *
		 * Function Post title
		 *
		 * @package Lucent
		 * @param string $args retrieves user defined posttype
		 **/
		function lucent_archive_post_title() {
	?>

				<h4 class="product-title"><a href="<?php esc_url( the_permalink() ); ?>"><?php esc_attr( the_title() ); ?></a></h4>

		<?php
		}

		/**
		 *
		 * Function changes product exerpt length
		 *
		 * @var string $post global var declaration
		 * @var string $posttype fetch post type
		 * @param int $limit excerpt length.
		 */
		public function lucent_archive_excerpt( $limit ) {

			global $post;

			$posttype = get_post_type();

			if ( 'projects' == $posttype ) {
				$limit == $this->lucent_options['lucent_project_word_count']; } elseif ( 'jobs' == $posttype ) {
				$limit == $this->lucent_options['lucent_jobs_word_count']; } elseif ( 'testimonials' == $posttype ) {
					$limit == $this->lucent_options['lucent_project_word_count']; } elseif ( 'staff' == $posttype ) {
					$limit == $this->lucent_options['lucent_project_word_count']; } elseif ( 'product' == $posttype ) {
						$limit == $this->lucent_options['lucent_loop_word_count']; } else {
						$limit = '100'; }

						$excerpt = explode( ' ', get_the_excerpt(), $limit );
						if ( count( $excerpt ) >= $limit ) {
							array_pop( $excerpt );
							$excerpt = implode( ' ',$excerpt ) . '...';
						} else {
							$excerpt = implode( ' ',$excerpt );
						}
						$excerpt = preg_replace( '`[[^]]*]`','',$excerpt );
						return $excerpt;

		}

				/**
		 *
		 * Function changes product exerpt length
		 *
		 * @var string $post global var declaration
		 * @var string $posttype fetch post type
		 */
		public function lucent_archive_share() {

			echo '<div id="lucent-share-container">';

			echo '<div  class="lucent-share">';
			?>

				<a href="#" data-type="facebook" data-url="<?php the_permalink(); ?>" data-description="<?php do_action( 'Lucent_Archives_Excerpt' ); // WPCS: XSS ok. ?>" data-via="<?php get_bloginfo( 'name' ); ?>" class="social-share icon-facebook"></a>
				<a href="#" data-type="twitter" data-url="<?php the_permalink(); ?>" data-description="<?php do_action( 'Lucent_Archives_Excerpt' ); // WPCS: XSS ok. ?>" data-via="<?php get_bloginfo( 'name' ); ?>" class="social-share icon-twitter"></a>
				<a href="#" data-type="googleplus" data-url="<?php the_permalink(); ?>" data-description="<?php do_action( 'Lucent_Archives_Excerpt' ); // WPCS: XSS ok. ?>" data-via="<?php get_bloginfo( 'name' ); ?>" class="social-share icon-google-plus"></a>
				<a href="#" data-type="pinterest" data-url="<?php the_permalink(); ?>" data-description="<?php do_action( 'Lucent_Archives_Excerpt' ); // WPCS: XSS ok. ?>" data-via="<?php get_bloginfo( 'name' ); ?>" class="social-share icon-pinterest"></a>
				<a href="#" data-type="linkedin" data-url="<?php the_permalink(); ?>" data-description="<?php do_action( 'Lucent_Archives_Excerpt' ); // WPCS: XSS ok. ?>" data-via="<?php get_bloginfo( 'name' ); ?>" class="social-share icon-linkedin"></a>

				<?php

				echo '</div></div>';

		}

		/**
		 *
		 * Function lucent_hover_icons_images
		 *
		 **/
		public function lucent_hover_icons_images() {

			global $product;

			echo '<div class="archive-images">';

				   echo '<div id="' . $this->lucent_options['lucent_woo_hover_styles'] . '">';

					   the_post_thumbnail(
						   'shop_catalog', array(
							   'class' => '',
						   )
					   );
			?>

						<div class="overlay">

													<a rel="nofollow" href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" data-quantity="1" data-product_id="<?php echo esc_attr( $product->get_id() ); ?>"class="icon-strip-left add_to_cart_button ajax_add_to_cart product_type_simple icons"><i class="icon-cart"></i></a>
							
							<a href="
							<?php
							the_post_thumbnail_url( 'full' );
							;
							?>
							" class="summary-lightbox icon-strip-middle icons" data-rel="summarylightbox" title="<?php the_title(); ?>"><i class="icon-search"></i></a>
							
							<a rel="nofollow" href="<?php echo esc_url( $product->get_permalink() ); ?>" class="icon-strip-right icons"><i class="icon-link"></i></a>

												</div>

						<?php
						echo '</div>';

		}

		 /**
		  *
		  * Function generates category filter on archive pages.
		  */

		public function lucent_archives_filter() {
	?>

			<div class = "archives-filters">
				<div class="filters_wrapper">
					<div id="filters">
						<select class="option-set clearfix" data-filter-group="categories">
							<option class="selected" data-filter-value="" ><?php echo __( 'ALL PRODUCTS', 'lucent' ); ?></option>
							<?php
							//products taxanomy query
							  global $post;

																  $args = array(
																	  'post_type' => get_post_type( get_the_id() ),
																  );

														  $products = new WP_Query( $args );
							if ( is_array( $products->posts ) && ! empty( $products->posts ) ) {
								foreach ( $products->posts as $product_post ) {
									$post_taxs = wp_get_post_terms(
										$product_post->ID, 'product_cat', array(
											'fields' => 'all',
										)
									);
									if ( is_array( $post_taxs ) && ! empty( $post_taxs ) ) {
										foreach ( $post_taxs as $post_tax ) {
											$post_taxs[ $post_tax->slug ] = $post_tax->name;
										}
									}
								}
							}
							?>

																<!--Category Filter-->
							<?php foreach ( $post_tax as $products_tax_slug => $products_tax_name ) : ?>
							<option class="filter-selector" data-filter-value=".<?php echo $products_tax_slug; ?>"><?php echo $products_tax_name; ?></option>
							<?php endforeach; ?>
						</select>
						<!--End-->
					</div>
				</div>
			</div>

			<?php
		}

	}

}

 new Lucent_Archives();
