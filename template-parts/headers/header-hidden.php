<?php

/**
 *
 * Template part Hidden Header
 *
 * @package Lucent
 * @author TheCodeBunny
 * @link www.thecodebunny.com
 */

$lucent_global = lucent_global();

if ('slide' === $lucent_global['header_hidden']) {
if ('left' === $lucent_global['header_hidden_slide'] || 'right' === $lucent_global['header_hidden_slide']) {$headerclass = 'lucenthidden hidden-side lucent-slidebar';}
elseif ('top' === $lucent_global['header_hidden_slide']) {$headerclass = 'lucenthidden hidden-top lucent-slidebar';}
}

if ('full' === $lucent_global['header_hidden'] && 'overlay' === $lucent_global['lucent_hidden_fullfx']) {$headerclass = 'hidden-fullscreen';}
elseif ('full' === $lucent_global['header_hidden'] && 'slide' === $lucent_global['lucent_hidden_fullfx']) {$headerclass = 'hidden-fullslide lucent-slidebar';}


if ('slide' === $lucent_global['header_hidden']) : {
if ('left' === $lucent_global['header_hidden_slide'] || 'right' === $lucent_global['header_hidden_slide']) : {
    $datasize = 'data-size="' .$lucent_global['lucent_hiddenside_width']['width']. '"';
} else : {
    $datasize = 'data-size="' .$lucent_global['lucent_hidden_height']['height']. '"';
}
endif;
} else : { $datasize = 'data-size = "100%"'; }

endif;

if ('slide' === $lucent_global['header_hidden']) : {
    $dataposition = 'data-position="'. $lucent_global['header_hidden_slide'] .'"'; 
    $dataeffect = 'data-effect="'. $lucent_global['lucent_hidden_fx'] .'"';
} elseif ('full' === $lucent_global['header_hidden'] && 'slide' === $lucent_global['lucent_hidden_fullfx']) : {
    $dataposition = 'data-position="'. $lucent_global['header_hiddenfull_slide'] .'"'; 
    $dataeffect = 'data-effect="'. $lucent_global['lucent_hiddenfull_fx'] .'"';
} else : {
    $dataposition = ''; 
    $dataeffect = '';
}

endif;

?>
<header id="lucenthidden<?php echo $lucent_global['header_hidden']; ?>" class="<?php echo $headerclass; ?>" <?php echo ''.$dataposition.' '.$dataeffect.' '.$datasize.'';  ?>>
<?php if ('full' === $lucent_global['header_hidden']) { echo '<a class="overlay-close"><i class="icon-cross"></i></a>'; } ?>
<?php if ('full' === $lucent_global['header_hidden'] && 'slide' === $lucent_global['lucent_hidden_fullfx'] ) { echo '<div class="lucenthidden-brand">'; } ?>
    <div class="lucenthidden-logo">
        <?php do_action('Lucent_Logo'); ?>
    </div>
    
    <?php if ( 'full' === $lucent_global['header_hidden'] && 'slide' === $lucent_global['lucent_hidden_fullfx'] ) { ?>
    <div class="lucenthidden-fullscreen-socials">
        <ul>
        <?php do_action('Lucent_Socials'); ?>
    </ul>
    </div>
    <?php } 
    if ('full' === $lucent_global['header_hidden']  && 'slide' === $lucent_global['lucent_hidden_fullfx'] ) { echo '</div>';} ?>
    <div class="lucenthidden-navigation">
        <?php do_action('Lucent_Hidden_Nav'); ?>
    </div>
    <?php if ( 'full' === $lucent_global['header_hidden'] && 'overlay' === $lucent_global['lucent_hidden_fullfx'] ) { ?>
    <div class="lucenthidden-fullscreen-socials">
        <ul>
        <?php do_action('Lucent_Socials'); ?>
    </ul>
    </div>
    <?php } ?>
</header>