<?php

/**
 *
 * Template part Hidden Header Topbar
 *
 * @package Lucent
 * @author TheCodeBunny
 * @link www.thecodebunny.com
 */

$lucent_global = lucent_global();
?>
<?php if ( 'top-left' === $lucent_global['header_toggle_position'] || 'top-right' === $lucent_global['header_toggle_position'] ) : { ?>
    
    <div id="topbar-hidden" class="lucenthidden-topbar">

		<div class="topbar-left">
            <ul>
            <?php 
                if ('top-left' === $lucent_global['header_toggle_position']) {do_action('Lucent_Hidden_Toggle');} 
                else { do_action('Lucent_Socials'); ?>
                <li><?php do_action('Lucent_Cart'); ?></li>
                <?php }
            ?>
           
            </ul>
            
        </div>
        <div class="topbar-middle">
            <?php do_action('Lucent_Info'); ?>
        </div>
        <div class="topbar-right">
            <?php 
                if ('top-right' === $lucent_global['header_toggle_position']) {do_action('Lucent_Hidden_Toggle');} 
                else { do_action('Lucent_Socials'); ?>
                <li><?php do_action('Lucent_Cart'); ?></li>
                <?php } 
            ?>
        </div>

	</div>
    
<?php } else : { ?>
    
    <div id="lucent-slim" class="lucent-slim-<?php echo $lucent_global['header_toggle_position'] ?>">
        <div class="slim-logo">
            <?php do_action('Lucent_Logo'); ?>
        </div>
        <div class="slim-toggle">
            <?php do_action('Lucent_Hidden_Toggle'); ?>
        </div>
        <div class="slim-bottom">
            <ul>
            <?php do_action('Lucent_Socials'); ?>
            M/ul>
        </div>
    </div>

<?php } endif; ?>