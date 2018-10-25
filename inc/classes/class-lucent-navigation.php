<?php
/**
 *
 * CLASS TO BUILD NAVIGATION MENUS
 *
 * @package Lucent
 **/

if ( ! class_exists( 'Lucent_Navigation' ) ) {

	/**
	 *
	 * Class Lucent_Navigation generates menus
	 *
	 * @package Lucent
	 */
	class Lucent_Navigation {

		/**
		 *
		 * Function Construct
		 * @var mix $lucent_opts global variable.
		 */
		public function __construct() {

			global $lucent_opts;
			$this->lucent_options =& $lucent_opts;

				add_action( 'Lucent_Main_Nav_Top',array( $this, 'lucent_main_top_navigation' ) );

				add_action( 'Lucent_Main_Nav_Bottom',array( $this, 'lucent_main_bottom_navigation' ) );

				add_action( 'Lucent_Vertical_Nav',array( $this, 'lucent_main_side_navigation' ) );

				add_action( 'Lucent_Hidden_Nav',array( $this, 'lucent_hidden_navigation' ) );

				add_action( 'Lucent_Mobile_Nav',array( $this, 'lucent_mobile_navigation' ) );

		}

		/**
		 *
		 * Generates fixed top main navigation
		 */
		public function lucent_main_top_navigation() {

			wp_nav_menu(
				array(
					'theme_location' => 'main-nav',
					'container_class' => 'lucentnav',
					'menu_id'        => 'main-menu',
					'menu_class'	 => 'lucentnav lucentnav-clean',
					'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				)
			);

		}

		/**
		 *
		 * Function generates fixed bottom main navigation
		 */
		public function lucent_main_bottom_navigation() {

			wp_nav_menu(
				array(
					'theme_location' => 'main-nav',
					'menu_id'        => 'main-menu',
					'menu_class'     => 'lucentnav lucentnav-clean lucentnav-bottom',
					'items_wrap'     => '<input id="main-menu-state" type="checkbox" /><label class="main-menu-btn" for="main-menu-state"><span class="main-menu-btn-icon"></span>Toggle main menu visibility</label><ul id="%1$s" class="%2$s">%3$s</ul>',
				)
			);

		}

		/**
		 *
		 * Function generates main side navigation
		 */
		public function lucent_main_side_navigation() {

			wp_nav_menu(
				array(
					'theme_location' => 'main-nav',
					'menu_id'        => 'main-menu',
					'menu_class'     => 'LucentVertical',
					'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				)
			);

		}

		/**
		 *
		 * Function generates hidden navigation
		 *
		 * @param string $lucenthiddenstyle outputs main hidden nav class.
		 */
		public function lucent_hidden_navigation( $lucenthiddenstyle ) {

			if ( 'slide' === $this->lucent_options['header_hidden'] ) {
				$lucenthiddenstyle = $this->lucent_options['header_hidden_slide']; }

			echo '<nav id="LucentHidden-menu-' . $lucenthiddenstyle . '" class="LucentHidden-menu LucentHidden-menu-' . $lucenthiddenstyle . '">';

			if ( ('full' === $this->lucent_options['header_hidden']) || in_array( $this->lucent_options['header_hidden_slide'],array( 'left', 'right' ) ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'main-nav',
						'menu_id'        => 'main-menu',
						'menu_class'     => 'LucentVertical',
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					)
				);
			} elseif ( ('full' !== $this->lucent_options['header_hidden']) && in_array( $this->lucent_options['header_hidden_slide'],array( 'top', 'bottom' ) ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'main-nav',
						'container_class' => 'lucentnav',
						'menu_id'        => 'main-menu',
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					)
				);
			}
			echo '</nav>';

		}

		/**
		 *
		 * Function generates mobile navigation
		 *
		 */

		public function lucent_mobile_navigation() {

			echo '<nav id="lucentmobilenav">';

			if ( 'dropdown' === $this->lucent_options['lucent_mobile_style'] ) {

				wp_nav_menu(
					array(
						'theme_location' => 'main-nav',
						'menu_id'        => 'LucentVertical',
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					)
				);

			} else {

				wp_nav_menu(
					array(
						'theme_location' => 'main-nav',
						'container' => false,
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'walker'         => new Custom_Walker_Nav_Menu,
					)
				);

			}

			echo '</nav>';

		}

	}

}

 new Lucent_Navigation();

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		//$output .= "\n$indent<ul class=\"sub-menu\">\n";

		// Change sub-menu to dropdown menu
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		// Most of this code is copied from original Walker_Nav_Menu
		global $wp_query, $wpdb;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$has_children = $wpdb->get_var(
			$wpdb->prepare(
				"
       SELECT COUNT(*) FROM $wpdb->postmeta
       WHERE meta_key = %s
       AND meta_value = %d
       ", '_menu_item_menu_item_parent', $item->ID
			)
		);

		$output .= $indent . '<li' . $id . $value . $class_names . '>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
		$title = apply_filters( 'the_title', $item->title, $item->ID );

		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		// Add the caret if menu level is 0

		  $item_output .= $args->after;
		if ( $depth == 0 && $has_children > 0 ) {
			$item_output .= ' <h2> ' . $item->title . ' </h2>';
		}

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

}
