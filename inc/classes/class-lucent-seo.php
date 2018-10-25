<?php
/**
 *
 * Class generates SEO Features and meta tags
 *
 * @package Lucent
 */

if ( ! class_exists( 'Lucent_SEO' ) ) {

	/**
	 * Class Lucent_SEO
	 *
	 * @package Lucent
	 */
	class Lucent_SEO {

		/**
		 *
		 * Global Variable
		 *
		 * @var mix $lucent_opts global variable
		 */
		protected $lucent_opts;

		/**
		 *
		 * Function __contruct
		 */
		public function __construct() {

			global $lucent_opts;

			$this->lucent_options =& $lucent_opts;

			add_action( 'Lucent_Seo', array( &$this, 'lucent_title' ) );

			add_filter( 'pre_get_document_title', array( &$this, 'lucent_change_title' ), 10, 2 );

			add_action( 'lucent_favicons', array( &$this, 'lucent_favicons' ) );

			add_action( 'lucent_head_hooks', array( &$this, 'lucent_head_hooks' ) );

			add_filter( 'language_attributes', array( $this, 'lucent_opengraph_doctype' ) );

			add_action( 'wp_head', array( $this, 'lucent_opengraph_meta' ), 5 );
		}

		/**
		 *
		 * Function lucent_seo
		 */
		public function lucent_title() {

			global $post, $woocommerce;

			if ( class_exists( 'WooCommerce' ) && is_shop() ) :
				{

				$plogpost_id = wc_get_page_id( 'shop' );

				} else :
					{

					$plogpost_id = $post->ID;

					}

			endif;

				$this->meta_keywords = get_post_meta( $plogpost_id, 'lucent_seo_options_keywords', true );

				if ( '' !== $this->meta_keywords ) :
					{

						echo '<meta name = "keywords" content= "' . esc_attr( $this->meta_keywords , 'lucent' ) . '" />';

						} else :
							{

							echo '<meta name = "keywords" content= "' . esc_attr( $this->lucent_options['lucent_keywords'] , 'lucent' ) . '" />';

							}

						endif;

						$this->meta_description = get_post_meta( $plogpost_id, 'lucent_seo_options_description', true );

						if ( '' !== $this->meta_description ) :
							{

							echo '<meta name = "description" content= "' . esc_attr( $this->meta_description , 'lucent' ) . '" />';

							} else :
								{

								echo '<meta name = "description" content= "' . esc_attr( $this->lucent_options['lucent_description'] , 'lucent' ) . '" />';

								}

				endif;

		}

		/**
		 *
		 * Function lucent_ssl
		 */
		public function lucent_ssl() {

			if ( 'true' === $this->lucent_options['lucent_ssl'] || is_ssl() ) {

					str_replace( 'http://', 'https://', WP_CONTENT_URL );

				if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && 'https' === $_SERVER['HTTP_X_FORWARDED_PROTO'] ) {
					$_SERVER['HTTPS'] = 'on';
				}
			}

		}

		/**
		 *
		 * Function lucent_change_title
		 */
		public function lucent_change_title() {

						global $post, $woocommerce;

						$blogtitle = '';

			if ( class_exists( 'WooCommerce' ) && is_shop() ) :
				{

				$avdpost_id = wc_get_page_id( 'shop' );

				} else :
					{

								$avdpost_id = $post->ID;

								}

							endif;

							$metatitle = get_post_meta( $avdpost_id, 'lucent_seo_options_title', true );

				if ( '' !== $metatitle ) :
					{

					$sep = ' | ' ;

					$blogtitle .= get_bloginfo( 'name' );

					$title = "$metatitle $sep $blogtitle";

					return $title;

					}

							endif;

		}

		/**
		 *
		 * Function lucent_favicons
		 */
		public function lucent_favicons() {

				$lucent_favicon = $this->lucent_options['lucent_favicon']['url'];

				$lucent_apple = $this->lucent_options['lucent_apple']['url'];

			if ( ! $lucent_favicon ) {
				echo '<link rel="shortcut icon" href="' . esc_url( $lucent_favicon ) . '"/>';
			}

			if ( ! $lucent_apple ) {
				echo '<link rel="apple-touch-icon" href="' . esc_url( $lucent_apple ) . '"/>';
			}

		}

		/**
		 *
		 * Function lucent_head_hooks
		 */
		public function lucent_head_hooks() {

				$lucent_header_script = $this->lucent_options['lucent_header_javascript'];

			if ( '' !== $lucent_header_script ) {
				echo '<script id="Lucent-Header-Hook" type="text/javascript">
                    
                        ' . esc_attr( $lucent_header_script , 'lucent' ) . '
                        
                        </script>';
			}

		}

		/**
		 *
		 * Function lucent_opengraph_doctype
		 *
		 * @param string $output returns opengraph doctype.
		 */
		public function lucent_opengraph_doctype( $output ) {

			if ( '1' === $this->lucent_options['lucent_facebook_opengraph'] ) {

					return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';

			}

		}

		/**
		 *
		 * Function lucent_opengraph_meta
		 */
		public function lucent_opengraph_meta() {

			if ( '1' === $this->lucent_options['lucent_facebook_opengraph'] ) {

				global $post;
				$postID = get_the_ID();
				echo '<meta property="fb:admins" content="' . esc_attr( $this->lucent_options['lucent_facebook_user_id'] , 'lucent' ) . '"/>';
				echo '<meta property="og:title" content="' . get_the_title($postID) . '"/>'; // WPCS: XSS ok.
				echo '<meta property="og:type" content="' . get_post_type($postID) . '"/>';
				echo '<meta property="og:url" content="' . get_permalink($postID) . '"/>'; // WPCS: XSS ok.
				echo '<meta property="og:site_name" content="' . get_bloginfo( 'name' ) . '"/>'; // WPCS: XSS ok.
				
				if ( ! has_post_thumbnail( $postID ) ) {
						$default_image = $this->lucent_options['lucent_logo']['url'];
						echo '<meta property="og:image" content="' . $default_image . '"/>'; // WPCS: XSS ok.
				} else {
					$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $postID ), 'medium' );
					echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
				}
				echo '';
			}
		}

	}

			new Lucent_SEO();

}
