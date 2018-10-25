<?php
/**
 *
 * Class to implement core theme functions.
 *
 * @package Lucent
 **/

if ( ! class_exists( 'Lucent_Core' ) ) {

	/**
	 *
	 * Class Lucent Core
	 *
	 * @package Lucent
	 * @category Class
	 **/
	class Lucent_Core {

		/**
		 * Global variable.
		 *
		 * @var mix $lucent_opts
		 **/
		public static $lucent_opts;

		/**
		 *
		 * Function Construct
		 *
		 * @package Lucent
		 * @var $lucent_opts mix Global variable
		 **/
		public function __construct() {

			global $lucent_opts;

			$this->lucent_options =& $lucent_opts;

			add_action( 'wp_head', array( $this, 'lucent_inline_styles' ) );

			add_action( 'wp_footer', array( $this, 'lucent_inline_js' ) );

			add_filter( 'excerpt_length', array($this, 'lucent_share_excerpt'), 999 );

			add_action( 'Lucent_Social_Share', array( $this, 'lucent_share_icons' ) );

			add_action( 'Lucent_Hover_Share', array( $this, 'lucent_loop_share' ) );

			add_action( 'Lucent_Flat_Links', array( $this, 'lucent_flat_details' ) );

			add_filter( 'manage_project_posts_columns' , array( $this, 'lucent_project_image' ) );

			add_action( 'manage_project_posts_custom_column' , array( $this, 'lucent_get_featured_image' ), 10, 2 );

		}

		/**
		 *
		 * Function Minifies Inline Css
		 *
		 * @package Lucent
		 *
		 * @param string $css css output from theme options.
		 **/
		public static function minify_inline_css( $css ) {

			// remove comments.
			$custom_css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );

			// remove whitespace.
			$custom_css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css );

			return $custom_css;
		}


		/**
		 *
		 * Function Adds Inline Styles
		 *
		 * @package Lucent
		 **/
		function lucent_inline_styles() {

			echo '<style type="text/css" id="lucent_inline_styles">' . "\n";

			ob_start();

			{

				// Layout related theme options.
				require_once LUCENT_INCLUDE . 'styles/lucent-dynamic-css.php';
				require_once LUCENT_INCLUDE . 'styles/lucent-ui-css.php';

				// Colors related theme options.
				// require_once LUCENT_INCLUDE . 'styles/color-styles.php';!
				// Responsive dynamic css.
				// require_once LUCENT_INCLUDE . 'styles/responsive-styles.php';!
			}

			$custom_css = ob_get_contents();

			ob_get_clean();

			echo esc_html( $this->minify_inline_css( $custom_css ) );

			echo '</style>' . "\n";
		}


		/**
		 *
		 * Function Minifies Inline Javascripts
		 *
		 * @package Lucent
		 **/
		function lucent_inline_js() {

			ob_start();

			{
					require_once LUCENT_FUNCTIONS . 'lucent-footer-scripts.php';

			}

			$custom_js = ob_get_contents();

			ob_get_clean();

			echo $custom_js; // WPCS: XSS ok.

		}

		/**
		 *
		 * Function Limites Share Popup Excerpt
		 *
		 * @package Lucent
		 * @param int $limit Excerpt Limit.
		 **/
		public function lucent_share_excerpt( $length ) {
			return $this->lucent_options['lucent_share_word_count'];

		}


		/**
		 *
		 * Function Generates Share Icons
		 *
		 * @package Lucent
		 **/
		function lucent_share_icons() {

			global $post;

			$lucent_share = '<div id="lucent-share-container">
                              <div  class="lucent-share">
								<a href="#" data-type="facebook" data-url="' . get_permalink() . '" data-description="" data-via="' . get_bloginfo( 'name' ) . '" class="social-share icon-facebook"></a>
								<a href="#" data-type="twitter" data-url="' . get_permalink() . '" data-description="" data-via="' . get_bloginfo( 'name' ) . '" class="social-share icon-twitter"></a>
								<a href="#" data-type="googleplus" data-url="' . get_permalink() . '" data-description="" data-via="' . get_bloginfo( 'name' ) . '" class="social-share icon-google-plus"></a>
								<a href="#" data-type="pinterest" data-url="' . get_permalink() . '" data-description="" data-via="' . get_bloginfo( 'name' ) . '" class="social-share icon-pinterest"></a>
								<a href="#" data-type="linkedin" data-url="' . get_permalink() . '" data-description="" data-via="' . get_bloginfo( 'name' ) . '" class="social-share icon-linkedin"></a>
                              </div>
                              </div>';

			echo $lucent_share; // WPCS: XSS ok.

		}


		/**
		 *
		 * Function Generates Loop Sharing Icons
		 *
		 * @package Lucent
		 **/
		function lucent_loop_share() {

			$lucent_loop_share = '<div class="icon-strip-right icons LucentSingleShare single-share">
            <span class="showSocialButtons icon-share"></span>
			<span class="socials" style="width: 3960px; margin-left: -1960px;">
		        <a href="#" data-type="facebook" data-url="' . get_the_permalink() . '" data-description="" data-via="' . get_bloginfo( 'name' ) . '" class="social-share icon-facebook"></a> 
                <a href="#" data-type="twitter" data-url="' . get_the_permalink() . '" data-description="" data-via="' . get_bloginfo( 'name' ) . '" class="social-share icon-twitter"></a>
                <a href="#" data-type="googleplus" data-url="' . get_the_permalink() . '" data-description="" data-via="' . get_bloginfo( 'name' ) . '" class="social-share icon-google-plus"></a>
                <a href="#" data-type="pinterest" data-url="' . get_the_permalink() . '" data-description="" data-via="' . get_bloginfo( 'name' ) . '" class="social-share icon-pinterest"></a>
                <a href="#" data-type="linkedin" data-url="' . get_the_permalink() . '" data-description="" data-via="' . get_bloginfo( 'name' ) . '" class="social-share icon-linkedin"></a>
		    </span>
			</div>';
			echo $lucent_loop_share; // WPCS: XSS ok.

		}


		/**
		 *
		 * Function Generates links for loop flat styles
		 *
		 * @package Lucent
		 **/
		function lucent_flat_details() {

			$lucent_flat_details = '<div class="flat-links">
			
				<li href="' . get_the_permalink() . '" class="flat-details"><i class="icon-list"></i></li>

                <li class="flat-popup" href="#compact-view_' . get_the_ID() . '"><i class="icon-eye"></i></li>

                <li class="flat-share"><i class="icon-share"></i></li>

                <div class="lucent-share-popup">

                <ul class="popup-share">

            	<li href="#" data-type="facebook" data-url="' . get_the_permalink() . '" data-description="" data-via="' . get_bloginfo( 'name' ) . '" class="social-share icon-facebook"></li>
                <li href="#" data-type="twitter" data-url="' . get_the_permalink() . '" data-description="" data-via="' . get_bloginfo( 'name' ) . '" class="social-share icon-twitter"></li>
                <li href="#" data-type="googleplus" data-url="' . get_the_permalink() . '" data-description="" data-via="' . get_bloginfo( 'name' ) . '" class="social-share icon-google-plus"></li>
                <li href="#" data-type="pinterest" data-url="' . get_the_permalink() . '" data-description="" data-via="' . get_bloginfo( 'name' ) . '" class="social-share icon-pinterest"></li>
                <li href="#" data-type="linkedin" data-url="' . get_the_permalink() . '" data-description="" data-via="' . get_bloginfo( 'name' ) . '" class="social-share icon-linkedin"></li>

                </ul>

                </div>

				</div>';

			echo $lucent_flat_details;  // WPCS: XSS ok.

		}

		/**
		 *
		 * Function Defines Projct Featured Images
		 *
		 * @package Lucent
		 * @param int $columns Number of projects loop columns.
		 **/
		function lucent_project_image( $columns ) {
			$columns = array(
				'cb' => '<input type="checkbox" />',
				'featured_image' => 'Image',
				'title' => 'Title',
				'comments' => '<span class="vers"><div title="Comments" class="comment-grey-bubble"></div></span>',
				'date' => 'Date',
			);
			return $columns;
		}

		/**
		 *
		 * Function retrieves feaured image.
		 *
		 * @package Lucent
		 * @param int $column Featured image column.
		 * @param int $post_id WordPress post id.
		 **/
		function lucent_get_featured_image( $column, $post_id ) {
			switch ( $column ) {
				case 'featured_image':
					echo the_post_thumbnail( 'thumbnail' );
					break;
			}
		}

	}

}

new Lucent_Core();
