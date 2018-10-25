<?php
/**
 *
 * Class to generate header elements.
 *
 * @package Lucent
 **/

if ( ! class_exists( ' Lucent_Header' ) ) {

	/**
	 *
	 * Class to generate header elements.
	 *
	 * @category Class Lucent_Header
	 * @package Lucent
	 **/
	class  Lucent_Header {

		/**
		 * Global Variable.
		 *
		 * @var mix $lucent_opts Global Variable.
		 */
		protected $lucent_opts;

		/**
		 * function __construct()
		 */
		public function __construct() {

			global $lucent_opts;

			$this->lucent_options =& $lucent_opts;

			add_action( 'Lucent_Logo',array( $this, 'lucent_logo' ) );

			add_action( 'Lucent_Info',array( $this, 'lucent_info' ) );

			add_action( 'Lucent_Socials',array( $this, 'lucent_social_icons' ) );

			add_action( 'Lucent_Cart', array( $this, 'lucent_cart' ) );

			add_action( 'wp_nav_menu_items', array( $this, 'add_search_form' ), 10, 2 );

			add_action( 'Lucent_Search', array( $this, 'lucent_searchbox' ) );

			add_action( 'Lucent_Search_Form', array( $this, 'lucent_searchform' ) );

			add_action( 'Lucent_Hidden_Toggle', array( $this, 'lucent_hidden_toggle' ) );

		}

		/**
		 * function  lucent_social_icons()
		 */
		public function lucent_social_icons() {

			ob_start();

			if ( '' !== $this->lucent_options['lucent_facebook_url'] ) {
				echo '<li class="facebook"><a href="' . esc_url( $this->lucent_options['lucent_facebook_url'] ) . '" target="_blank" title="Facebook"><i class="icon-facebook"></i></a></li>';}
			if ( '' !== $this->lucent_options['lucent_twitter_url'] ) {
				echo '<li class="twitter"><a href="' . esc_url( $this->lucent_options['lucent_twitter_url'] ) . '" target="_blank" title="Twitter"><i class="icon-twitter"></i></a></li>';}
			if ( '' !== $this->lucent_options['lucent_flickr_url'] ) {
				echo '<li class="flickr"><a href="' . esc_url( $this->lucent_options['lucent_flickr_url'] ) . '" target="_blank" title="Flickr"><i class="icon-flickr"></i></a></li>';}
			if ( '' !== $this->lucent_options['lucent_googleplus_url'] ) {
				echo '<li class="gplus"><a href="' . esc_url( $this->lucent_options['lucent_googleplus_url'] ) . '" target="_blank" title="Google+"><i class="icon-google-plus"></i></a></li>';}
			if ( '' !== $this->lucent_options['lucent_pinterest_url'] ) {
				echo '<li class="pinterest"><a href="' . esc_url( $this->lucent_options['lucent_pinterest_url'] ) . '" target="_blank" title="Pinterest"><i class="icon-pinterest"></i></a></li>';}
			if ( '' !== $this->lucent_options['lucent_instagram_url'] ) {
				echo '<li class="instagram"><a href="' . esc_url( $this->lucent_options['lucent_instagram_url'] ) . '" target="_blank" title="Instagram"><i class="icon-instagram"></i></a></li>';}
			if ( '' !== $this->lucent_options['lucent_tumblr_url'] ) {
				echo '<li class="tumblr"><a href="' . esc_url( $this->lucent_options['lucent_tumblr_url'] ) . '" target="_blank" title="Tumblr"><i class="icon-tumblr"></i></a></li>';}
			if ( '' !== $this->lucent_options['lucent_blogger_url'] ) {
				echo '<li class="blogger"><a href="' . esc_url( $this->lucent_options['lucent_blogger_url'] ) . '" target="_blank" title="Blogger"><i class="icon-blogger"></i></a></li>';}
			if ( $this->lucent_options['lucent_youtube_url'] ) {
				echo '<li class="youtube"><a href="' . esc_url( $this->lucent_options['lucent_youtube_url'] ) . '" target="_blank" title="Youtube"><i class="icon-youtube"></i></a></li>';}
			if ( '' !== $this->lucent_options['lucent_vimeo_url'] ) {
				echo '<li class="vimeo"><a href="' . esc_url( $this->lucent_options['lucent_vimeo_url'] ) . '" target="_blank" title="Vimeo"><i class="icon-vimeo"></i></a></li>';}
			if ( '' !== $this->lucent_options['lucent_github_url'] ) {
				echo '<li class="github"><a href="' . esc_url( $this->lucent_options['lucent_github_url'] ) . '" target="_blank" title="Github"><i class="icon-github"></i></a></li>';}
			if ( '' !== $this->lucent_options['lucent_linkedin_url'] ) {
				echo '<li class="linkedin"><a href="' . esc_url( $this->lucent_options['lucent_linkedin_url'] ) . '" target="_blank" title="Linkedin"><i class="icon-linkedin"></i></a></li>';}
			if ( '' !== $this->lucent_options['lucent_vine_url'] ) {
				echo '<li class="vine"><a href="' . esc_url( $this->lucent_options['lucent_vine_url'] ) . '" target="_blank" title="Vine"><i class="icon-vine fa-lg"></i></a></li>';}
			if ( '' !== $this->lucent_options['lucent_slideshare_url'] ) {
				echo '<li class="slideshare"><a href="' . esc_url( $this->lucent_options['lucent_slideshare_url'] ) . '" target="_blank" title="Slideshare"><i class="icon-slideshare fa-lg"></i></a></li>';}
			if ( '' !== $this->lucent_options['lucent_vk_url'] ) {
				echo '<li class="vk"><a href="' . esc_url( $this->lucent_options['lucent_vk_url'] ) . '" target="_blank" title="Vk"><i class="icon-vk fa-lg"></i></a></li>';}
			if ( '' !== $this->lucent_options['lucent_soundcloud_url'] ) {
				echo '<li class="soundcloud"><a href="' . esc_url( $this->lucent_options['lucent_soundcloud_url'] ) . '" target="_blank" title="Soundcloud"><i class="icon-soundcloud"></i></a></li>';}
			if ( '' !== $this->lucent_options['lucent_skype_url'] ) {
				echo '<li class="skype"><a href="' . esc_url( $this->lucent_options['lucent_skype_url'] ) . '" target="_blank" title="Skype"><i class="icon-skype"></i></a></li>';}
			if ( $this->lucent_options['lucent_dropbox_url'] ) {
				echo '<li class="dropbox"><a href="' . esc_url( $this->lucent_options['lucent_dropbox_url'] ) . '" target="_blank" title="Dropbox"><i class="icon-dropbox"></i></a></li>';}
			if ( '' !== $this->lucent_options['lucent_forrst_url'] ) {
				echo '<li class="forrst"><a href="' . esc_url( $this->lucent_options['lucent_forrst_url'] ) . '" target="_blank" title="Forrst"><i class="icon-forrst"></i></a></li>';}
			if ( '' !== $this->lucent_options['lucent_yahoo_url'] ) {
				echo '<li class="yahoo"><a href="' . esc_url( $this->lucent_options['lucent_yahoo_url'] ) . '" target="_blank" title="Yahoo"><i class="icon-yahoo"></i></a></li>';}
			if ( '' !== $this->lucent_options['lucent_delicious_url'] ) {
				echo '<li class="delicious"><a href="' . esc_url( $this->lucent_options['lucent_delicious_url'] ) . '" target="_blank" title="Delicious"><i class="icon-delicious"></i></a></li>';}
			if ( '' !== $this->lucent_options['lucent_xing_url'] ) {
				echo '<li class="xing"><a href="' . esc_url( $this->lucent_options['lucent_xing_url'] ) . '" target="_blank" title="Xing"><i class="icon-xing"></i></a></li>';}
			if ( '' !== $this->lucent_options['lucent_paypal_url'] ) {
				echo '<li class="paypal"><a href="' . esc_url( $this->lucent_options['lucent_paypal_url'] ) . '" target="_blank" title="Paypal"><i class="icon-paypal"></i></a></li>';}
			if ( '' !== $this->lucent_options['lucent_foursquare_url'] ) {
				echo '<li class="foursquare"><a href="' . esc_url( $this->lucent_options['lucent_foursquare_url'] ) . '" target="_blank" title="Foursquare"><i class="icon-foursquare"></i></a></li>';}
			if ( '' !== $this->lucent_options['lucent_email_url'] ) {
				echo '<li class="email"><a href="mailto:' . ($this->lucent_options['lucent_email_url']) . '" target="_blank" title="Email"><i class="icon-mail"></i></a></li>';  // WPCS: XSS ok.
			}

			$output_string = ob_get_contents();
			ob_end_clean();
			echo ! empty( $output_string ) ? $output_string : '';  // WPCS: XSS ok.
		}

		/**
		 * function  lucent_logo()
		 */
		public function lucent_logo() {

			echo '<div class="lucent-logo h1">';

			echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" title="' . get_bloginfo( 'name' ) . '">';  // WPCS: XSS ok.

			echo '<img src="' . esc_url( $this->lucent_options['lucent_logo']['url'] ) . '" alt="' . get_bloginfo( 'name' ) . '">';  // WPCS: XSS ok.

			echo '</a>';

			echo '</div>';

		}

		/**
		 * function  lucent_info()
		 */
		public function lucent_info() {

			$lucent_contact_number = $this->lucent_options['lucent_topbar_info_1'];

			$lucent_contact_email = $this->lucent_options['lucent_topbar_info_2'];

			echo '<i class="icon-phone"></i>';

			echo '<a href="tel:' . esc_attr__( $lucent_contact_number, 'lucent' ) . '"> ' . esc_attr__( $lucent_contact_number, 'lucent' ) . '   | </a>';  // WPCS: XSS ok.

			echo '<i class="icon-mail3"></i>';

			echo '<a href="mailto:' . esc_attr__( $lucent_contact_email, 'lucent' ) . '"> ' . esc_attr__( $lucent_contact_email, 'lucent' ) . ' </a>';  // WPCS: XSS ok.

		}

		/**
		 * function  lucent_cart()
		 *
		 * @var mix $woocommerce Global Variable
		 */
		public function lucent_cart() {

			global $woocommerce;

			if ( 'slideout' === $this->lucent_options['lucent_fancy_cart'] ) {

				$slidewidth = $this->lucent_options['lucent_slidecart_width']['width'];
				$effect = $this->lucent_options['lucent_slidecart_fx'];
				$position = $this->lucent_options['lucent_fancycart_slide'];

				$carttype = 'class="lucentslide-trigger"  data-target="#lucenthidden"';

			} else {
				$carttype = 'data-iziModal-open="#lucentpopupcart"'; }

					/* translators: $woocommerce->cart->get_cart_contents_count(): number of items in cart */
					echo '<a id="fancy_minicart" ' . $carttype . '><i class="' . $this->lucent_options['lucent_woo_cart_icon'] . '"></i><span class="itemsnumber">' . sprintf( _n( '%d', '%d', $woocommerce->cart->get_cart_contents_count() ), $woocommerce->cart->get_cart_contents_count() ) . '</span></a>';  // WPCS: XSS ok.

		}

		/**
		 * function  lucent_search_form()
		 *
		 * @param string    $items link items for nav menu.
		 * @param arguments $args WordPress arguments.
		 */
		public function add_search_form( $items, $args ) {

			$lucent_header_presets = $this->lucent_options['header_top'];

			if ( 'boxed_top' === $lucent_header_presets || 'logo_left_simple' === $lucent_header_presets ) {

				if ( 'main-nav' === $args->theme_location ) {

					$items .= '<li id="searchbox" ><i class="icon-search"></i>
                            
                            <form method="get" id="search-form" action="' . esc_url( home_url( '/' ) ) . '">
                            
                            <input type="text" id="search-input" placeholder="' . esc_attr__( 'Search...','lucent' ) . '" name="s" />
                            
                            </form>
                            
                            </li>';
				}
			}

					return $items;

		}

		/**
		 * function  lucent_searchbox()
		 */
		public static function lucent_searchbox() {

				echo '<li id="search-box" ><i class="icon-search"></i>
                    <form method="get" id="search-form" action="' . esc_url( home_url( '/' ) ) . '">
                    <input type="text" id="search-input" placeholder="' . esc_attr__( 'Search...','lucent' ) . '" name="s" />
                	</form>
                    </li>';

		}

		/**
		 * function  lucent_searchform()
		 */
		public function lucent_searchform() {
			echo '<form role="search" method="get" id="searchform" class="clearfix" action="' . esc_url( home_url( '/' ) ) . '" >
            	
            	<label class="screen-reader-text" for="s">' . esc_attr__( 'Search for:', 'lucent' ) . '</label>
            	
            	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__( 'Search the Site&hellip;', 'lucent' ) . '" />
            	
            	<input type="submit" id="searchsubmit" value="' . esc_attr__( 'Go', 'lucent' ) . '" />
            	
            	</form>';  // WPCS: XSS ok.

		}

		/**
		 * function  lucent_hidden_toggle()
		 * Renders Hidden Header toggle button in frontend.
		 *
		 * @param string $lucenthiddenstyle outputs main hidden nav class.
		 */
		public function lucent_hidden_toggle( $lucenthiddenstyle ) {

			if ( 'full' === $this->lucent_options['header_hidden'] ) {
				$extraclass = 'hiddenfull-trigger';
				$datatarget = 'data-target="hidden-fullscreen"';
				$dataeffect = 'data-effect="'. $this->lucent_options['lucent_hiddenfull_fx'] .'"';
			} else {
				$extraclass = '';
				$datatarget = 'data-target="#lucenthiddenslide"';
				$dataeffect = 'data-effect="'. $this->lucent_options['lucent_hidden_fx'] .'"';
			}

			echo '<a class="lucent-hidden-toggle lucentslide-trigger ' . $extraclass . '" ' . $datatarget . ' ' . $dataeffect . '>
			
				 	<span href="#"><i class="icon-menu"></i></span>
				 
				 </a>';

		}

	}

}

 new  Lucent_Header();

