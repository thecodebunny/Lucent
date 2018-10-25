<?php
/**
 * Product loop sale flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/sale-flash.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;
$price ='';
?>
<?php if ($product->is_on_sale() && $product->get_type() == 'variable') : ?>


              	<?php
			$available_variations = $product->get_available_variations();
			$maximumper = 0;
			for ($i = 0; $i < count($available_variations); ++$i) {
				$variation_id=$available_variations[$i]['variation_id'];
				$variable_product1= new WC_Product_Variation( $variation_id );
				$regular_price = $variable_product1 ->get_regular_price();
				$sales_price = $variable_product1 ->get_sale_price();
				$percentage= round((( ( $regular_price - $sales_price ) / $regular_price ) * 100),1) ;
					if ($percentage > $maximumper) {
						$maximumper = $percentage;
					}
				}
		$R=floor((255*$maximumper)/100);
        $G=floor((125*(100-$maximumper))/100);
        $bg_style = 'background:none;background-color: rgb(' . $R . ',' . $G . ',0);';
				echo '<div class="sale-flash" style="'. $bg_style .'">
	           <div class="inside">
	             <div class="inside-text">';
				echo '-' .  $price . sprintf( __('%s', 'lucent' ), $maximumper . '% '  ); ?></div>
            </div>
     </div><!-- end callout -->

<?php elseif($product->is_on_sale() && $product->get_type() == 'simple') : ?>

	             <?php

				$percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
		$R=floor((11*$percentage)/100);
        $G=floor((125*(100-$percentage))/100);
        $B=floor((163*(100-$percentage))/100);
        $bg_style = 'background:none;background-color: rgb(' . $R . ',' . $G . ',' . $B . ');';


		echo '<div class="sale-flash" style="'. $bg_style .'">
	           <div class="inside">
	             <div class="inside-text">';

				echo '-' . $price . sprintf( __('%s', 'lucent' ), $percentage . '% ' ); ?></div>
	           </div>
	    </div><!-- end sale-flash -->

<?php endif; ?>
