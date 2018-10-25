<?php
/**
 * Class to announce Lucent Theme related news and updates.
 *
 * @category LucentNews
 * @package Lucent
 */

if ( ! defined( 'ABSPATH' ) ) {
		exit;
}

if ( ! class_exists( 'LucentNews' ) ) {
	/**
	 * Below class announces lucent theme news and updates.
	 */
	class LucentNews {
		/**
		 * Construct function.
		 */
		public function __construct() {

			add_action( 'wp_dashboard_setup', array( $this, 'add_lucent_dashboard' ) );

		}

		/**
		 * Adds lucent news dashboard widget.
		 */
		public function add_lucent_dashboard() {
			wp_add_dashboard_widget(
				'lucent_news_widget',
				'Lucent News',
				array( $this, 'lucent_dashboard_widget' )
			);
		}

		/**
		 * Renders widget.
		 */
		public function lucent_dashboard_widget() {
			   echo '<div class="lucent-news-widget">';
			   wp_widget_rss_output(
				   array(
					   'url'          => 'https://thecodebunny.com/category/news/feed/',
					   'items'        => 3,
					   'show_summary' => 1,
					   'show_author'  => 1,
					   'show_date'    => 1,
				   )
			   );
			   echo '</div>';
		}
	}
}


new LucentNews();
