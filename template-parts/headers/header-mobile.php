<?php
/**
 *
 * Lucent Mobile Header
 *
 * @package Lucent
 * @author TheCodeBunny
 * @link www.thecodebunny.com
 */
 $lucent_global = lucent_global();
 $dataposition = 'data-position="'. $lucent_global['lucent_mobile_side'] .'"'; 
 $dataeffect = 'data-effect="'. $lucent_global['lucent_mobile_fx'] .'"';
 $datasize = 'data-size="' .$lucent_global['lucent_mobile_width']['width']. '"';
 ?>

 <header id="lucentmobile">
    
    <?php  if ( 'yes' === $lucent_global['lucent_mobile_topbar'] ) get_template_part( '/template-parts/headers/top-bar' ); ?>

    <?php do_action('Lucent_Logo'); ?>
    <div class="lucent-mobile-button  lucent-mobile-sticky">
        <a id="mobile-trigger-button"><i class="icon-menu"></i></a>
    </div>
    <div id="lucentmobileslide" class="lucent-slidebar" <?php echo ''.$dataposition.' '.$dataeffect.' '.$datasize.'';  ?>>
        <div id="lucent-mobile">
            <?php do_action('Lucent_Mobile_Nav'); ?>
        </div>
    </div>
</header>