(function($) {

    $.LucentSlide = function(element, options) {

        var defaults = {

            position: "",
            trigger: "",
            effect: "lucent-scalerotate",
            slidebarwidth: "25%",
            slidebarheight: "180px",
            container: "#LucentMain",
            mask: ".lucent-slide-mask",
            pusher: ".lucent-pusher",
            close: ".lucentslide-close",

        }

        var plugin = this;

        plugin.settings = {}

        var $element = $(element),
            element = element;
        trigger = options.trigger;
        container = defaults.container;
        effect = options.effect;
        position = options.position;
        width = options.slidebarwidth;
        height = options.slidebarheight;
        mask = defaults.mask;
        pusher = defaults.pusher;
        clicked = false;
        closer = options.close;

        plugin.init = function() {

            plugin.settings = $.extend({}, defaults, options);
            SlideSize();
            $(element).addClass(position);
            $(element).addClass('lucent-' + effect);
            $(element).addClass('lucentmain-' + position);
            return Slidebar;

        }
        
        var SlideSize = function() {
            datasize = $(element).attr('data-size');
            if ((position == 'left') || (position == 'right')) {
                $(element).css('width', width);
                $(element).css('height', '100%');
                $(element).css('overflow-y', 'auto');
            } else {
                $(element).css('width', '100%');
                $(element).css('height', datasize);
            }
            if (position == 'bottom') {
                $(element).css({ 'bottom': '0', 'top': 'auto', 'position': 'fixed' })
            }
        };

        var SlideClose = function() {
            elementid = $(element).attr("id");
            $(container).removeClass(elementid);
            $(container).removeClass('lucent-slidebar-open');
            $(container).removeClass('lucentmain');
            $(container).removeClass('lucent-' + elementeffect);
            $(container).removeClass('lucentmain-' + dataposition);
            $(pusher).removeClass("close-pusher");
            $(container).css({ 'perspective': '', 'background': '' });
            $(pusher).css('perspective', '');
            $(mask).css('display', '');
            //RemoveSlide();
            clicked = false;
        };

        var InitiateSlide = function() {
            elementeffect = $(element).attr('data-effect');
            dataposition = $(element).attr('data-position');
            datasize = $(element).attr('data-size');
            elementid = $(element).attr("id");
            $(container).css({'perspective': '1500px','background':'black'});
            $(pusher).css('perspective', '1000px');
            $(container).addClass('lucent-' + elementeffect);
            $(container).addClass('lucentmain-' + dataposition);
            $(container).addClass('lucentmain');
            $(container).addClass(elementid);
            $(container).addClass('lucent-slidebar-open');
            $(pusher).addClass('close-pusher');
            $(mask).css('display', 'block');
            clicked = true;
        };

        var HandleSlide = function() {
            if (!clicked) {
                InitiateSlide();
            } else {
                SlideClose();
            }
            console.log(clicked);
        };

        var RemoveSlide = function() {
            $(trigger).unbind('click', HandleSlide());
        }

        $(trigger).on('click', function(e) {
            e.preventDefault();
            HandleSlide();
        });

        var Slidebar = {

            reset: function(name) {
                console.log($body);
                $body.one(RemoveSlide());
                RemoveSlide();
            },
            InitiateSlide: function() { InitiateSlide(); },
            SlideClose: function() { SlideClose(); }

        }

        $(closer).on('click', function(e) {
            e.preventDefault();
            SlideClose();
        });
        $(mask).on('click', function() {
            SlideClose();
        });

        plugin.init();


    }

    $.fn.LucentSlide = function(options) {

        return this.each(function() {

            if (undefined == $(this).data('LucentSlide')) {

                var plugin = new $.LucentSlide(this, options);

                $(this).data('LucentSlide', plugin);

            }

        });

    }

})(jQuery);


/**
 * Fullscreen Overlay Effects
 */

(function($) {

    $.LucentOverlay = function(element, options) {

        var defaults = {
            targetelement: "",
            trigger: "#boxoverlay-trigger",
            boxNumbX: "10",
            boxSpeed: "200",
            boxDelay: "50",
            closer: ".overlay-close",
            overlayEffect: "boxflip",
            boxContainer: "#BoxContainer"
        }

        var plugin = this;

        plugin.settings = {}

        var $element = $(element);
        element = element;

        plugin.init = function() {

            plugin.settings = $.extend({}, defaults, options);
            lucent = plugin.settings;
            boxNumbX = lucent.boxNumbX;
            boxSpeed = lucent.boxSpeed;
            boxDelay = lucent.boxDelay;
            trigger = lucent.trigger;
            closer = lucent.closer;
            overlayEffect = lucent.overlayEffect;
            boxContainer = lucent.boxContainer;
            tcbParticles = new Array();

            LucentStartOverlay();
            LucentStopOverlay();

        }

        var startAnimation = function() {
            tcbParticles = new Array();
            boxBody = document.body;
            boxContainer = document.createElement("div");
            boxContainer.setAttribute("id", "lucentbox-overlay");
            document.body.insertBefore(boxContainer, document.body.childNodes[0]);
            boxContainer = document.getElementById("lucentbox-overlay");

            boxOverlayStart();
        }
        var showHiddenFade = function() {
            startAnimation();
            $(element).fadeIn(1600, "linear", function() {
                showHidden();
            });
        }
        var showHidden = function() {
            $(element).css({ 'visibility': 'visible', 'opacity': '1' })
            $(boxContainer).css({ 'position': 'fixed', 'width': '100%', 'height': '100%' });
        }
        var removeHiddenFade = function() {
            $(element).fadeIn(1600, "linear", function() {
                startAnimation();
                removeHidden();
            });
        }
        var removeHidden = function() {
            $(element).css({ 'visibility': 'hidden', 'opacity': '0' })
            $(boxContainer).css({ 'position': '', 'width': '', 'height': '' });
        }
        var boxOverlayStart = function() {
            boxTotalWidth = boxContainer.offsetWidth;
            boxTotalHeight = boxContainer.offsetHeight;
            boxWidth = Math.round(boxTotalWidth / boxNumbX + 0.5);
            boxNumbY = Math.round(boxTotalHeight / boxWidth + 0.5);
            var Particle, i, j;
            boxSum = boxNumbX * boxNumbY;
            boxTotalWidth = boxWidth;
            boxNumbXPos = 0, boxNumbYPos = 0;
            for (i = 0; i < boxNumbY; i++) {
                for (j = 0; j < boxNumbX; j++) {
                    Particle = document.createElement("div");
                    Particle.className = "overlay-particle";
                    Particle.style.position = "fixed";
                    Particle.style.width = boxWidth + "px";
                    Particle.style.height = boxWidth + "px";
                    Particle.style.left = j * boxWidth + "px";
                    Particle.style.top = i * boxWidth + "px";
                    Particle.style.transition = "all " + (boxSpeed / 1000) + "s";
                    tcbParticles.push(Particle);
                }
            }

            tcbParticles.arrayRandomizer();
            for (i = 0; i < boxSum; i++) {
                boxContainer.appendChild(tcbParticles[i]);
            }

            boxContainer.style.backgroundColor = "transparent";

            linearCSSAnimation();
        }

        var linearCSSAnimation = function() {
            switch (overlayEffect) {
                case "boxflip":
                    tcbParticles[--boxSum].style.transform = "perspective(" + boxTotalWidth * 2 + "px) rotateX(90deg)";
                    tcbParticles[boxSum].style.opacity = "0.5";
                    break;
                case "boxslide":
                    tcbParticles[--boxSum].style.transform = "translateX(" + boxTotalWidth * 2 + "px)";
                    tcbParticles[boxSum].style.opacity = "0";
                    break;
                case "boxscaleup":
                    tcbParticles[--boxSum].style.transform = "scale(2)";
                    tcbParticles[boxSum].style.opacity = "0";
                    break;
                case "boxscaledown":
                    tcbParticles[--boxSum].style.transform = "scale(0.5)";
                    tcbParticles[boxSum].style.opacity = "0";
                    break;
            }

            if (boxSum !== 0) {
                setTimeout(function() {
                    linearCSSAnimation();
                }, boxDelay);
            } else {
                setTimeout(function() {
                    boxBody.removeChild(boxContainer);
                }, boxSpeed);
                return false;
            }
        }

        Array.prototype.arrayRandomizer = function() {
            var len = this.length,
                x, temp;
            if (len === 0) return false;
            while (--len) {
                x = Math.floor(Math.random() * len);
                temp = this[len];
                this[len] = this[x];
                this[x] = temp;
            }
        };

        var LucentStartOverlay = function() {
            $(trigger).on('click', function() {
                showHiddenFade();
            });
        }
        var LucentStopOverlay = function() {
            $(closer).on('click', function() {
                removeHiddenFade();
            });
        }
        plugin.init();

    }



    $.fn.LucentOverlay = function(options) {

        return this.each(function() {

            if (undefined == $(this).data('LucentOverlay')) {

                var plugin = new $.LucentOverlay(this, options);

                $(this).data('LucentOverlay', plugin);
            }

        });

    }

})(jQuery);

/** Scroll to top */

!(function ($) {

    'use strict';

    function lucenttotop_animation($obj, type, animation) {
        if (type === 'show') {
            switch (animation) {
                case 'fade':
                    $obj.fadeIn();
                    break;

                case 'slide':
                    $obj.slideDown();
                    break;

                default:
                    $obj.fadeIn();
            }
        } else {
            switch (animation) {
                case 'fade':
                    $obj.fadeOut();
                    break;

                case 'slide':
                    $obj.slideUp();
                    break;

                default:
                    $obj.fadeOut();
            }
        }
    }

    function lucentclick_totop_trigger($obj, speed) {
        var not_clicked = true;
        $obj.on('click', function () {
            if (not_clicked === true) {
                not_clicked = false;
                $('html, body').animate({ scrollTop: 0 }, speed, function () {
                    not_clicked = true;
                });
            }
        });
    }


    $.lucenttotop = function (user_params) {

        var params = $.extend({
            location: 'right',
            locationOffset: 20,
            bottomOffset: 10,
            containerSize: 40,
            containerRadius: 10,
            containerClass: 'totop-container',
            arrowClass: 'totop-arrow',
            alwaysVisible: false,
            trigger: 300,
            entryAnimation: 'fade',
            totopSpeed: 'slow',
            hideUnderWidth: 0,
            containerColor: '#000',
            arrowColor: '#fff',
            title: '',
            titleAsText: false,
            titleAsTextClass: 'totop-text',
            zIndex: 13
        }, user_params);
        /* */

        /* Parameters check */
        if (params.location !== 'right' && params.location !== 'left') {
            params.location = 'right';
        }

        if (params.locationOffset < 0) {
            params.locationOffset = 0;
        }

        if (params.bottomOffset < 0) {
            params.bottomOffset = 0;
        }

        if (params.containerSize < 20) {
            params.containerSize = 20;
        }

        if (params.containerRadius < 0) {
            params.containerRadius = 0;
        }

        if (params.trigger < 0) {
            params.trigger = 0;
        }

        if (params.hideUnderWidth < 0) {
            params.hideUnderWidth = 0;
        }

        var checkColor = /(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i;
        if (!checkColor.test(params.containerColor)) {
            params.containerColor = '#000';
        }
        if (!checkColor.test(params.arrowColor)) {
            params.arrowColor = '#fff';
        }

        if (params.title === '') {
            params.titleAsText = false;
        }

        if (isNaN(params.zIndex)) {
            params.zIndex = 1;
        }
        /* */

        /* Create required elements */
        var $body = $('#LucentMain');
        var $window = $(window);

        var $container = $('<div>');
        $container.addClass(params.containerClass);
        var $arrow = $('<div>');
        $arrow.addClass(params.arrowClass);

        $container.html($arrow);

        $body.append($container);


        /* Container Style */
        var containerStyle = {
            position: 'fixed',
            width: params.containerSize,
            height: params.containerSize,
            background: params.containerColor,
            cursor: 'pointer',
            display: 'none',
            'z-index': params.zIndex
        };
        containerStyle['bottom'] = params.bottomOffset;
        containerStyle[params.location] = params.locationOffset;
        containerStyle['border-radius'] = params.containerRadius;

        $container.css(containerStyle);

        if (!params.titleAsText) {
            $container.attr('title', params.title);
        } else {
            var $textContainer = $('<div>');
            $body.append($textContainer);
            $textContainer.addClass(params.titleAsTextClass).text(params.title);
            $textContainer.attr('style', $container.attr('style'));
            $textContainer.css('background', 'transparent')
                .css('width', params.containerSize + 40)
                .css('height', 'auto')
                .css('text-align', 'center')
                .css(params.location, params.locationOffset - 20);
            var textContainerHeight = parseInt($textContainer.height()) + 10;
            var containerBottom = parseInt($container.css('bottom'));
            var containerNewBottom = textContainerHeight + containerBottom;
            $container.css('bottom', containerNewBottom);
        }


        /* Arrow Style */
        var borderSize = 0.25 * params.containerSize;
        var arrowStyle = {
            width: 0,
            height: 0,
            margin: '0 auto',
            'padding-top': Math.ceil(0.325 * params.containerSize),
            'border-style': 'solid',
            'border-width': '0 ' + borderSize + 'px ' + borderSize + 'px ' + borderSize + 'px',
            'border-color': 'transparent transparent ' + params.arrowColor + ' transparent'
        };
        $arrow.css(arrowStyle);
        /* */


        /* params.trigger Hide under a certain width */
        var isHidden = false;
        $window.resize(function () {
            if ($window.outerWidth() <= params.hideUnderWidth) {
                isHidden = true;
                lucenttotop_animation($container, 'hide', params.entryAnimation);
                if (typeof ($textContainer) !== 'undefined') {
                    lucenttotop_animation($textContainer, 'hide', params.entryAnimation);
                }
            } else {
                isHidden = false;
                $window.trigger('scroll');
            }
        });
        /* If i load the page under a certain width, i don't have the event 'resize' */
        if ($window.outerWidth() <= params.hideUnderWidth) {
            isHidden = true;
            $container.hide();
            if (typeof ($textContainer) !== 'undefined')
                $textContainer.hide();
        }


        /* params.trigger show event */
        if (!params.alwaysVisible) {
            $window.scroll(function () {
                if ($window.scrollTop() >= params.trigger && !isHidden) {
                    lucenttotop_animation($container, 'show', params.entryAnimation);
                    if (typeof ($textContainer) !== 'undefined') {
                        lucenttotop_animation($textContainer, 'show', params.entryAnimation);
                    }
                }

                if ($window.scrollTop() < params.trigger && !isHidden) {
                    lucenttotop_animation($container, 'hide', params.entryAnimation);
                    if (typeof ($textContainer) !== 'undefined') {
                        lucenttotop_animation($textContainer, 'hide', params.entryAnimation);
                    }
                }
            });
        } else {
            lucenttotop_animation($container, 'show', params.entryAnimation);
            if (typeof ($textContainer) !== 'undefined') {
                lucenttotop_animation($textContainer, 'show', params.entryAnimation);
            }
        }
        /* If i load the page and the scroll is over the trigger, i don't have immediately the event 'scroll' */
        if ($window.scrollTop() >= params.trigger && !isHidden) {
            lucenttotop_animation($container, 'show', params.entryAnimation);
            if (typeof ($textContainer) !== 'undefined') {
                lucenttotop_animation($textContainer, 'show', params.entryAnimation);
            }
        }

        lucentclick_totop_trigger($container, params.totopSpeed);
        if (typeof ($textContainer) !== 'undefined') {
            lucentclick_totop_trigger($textContainer, params.totopSpeed);
        }
    };
}(jQuery));

/*** Social Sharing powered by JSSocial ***/
(function ($) {
    'use strict';

    $.fn.LucentSocial = function () {
        /**
         * Supported social sites
         * @type {Object}
         */
        var _sites = {
            pinterest: {
                url: 'http://pinterest.com/pin/create/button/?url={{url}}&media={{media}}&description={{description}}',
                popup: {
                    width: 685,
                    height: 500
                }
            },
            facebook: {
                url: 'https://www.facebook.com/sharer/sharer.php?s=100&p[title]={{title}}&p[summary]={{description}}&p[url]={{url}}&p[images][0]={{media}}',
                popup: {
                    width: 626,
                    height: 436
                }
            },
            twitter: {
                url: 'https://twitter.com/share?url={{url}}&via={{via}}&text={{description}}',
                popup: {
                    width: 685,
                    height: 500
                }
            },
            googleplus: {
                url: 'https://plus.google.com/share?url={{url}}',
                popup: {
                    width: 600,
                    height: 600
                }
            },
            linkedin: {
                url: 'https://www.linkedin.com/shareArticle?mini=true&url={{url}}&title={{title}}&summary={{description}}+&source={{via}}',
                popup: {
                    width: 600,
                    height: 600
                }
            }
        },

            /**
             * Pop-up window
             * This method is only used on desktop browsers
             * @param  {Object} site Selected social site
             * @param  {String} url  Fixed URL to open
             */
            _popup = function (site, url) {
                // center window
                var left = (window.innerWidth / 2) - (site.popup.width / 2),
                    top = (window.innerHeight / 2) - (site.popup.height / 2);

                return window.open(url, '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + site.popup.width + ', height=' + site.popup.height + ', top=' + top + ', left=' + left);
            },

            /**
             * Prepare link based on social sites
             * @param  {Object} site Selected social site
             * @param  {Object} link Link with variables
             * @return {String}      Polished link based on the social site template
             */
            _linkFix = function (site, link) {
                // replace template url
                var url = site.url.replace(/{{url}}/g, encodeURIComponent(link.url))
                    .replace(/{{title}}/g, encodeURIComponent(link.title))
                    .replace(/{{description}}/g, encodeURIComponent(link.description))
                    .replace(/{{media}}/g, encodeURIComponent(link.media))
                    .replace(/{{via}}/g, encodeURIComponent(link.via));

                return url;
            };

        return this.each(function () {

            // declare $(this) as variable
            var $this = $(this);

            // link type
            var type = $this.data('type'),

                // set site
                site = _sites[type] || null;

            // check if social site is selected
            if (!site) {
                $.error('Social site is not set.');
            }

            // gather link info
            var link = {
                url: $this.data('url') || '',
                title: $this.data('title') || '',
                description: $this.data('description') || '',
                media: $this.data('media') || '',
                via: $this.data('via') || ''
            };

            // prepare link
            var url = _linkFix(site, link);

            // if not, set click trigger
            if (navigator.userAgent.match(/Android|IEMobile|BlackBerry|iPhone|iPad|iPod|Opera Mini/i)) {
                $this
                    .bind('touchstart', function (e) {
                        if (e.originalEvent.touches.length > 1) {
                            return;
                        }

                        $this.data('touchWithoutScroll', true);
                    })
                    .bind('touchmove', function () {
                        $this.data('touchWithoutScroll', false);

                        return;
                    }).bind('touchend', function (e) {
                        e.preventDefault();

                        var touchWithoutScroll = $this.data('touchWithoutScroll');

                        if (e.originalEvent.touches.length > 1 || !touchWithoutScroll) {
                            return;
                        }

                        // call popup window
                        _popup(site, url);
                    });
            } else {
                $this.on('click', $this, function (e) {
                    e.preventDefault();
                    // call popup window
                    _popup(site, url);
                });
            }
        });
    };

})(jQuery);

jQuery(document).ready(function () {
    'use-strict';
    jQuery('.social-share').LucentSocial();
});
