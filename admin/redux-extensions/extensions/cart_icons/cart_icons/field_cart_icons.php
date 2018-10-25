<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'ReduxFramework_cart_icons' ) ) {
    class ReduxFramework_cart_icons {

        private $icons = array(
            'avd-basket',
			'avd-basket2',
			'avd-cart2',
			'avd-bag',
			'avd-shopping-cart2',
			'avd-add_shopping_cart',
			'avd-shopping_cart',
			'avd-shopping_basket',
			'avd-bag2',
			'avd-shopping-bag2',
			'avd-shopping-basket2',
			'avd-shopping-cart3',
			'avd-shopping-cart',
			'avd-cart-plus',
			'avd-cart-arrow-down',
			'avd-shopping-bag',
			'avd-shopping-basket',
			'avd-cart3',
			'avd-basket3',
			'avd-cart',
	);

	/**
	 * Constructor
	 */
	function __construct( $field = array(), $value ='', $parent ){
        $this->parent = $parent;
		$this->field = $field;
		$this->value = $value;

	}

	/**
	 * Render
	 */
	function render( $meta = false ){

		$value = esc_attr( $this->value );

		// class ----------------------------------------------------
		if( isset( $this->field['class']) ){
			$class = $this->field['class'];
		} else {
			$class = 'regular-text';
		}

		// name -----------------------------------------------------
		if( $meta == 'new' ){

			// builder new
			$name = 'data-name="'. $this->field['id'] .'"';

		} elseif( $meta ){

			// page mata & builder existing items
			$name = 'name="'. $this->field['id'] .'"';

		} else {

			// theme options
			$name = 'name="'. $this->parent->args['opt_name'] .'['. $this->field['id'] .']"';

		}

		// echo -----------------------------------------------------
		echo '<div class="icon-field">';

			    echo '<div class="icon-preview '. $value .'" ></div>';

				echo '<input type="hidden" '. $name .' value="'. $value .'" class="icon-input '.$class.'"/>';

				if( isset($this->field['desc']) && !empty($this->field['desc']) ){
					echo ' <span class="description '.$class.'">'.$this->field['desc'].'</span>';
				}

			echo '<div class="icons-display">';

				foreach( $this->icons as $icon ){
					$iclass = ( $value == $icon ) ? ' active' : '';
					echo '<span class="display-icon'. $iclass .'" data-rel="'. $icon .'"><i class="'. $icon .'"></i></span>';
				}

			echo '</div>';

		echo '</div>';
	}

	public function enqueue() {

            wp_enqueue_script(
                'lucent-cart-icon-picker-js',
                LUCENT_REDUX_EXTENSIONS . '/js/icon-select.js',
                array( 'jquery' ),
                time(),
                true
            );

            wp_enqueue_style(
                'lucent-avd-icon-picker-css',
                LUCENT_REDUX_EXTENSIONS. '/css/icon-select.css',
                time(),
                true
            );

        }
}
}
