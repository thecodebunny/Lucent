<?php

/**
 * 
 * Load CSS required for Sliding elements
 * 
 * @package Lucent
 * @author TheCodeBunny
 * @link www.thecodebunny.com 
 **/



$lucent_global = lucent_global();

if ( 'slideout' === $lucent_global['lucent_fancy_cart'] ) { ?>

    .lucentslideoutcart {
        width: <?php echo $lucent_global['lucent_slidecart_width']['width']; ?>;
    }
    
    <?php

    if ( 'left' === $lucent_global['lucent_fancycart_slide'] ) {

        if (in_array($lucent_global['lucent_slidecart_fx'], array('reveal','push','slidealong','reverseslide','3drotatein','3drotateout','scaleup','slidedown','3ddelay'))) { ?>
            
            .lucentslideoutcart.lucentmain-left.lucent-<?php echo $lucent_global['lucent_slidecart_fx']; ?>.lucent-slidebar-open .lucent-pusher {
                -webkit-transform: translate3d(<?php echo $lucent_global['lucent_slidecart_width']['width']; ?>, 0, 0);
                transform: translate3d(<?php echo $lucent_global['lucent_slidecart_width']['width']; ?>, 0, 0);
            }

             @media (max-width: 414px) {
                .lucentslideoutcart.lucentmain-left.lucent-<?php echo $lucent_global['lucent_slidecart_fx']; ?>.lucent-slidebar-open .lucent-pusher {
                    -webkit-transform: translate3d(75%, 0, 0);
                    transform: translate3d(75%, 0, 0);
                }
            }

        <?php } elseif ( 'rotatecontent' === $lucent_global['lucent_slidecart_fx']) { ?>

            .lucentslideoutcart.lucentmain-left.lucent-<?php echo $lucent_global['lucent_slidecart_fx']; ?>.lucent-slidebar-open .lucent-pusher {
                -webkit-transform: translate3d(<?php echo $lucent_global['lucent_slidecart_width']['width']; ?>, 0, 0) rotateY(-15deg);
                transform: translate3d(<?php echo $lucent_global['lucent_slidecart_width']['width']; ?>, 0, 0) rotateY(-15deg);
                pointer-events: none; 
            }

             @media (max-width: 414px) {
                .lucentslideoutcart.lucentmain-left.lucent-<?php echo $lucent_global['lucent_slidecart_fx']; ?>.lucent-slidebar-open .lucent-pusher {
                    -webkit-transform: translate3d(75%, 0, 0) rotateY(-15deg);
                    transform: translate3d(75%, 0, 0) rotateY(-15deg);
                }
            }

        <?php }
        
    } elseif ( 'right' === $lucent_global['lucent_fancycart_slide'] ) {

        if (in_array($lucent_global['lucent_slidecart_fx'], array('reveal','push','slidealong','reverseslide','3drotatein','3drotateout','scaleup','slidedown','3ddelay'))) { ?>
            
            .lucentslideoutcart.lucentmain-right.lucent-<?php echo $lucent_global['lucent_slidecart_fx']; ?>.lucent-slidebar-open .lucent-pusher {
                -webkit-transform: translate3d(-<?php echo $lucent_global['lucent_slidecart_width']['width']; ?>, 0, 0);
                transform: translate3d(-<?php echo $lucent_global['lucent_slidecart_width']['width']; ?>, 0, 0);
            }
            
             @media (max-width: 414px) {
                .lucentslideoutcart.lucentmain-right.lucent-<?php echo $lucent_global['lucent_slidecart_fx']; ?>.lucent-slidebar-open .lucent-pusher {
                    -webkit-transform: translate3d(-75%, 0, 0);
                    transform: translate3d(-75%, 0, 0);
                }
            }

        <?php } elseif ( 'rotatecontent' === $lucent_global['lucent_slidecart_fx']) { ?>

            .lucentslideoutcart.lucentmain-right.lucent-<?php echo $lucent_global['lucent_slidecart_fx']; ?>.lucent-slidebar-open .lucent-pusher {
                -webkit-transform: translate3d(-<?php echo $lucent_global['lucent_slidecart_width']['width']; ?>, 0, 0) rotateY(-15deg);
                transform: translate3d(-<?php echo $lucent_global['lucent_slidecart_width']['width']; ?>, 0, 0) rotateY(-15deg);
                pointer-events: none;
            }

             @media (max-width: 414px) {
                .lucentslideoutcart.lucentmain-right.lucent-<?php echo $lucent_global['lucent_slidecart_fx']; ?>.lucent-slidebar-open .lucent-pusher {
                    -webkit-transform: translate3d(-75%, 0, 0) rotateY(-15deg);
                    transform: translate3d(-75%, 0, 0) rotateY(-15deg);
                }
            }

        <?php }
        
    }
    
} if ( 'slide' === $lucent_global['header_hidden'] ) { ?>

    #lucenthiddenslide {
        width: <?php echo $lucent_global['lucent_hiddenside_width']['width']; ?>;
    }
    
    <?php
    if ( 'left' === $lucent_global['header_hidden_slide'] ) {


        if (in_array($lucent_global['lucent_hidden_fx'], array('reveal','push','slidealong','reverseslide','3drotatein','3drotateout','scaleup','slidedown','3ddelay'))) { ?>
            
            .lucenthiddenslide.lucentmain-left.lucent-<?php echo $lucent_global['lucent_hidden_fx']; ?>.lucent-slidebar-open .lucent-pusher {
                -webkit-transform: translate3d(<?php echo $lucent_global['lucent_hiddenside_width']['width']; ?>, 0, 0);
                transform: translate3d(<?php echo $lucent_global['lucent_hiddenside_width']['width']; ?>, 0, 0);
            }

        <?php } elseif ( 'rotatecontent' === $lucent_global['lucent_hidden_fx']) { ?>

            .lucenthiddenslidelucentmain-left.lucent-<?php echo $lucent_global['lucent_hidden_fx']; ?>.lucent-slidebar-open .lucent-pusher {
                -webkit-transform: translate3d(<?php echo $lucent_global['lucent_hiddenside_width']['width']; ?>, 0, 0) rotateY(-15deg);
                transform: translate3d(<?php echo $lucent_global['lucent_hiddenside_width']['width']; ?>, 0, 0) rotateY(-15deg);
                pointer-events: none;
            }



        <?php }
        
    }  elseif ( 'right' === $lucent_global['header_hidden_slide'] ) {

        if (in_array($lucent_global['lucent_hidden_fx'], array('reveal','push','slidealong','reverseslide','3drotatein','3drotateout','scaleup','slidedown','3ddelay'))) { ?>
            
            .lucenthiddenslide.lucentmain-right.lucent-<?php echo $lucent_global['lucent_hidden_fx']; ?>.lucent-slidebar-open .lucent-pusher {
                -webkit-transform: translate3d(-<?php echo $lucent_global['lucent_hiddenside_width']['width']; ?>, 0, 0);
                transform: translate3d(-<?php echo $lucent_global['lucent_hiddenside_width']['width']; ?>, 0, 0);
            }

        <?php } elseif ( 'rotatecontent' === $lucent_global['lucent_hidden_fx']) { ?>

            .lucenthiddenslide.lucentmain-right.lucent-<?php echo $lucent_global['lucent_hidden_fx']; ?>.lucent-slidebar-open .lucent-pusher {
                -webkit-transform: translate3d(-<?php echo $lucent_global['lucent_hiddenside_width']['width']; ?>, 0, 0) rotateY(-15deg);
                transform: translate3d(-<?php echo $lucent_global['lucent_hiddenside_width']['width']; ?>, 0, 0) rotateY(-15deg);
                pointer-events: none;
            }

        <?php } ?>
        
    <?php } elseif ( 'top' === $lucent_global['header_hidden_slide'] ) {

        if (in_array($lucent_global['lucent_hidden_fx'], array('reveal','push','slidealong','reverseslide','3drotatein','3drotateout','scaleup','slidedown','3ddelay'))) { ?>

            .lucenthiddenslide.lucentmain-top.lucent-<?php echo $lucent_global['lucent_hidden_fx']; ?>.lucent-slidebar-open .lucent-pusher {
                -webkit-transform: translate3d(0, <?php echo $lucent_global['lucent_hidden_height']['height']; ?>, 0);
                transform: translate3d(0, <?php echo $lucent_global['lucent_hidden_height']['height']; ?>, 0);
            }

        <?php } elseif ( 'rotatecontent' === $lucent_global['lucent_hidden_fx']) { ?>

            .lucenthiddenslide.lucentmain-top.lucent-<?php echo $lucent_global['lucent_hidden_fx']; ?>.lucent-slidebar-open .lucent-pusher {
                -webkit-transform: translate3d(-<?php echo $lucent_global['lucent_hiddenside_width']['width']; ?>, 0, 0) rotateY(-15deg);
                transform: translate3d(-<?php echo $lucent_global['lucent_hiddenside_width']['width']; ?>, 0, 0) rotateY(-15deg);
                pointer-events: none;
            }

        <?php }
        
    }
    
} if ('hidden' === $lucent_global['header_position']) { 

    if ( 'slide' === $lucent_global['lucent_hidden_fullfx'] ) {

        if ( 'left' === $lucent_global['header_hiddenfull_slide'] ) {


            if (in_array($lucent_global['lucent_hiddenfull_fx'], array('reveal','push','slidealong','reverseslide','3drotatein','3drotateout','scaleup','slidedown','3ddelay'))) { ?>
                
                .lucenthiddenfull.lucentmain-left.lucent-<?php echo $lucent_global['lucent_hiddenfull_fx']; ?>.lucent-slidebar-open .lucent-pusher {
                    -webkit-transform: translate3d(100%, 0, 0);
                    transform: translate3d(100%, 0, 0);
                }

            <?php } elseif ( 'rotatecontent' === $lucent_global['lucent_hiddenfull_fx']) { ?>

                .lucenthiddenfull.lucentmain-left.lucent-<?php echo $lucent_global['lucent_hiddenfull_fx']; ?>.lucent-slidebar-open .lucent-pusher {
                    -webkit-transform: translate3d(100%, 0, 0) rotateY(-15deg);
                    transform: translate3d(100%, 0, 0) rotateY(-15deg);
                    pointer-events: none;
                }



            <?php }
            
        }  elseif ( 'right' === $lucent_global['header_hiddenfull_slide'] ) {

            if (in_array($lucent_global['lucent_hiddenfull_fx'], array('reveal','push','slidealong','reverseslide','3drotatein','3drotateout','scaleup','slidedown','3ddelay'))) { ?>
                
                .lucenthiddenfull.lucentmain-right.lucent-<?php echo $lucent_global['lucent_hiddenfull_fx']; ?>.lucent-slidebar-open .lucent-pusher {
                    -webkit-transform: translate3d(-100%, 0, 0);
                    transform: translate3d(-100%, 0, 0);
                }

            <?php } elseif ( 'rotatecontent' === $lucent_global['lucent_hiddenfull_fx']) { ?>

                .lucenthiddenfull.lucentmain-right.lucent-<?php echo $lucent_global['lucent_hiddenfull_fx']; ?>.lucent-slidebar-open .lucent-pusher {
                    -webkit-transform: translate3d(-100%, 0, 0) rotateY(-15deg);
                    transform: translate3d(-100%, 0, 0) rotateY(-15deg);
                    pointer-events: none;
                }

            <?php } ?>
            
        <?php }
        
    }

} if ( 'left' === $lucent_global['lucent_mobile_side'] ) {

        if (in_array($lucent_global['lucent_mobile_fx'], array('reveal','push','slidealong','reverseslide','3drotatein','3drotateout','scaleup','slidedown','3ddelay'))) { ?>
            
            .lucentmobileslide.lucentmain-left.lucent-<?php echo $lucent_global['lucent_mobile_fx']; ?>.lucent-slidebar-open .lucent-pusher {
                -webkit-transform: translate3d(<?php echo $lucent_global['lucent_mobile_width']['width']; ?>, 0, 0);
                transform: translate3d(<?php echo $lucent_global['lucent_mobile_width']['width']; ?>, 0, 0);
            }

        <?php } elseif ( 'rotatecontent' === $lucent_global['lucent_mobile_fx']) { ?>

            .lucentmobileslide.lucentmain-left.lucent-<?php echo $lucent_global['lucent_mobile_fx']; ?>.lucent-slidebar-open .lucent-pusher {
                -webkit-transform: translate3d(<?php echo $lucent_global['lucent_mobile_width']['width']; ?>, 0, 0) rotateY(-15deg);
                transform: translate3d(<?php echo $lucent_global['lucent_mobile_width']['width']; ?>, 0, 0) rotateY(-15deg);
                pointer-events: none; 
            }

        <?php }
        
    } elseif ( 'right' === $lucent_global['lucent_mobile_side'] ) {

        if (in_array($lucent_global['lucent_mobile_fx'], array('reveal','push','slidealong','reverseslide','3drotatein','3drotateout','scaleup','slidedown','3ddelay'))) { ?>
            
            .lucentmobileslide.lucentmain-right.lucent-<?php echo $lucent_global['lucent_mobile_fx']; ?>.lucent-slidebar-open .lucent-pusher {
                -webkit-transform: translate3d(-<?php echo $lucent_global['lucent_mobile_width']['width']; ?>, 0, 0);
                transform: translate3d(-<?php echo $lucent_global['lucent_mobile_width']['width']; ?>, 0, 0);
            }

        <?php } elseif ( 'rotatecontent' === $lucent_global['lucent_mobile_fx']) { ?>

            .lucentmobileslide.lucentmain-right.lucent-<?php echo $lucent_global['lucent_slidecart_fx']; ?>.lucent-slidebar-open .lucent-pusher {
                -webkit-transform: translate3d(-<?php echo $lucent_global['lucent_mobile_width']['width']; ?>, 0, 0) rotateY(-15deg);
                transform: translate3d(-<?php echo $lucent_global['lucent_mobile_width']['width']; ?>, 0, 0) rotateY(-15deg);
                pointer-events: none;
            }

        <?php }
        
    } ?>

