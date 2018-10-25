<?php
/**
 *
 * Class to generate header elements.
 *
 * @package Lucent
 **/

if ( ! class_exists( 'Lucent_Projects' ) ) {

	/**
	 *
	 * Class to generate header elements.
	 *
	 * @category Class Lucent_Projects
	 * @package Lucent
	 **/
	class Lucent_Projects {

		/**
		 * Global Variable
		 *
		 * @var mix $lucent_opts
		 */
		protected $lucent_opts;

		/**
		 *
		 * Function Construct
		 */
		public function __construct() {

			global $lucent_opts;

			$this->lucent_options =& $lucent_opts;

			add_action( 'after_setup_theme', array( $this, 'lucent_projects_defaults' ), 11 );

			add_filter( 'post_class', array( $this, 'lucent_projects_classes' ) );

			add_action( 'lucent_compact_projects', array( $this, 'lucent_compact_project' ) );

			add_action( 'Lucent_Projects_Filter', array( $this, 'lucent_filter_projects' ) );

			add_action( 'lucent_project_standard_images', array( $this, 'lucent_standard_images' ) );

		}

		/**
		 *
		 * Function sets projects post type defaults
		 */
		function lucent_projects_defaults() {

				add_image_size( 'project_single',   535,  535,   false );

				add_image_size( 'project_catalog',  300,  300,   false );

				add_image_size( 'project_thumbnail',    160,  160,   false );

				add_image_size( 'project_full_width',   350,  350,   true );

		}

		/**
		 *
		 * Function to retrieve project post type classes.
		 *
		 * @param string $classes retrive classes.
		 */
		function lucent_projects_classes( $classes ) {
			global $post;
			$project_skills = get_the_terms( $post->ID, 'skills' );
			$post_taxs = wp_get_post_terms(
				$post->ID, 'skills', array(
					'fields' => 'all',
				)
			);
			if ( $post_taxs ) {
				foreach ( $project_skills as $skill ) {

					foreach ( $post_taxs as $post_tax ) {

						$classes[] = $post_tax->slug;

					}
				}
			}
			return $classes;
		}

		/**
		 *
		 * Function generates projects post type category filter
		 */
		function lucent_filter_projects() {

				global $post;

			if ( 'lucent-full-width-projects' === $this->lucent_options['lucent_full_projects_layout'] ) {

					$filterwrapper = 'filter-fullwidth-wrapper';

			} else {

				$filterwrapper = 'filter_wrapper';

			}

			if ( 'yes' === $this->lucent_options['lucent_projects_filter'] ) :
				{

				echo '<div class = "projects-filters">';

				echo '<div class="' . $filterwrapper . '">';  // WPCS: XSS ok.

				echo '<div id="filters">';

				echo '<select id="lucent-filters" class="as-select as-elastic" data-filter-group="skills">';

				echo '<option class="selected" data-filter-value="" >' . esc_attr_e( 'All Projects', 'lucent' ) . ' </option>';

				$args = array(

					'post_type' => 'project',
				);

				$projects = new WP_Query( $args );

				if ( is_array( $projects->posts ) && ! empty( $projects->posts ) ) {

					foreach ( $projects->posts as $project_post ) {

							$post_taxs = wp_get_post_terms(
								$project_post->ID, 'skills', array(
									'fields' => 'all',
								)
							);

						if ( is_array( $post_taxs ) && ! empty( $post_taxs ) ) {

							foreach ( $post_taxs as $post_tax ) {

									$projects_taxs[ $post_tax->slug ] = $post_tax->name;

							}
						}
					}
				}

				foreach ( $projects_taxs as $projects_tax_slug => $projects_tax_name ) :

					echo '<option class="filter-selector" data-filter-value=".' . esc_attr( $projects_tax_slug , 'lucent' ) . '" >' . esc_attr( $projects_tax_name , 'lucent' ) . '</option>';

				endforeach;

				echo '</select>';

				echo '</div>';

				echo '</div>';

				echo '</div>';

				} endif;

		}

		/**
		 *
		 * Function generates images html output
		 */
		function lucent_standard_images() {

				global $post;

				$project_attachments = get_post_meta( $post->ID, 'lucent_gallery_id', true );

				echo '<div id="elegant-image-container">';

				echo '<div class="big-images">';

			if ( has_post_thumbnail() ) {

							$classes = array( 'item' );
				$image_title    = esc_attr( get_the_title( get_post_thumbnail_id() ) );
				$image_caption  = get_post( get_post_thumbnail_id() )->post_excerpt;
				$image          = get_the_post_thumbnail(
					$post->ID, apply_filters( 'single_project_large_thumbnail_size', 'project_single' ), array(
						'title' => $image_title,
						'alt'   => $image_title,
					)
				);

				 $image_class = esc_attr( implode( ' ', $classes ) );

				 echo apply_filters( 'lucent_single_project_html', sprintf( '<a class="%s">%s</a>', $image_class, $image ),  $post->ID ); // WPCS: XSS ok.

			}

			if ( $project_attachments ) {

								$loop       = 0;

				foreach ( $project_attachments as $project_attachment ) {

					if ( has_post_thumbnail() ) {

								$classes = array( 'item' );

						$image_title    = esc_attr( get_the_title( get_post_thumbnail_id() ) );
						$image_caption  = get_post( get_post_thumbnail_id() )->post_excerpt;
						$image          = wp_get_attachment_image(
							$project_attachment, apply_filters( 'single_project_large_thumbnail_size', 'project_single' ), array(
								'title' => $image_title,
								'alt'   => $image_title,
							)
						);

						$image_class = esc_attr( implode( ' ', $classes ) );

						$attachment_count = count( $project_attachment );

						if ( $attachment_count > 0 ) {
							$gallery = '[project-gallery]';
						} else {
							$gallery = '';
						}

							echo apply_filters( 'lucent_single_project_html', sprintf( '<a class="%s">%s</a>', $image_class, $image ),  $post->ID ); // WPCS: XSS ok.

					}
				}
			}

							echo '</div>';

							echo '</div>';

							echo '<div class="thumbs">';

			if ( has_post_thumbnail() ) {

				$classes = array( 'item' );
				$image_title    = esc_attr( get_the_title( get_post_thumbnail_id() ) );
				$image_caption  = get_post( get_post_thumbnail_id() )->post_excerpt;
				$image          = get_the_post_thumbnail(
					$post->ID, apply_filters( 'single_project_small_thumbnail_size', 'project_thumbnail' ), array(
						'title' => $image_title,
						'alt'   => $image_title,
					)
				);

				$image_class = esc_attr( implode( ' ', $classes ) );

				echo apply_filters( 'lucent_single_project_image_thumbnail_html', sprintf( '<a class="%s">%s</a>', $image_class, $image ),  $post->ID ); // WPCS: XSS ok.

			}

			if ( $project_attachments ) {

						$loop       = 0;

				foreach ( $project_attachments as $project_attachment ) {

					if ( has_post_thumbnail() ) {

						$classes = array( 'item' );

						$image_title    = esc_attr( get_the_title( get_post_thumbnail_id() ) );
						$image_caption  = get_post( get_post_thumbnail_id() )->post_excerpt;
						$image          = wp_get_attachment_image(
							$project_attachment, apply_filters( 'single_project_small_thumbnail_size', 'project_thumbnail' ), array(
								'title' => $image_title,
								'alt'   => $image_title,
							)
						);

						$image_class = esc_attr( implode( ' ', $classes ) );

						$attachment_count = count( $project_attachment );

						if ( $attachment_count > 0 ) {
							$gallery = '[project-gallery]';
						} else {
							$gallery = '';
						}

							echo apply_filters( 'lucent_single_project_image_thumbnail_html', sprintf( '<a class="%s">%s</a>', $image_class, $image ),  $post->ID ); // WPCS: XSS ok.

					}
				}
			}

		}

		/**
		 *
		 * Function limits excerpt length
		 *
		 * @param int $limit limit excerpt length.
		 */
		public function lucent_project_excerpt( $limit ) {

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
		 * Function generates compact view of single project page.
		 */
		function lucent_compact_project() {

			global $post;

			echo '<div id="compact-view_' . $post->ID . '" class="compact-view-content mfp-hide">'; // WPCS: XSS ok.

			echo '<div class="compact-view-images lucent-gallery">';

			echo '<div id="lucent-share-container">';

			echo '<div  class="lucent-share">'; ?>

				<a href="#" data-type="facebook" data-url="<?php the_permalink(); ?>" data-description="<?php $this->lucent_project_excerpt( $this->lucent_options['lucent_project_word_count'] ); ?>" data-via="<?php get_bloginfo( 'name' ); ?>" class="social-share icon-facebook"></a>
				<a href="#" data-type="twitter" data-url="<?php the_permalink(); ?>" data-description="<?php $this->lucent_project_excerpt( $this->lucent_options['lucent_project_word_count'] ); ?>" data-via="<?php get_bloginfo( 'name' ); ?>" class="social-share icon-twitter"></a>
				<a href="#" data-type="googleplus" data-url="<?php the_permalink(); ?>" data-description="<?php $this->lucent_project_excerpt( $this->lucent_options['lucent_project_word_count'] ); ?>" data-via="<?php get_bloginfo( 'name' ); ?>" class="social-share icon-google-plus"></a>
				<a href="#" data-type="pinterest" data-url="<?php the_permalink(); ?>" data-description="<?php $this->lucent_project_excerpt( $this->lucent_options['lucent_project_word_count'] ); ?>" data-via="<?php get_bloginfo( 'name' ); ?>" class="social-share icon-pinterest"></a>
				<a href="#" data-type="linkedin" data-url="<?php the_permalink(); ?>" data-description="<?php $this->lucent_project_excerpt( $this->lucent_options['lucent_project_word_count'] ); ?>" data-via="<?php get_bloginfo( 'name' ); ?>" class="social-share icon-linkedin"></a>

				<?php

				echo '</div></div>';

				do_action( 'lucent_project_standard_images' );

				echo '</div></div>';

				echo '<div class = "lucent-elegant-short-summary compact-view-summary">';

				the_content();

				$project_web = get_post_meta( $post->ID, 'project-website', true );

				echo '<button class="lucent-link" ><a href = "' . esc_url( $project_web, 'lucent' ) . '" target="_blank">' . esc_html__( 'Visit Project Website', 'lucent' ) . '</a></button>';

				echo '</div>';

		}


	}

}
