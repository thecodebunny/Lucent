<?php

/**
 *
 * Class Lucent admin
 *
 * @category Class lucent_admin
 * @package Lucent
 * @author TheCodeBunny
 * @link www.lucenttheme.com
 **/

if ( ! class_exists( 'Lucent_Admin' ) ) {

	class Lucent_Admin {

		/**
		 *
		 * Function Construct
		 */
		public function __construct() {

			add_action( 'admin_menu',array( $this, 'lucent_admin_menu' ) );
			add_action( 'wp_before_admin_bar_render', array( $this, 'tcb_lucent_adminbar' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'tcb_admin_styles' ) );
			$this->tcb_lucent_options();

		}

		/**
		 *
		 * Function admin_menu
		 * adds admin menu
		 */
		public function lucent_admin_menu() {

			add_menu_page( __( 'TheCodeBunny','lucent' ), __( 'TheCodeBunny','lucent' ), 'manage_options', 'TheCodeBunny', array( $this, 'the_code_bunny' ), LUCENT_ASSETS . 'img/pin.png', 2 );
			add_submenu_page( 'TheCodeBunny', 'Lucent Options', 'Lucent Options','manage_options', 'admin.php?page=lucent_opts_options' );
			add_submenu_page( 'TheCodeBunny', 'TCB Support', 'TCB Support','manage_options', 'tcb-support', array( $this, 'tcb_support' ) );
			add_submenu_page( 'TheCodeBunny', 'TCB Status', 'TCB System Status','manage_options', 'tcb-status', array( $this, 'tcb_status' ) );

		}

		 /**
		 *
		 * Function toolbar_menu
		 * adds admin bar menu
		 */
		public function tcb_lucent_adminbar() {

			global $wp_admin_bar;

			$wp_admin_bar->add_menu(
				array(
					'id' => 'the-code-bunny',
					'title' => 'TheCodeBunny',
					'href'  => 'admin.php?page=TheCodeBunny',
					'meta'  => array(
						'title' => __( 'TheCodeBunny','lucent' ),
					),
				)
			);
			$wp_admin_bar->add_menu(
				array(
					'id' => 'lucent-options',
					'parent' => 'the-code-bunny',
					'title' => 'Lucent Options',
					'href'  => 'admin.php?page=lucent_opts_options',
					'meta'  => array(
						'title' => __( 'Lucent Options','lucent' ),
					),
				)
			);
			$wp_admin_bar->add_menu(
				array(
					'id' => 'tcb-support',
					'parent' => 'the-code-bunny',
					'title' => 'TCB Support',
					'href'  => 'admin.php?page=tcb-support',
					'meta'  => array(
						'title' => __( 'TCB Support','lucent' ),
					),
				)
			);
			$wp_admin_bar->add_menu(
				array(
					'id' => 'tcb-status',
					'parent' => 'the-code-bunny',
					'title' => 'TCB System Status',
					'href'  => 'admin.php?page=tcb-status',
					'meta'  => array(
						'title' => __( 'TCB System Status','lucent' ),
					),
				)
			);

		}

				/**
		 *
		 * Function loads admin styles
		 *
		 * @package Lucent
		 */

		function tcb_admin_styles( $hook ) {

					wp_enqueue_style( 'tcb_admin_styles', LUCENT_ASSETS . 'css/admin-styles.css' );

			wp_enqueue_script( 'jquery-ui-accordion' );

			wp_enqueue_script( 'tcb_admin_scripts', LUCENT_ASSETS . 'js/admin-scripts.js' );

		}

		/**
		 *
		 * Function the_code_bunny
		 * Adds Theme/TheCodeBunny pages
		 */
		function the_code_bunny() {

					include_once( LUCENT_ADMIN_DIR . 'tcb.php' );
		}

		/**
		 *
		 * Function tcb_support
		 * Adds Theme/TheCodeBunny pages
		 */
		function tcb_support() {

					include_once( LUCENT_ADMIN_DIR . 'support.php' );

		}

		/**
		 *
		 * Function tcb_status
		 * Adds Theme/TheCodeBunny pages
		 */
		function tcb_status() {

					include_once( LUCENT_ADMIN_DIR . 'status.php' );

		}

		function tcb_lucent_options() {

				// Load the embedded Redux Framework
			if ( file_exists( LUCENT_ADMIN_DIR . '/redux-framework/framework.php' ) ) {
				require_once LUCENT_ADMIN_DIR . '/redux-framework/framework.php';
			}

				// Load the theme/plugin options
			if ( file_exists( LUCENT_ADMIN_DIR . '/options-init.php' ) ) {
				require_once LUCENT_ADMIN_DIR . '/options-init.php';
			}

						// Load Redux extensions
			if ( file_exists( LUCENT_ADMIN_DIR . '/redux-extensions/extensions-init.php' ) ) {
				require_once LUCENT_ADMIN_DIR . '/redux-extensions/extensions-init.php';
			}
		}

	}

}

 new Lucent_Admin();
