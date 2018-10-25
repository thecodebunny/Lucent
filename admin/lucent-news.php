<?php
if ( ! defined( 'ABSPATH' ) ) {
		exit;
}

if ( ! class_exists( 'LucentNews' ) ) {
	class LucentNews {

		public function __construct() {

			add_action( 'wp_dashboard_setup', 'add_lucent_dashboard' );

		}

		public function add_lucent_dashboard() {
			add_meta_box( 'lucent_dashboard_widget', 'Lucent News', array( $this, 'lucent_dashboard_widget' ), 'dashboard', 'side', 'high' );
		}

		public function dat() {
			return;
		}

		public function lucent_dashboard_widget() {
			echo '<div class="rss-widget">';
			wp_widget_rss_output(
				array(
					'url'          => 'https://thecodebunny.com/feed/',
					'title'        => 'REDUX_NEWS',
					'items'        => 3,
					'show_summary' => 1,
					'show_author'  => 0,
					'show_date'    => 1,
				)
			);
			echo '</div>';
		}
	}
}
