<?php
/**
 *
 * Class generates base archives functions.
 *
 * @package Lucent
 * @author TheCodeBunny
 **/

if ( ! class_exists( 'Lucent_Single' ) ) {

	/**
	 *
	 * Class Lucent_Single
	 * @category Class
	 * @package Lucent
	 * @author TheCodeBunny
	 */
	class Lucent_Single {

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

			add_action( 'Lucent_Post_Nav' , array( $this, 'lucent_single_nextprev' ) );

		}

		/**
		 *
		 * Function Single Post Navigation
		 *
		 * @var string $post global post declaration
		 */

		public function lucent_single_nextprev() {

			global $post, $product;

						$post_prev = get_adjacent_post( false, '', true );
			$post_next = get_adjacent_post( false, '', false );

						?>

			<div class="postNav">

				<div class="arrowLeft">
					<?php if ( $post_prev ) { ?>
						<div class="prevhidden">
							<a class="post-icon icon-point-left"></a>
							<a class="prev-post" href="<?php echo get_the_permalink( $post_prev->ID ); ?>">
							<span class="lucent-postnav-title"><?php echo get_the_title( $post_prev->ID ); ?></span>
								<?php echo get_the_post_thumbnail( $post_prev->ID ); ?>
							</a>
						</div>
					<?php } ?>
				</div>
				<div class="arrowRight">
					<?php if ( $post_next ) { ?>
						<div class="nexthidden">
							<a class="post-icon icon-point-right"></a>
							<a class="prev-post" href="<?php echo get_the_permalink( $post_next->ID ); ?>">
							<span class="lucent-postnav-title"><?php echo get_the_title( $post_next->ID ); ?></span>
							<?php echo get_the_post_thumbnail( $post_next->ID ); ?>
							</a>
						</div>
					<?php } ?>
				</div>

			</div>
			<?php

		}

		public function Lucent_Single_Images() {

		}

	}
}

new Lucent_Single();
