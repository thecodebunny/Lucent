;
(function ($, window, document, undefined) {
    $.fn.LucentSlide = function (options) {
        console.log(this);
        return this.each(function () {

            var settings = $.extend({
                position: "",
                trigger: "a.lucentslide-trigger",
                effect: "lucent-scalerotate",
                slidebarwidth: "25%",
                slidebarheight: "180px",
                container: "#LucentMain",
                pusher: ".lucent-pusher",
                close: ".lucentslide-close",
            }, options);

            var lucentslide = settings;
            self = $(this);
            trigger = lucentslide.trigger;
            container = lucentslide.container;
            effect = lucentslide.effect;
            position = lucentslide.position;
            width = lucentslide.slidebarwidth;
            height = lucentslide.slidebarheight;
            pusher = lucentslide.pusher;
            clicked = false;
            console.log(trigger);
            closer = lucentslide.close;

            self.addClass(position);
            self.addClass('lucent-' + effect);

            var SlideSize = function () {
                if ((position == 'left') || (position == 'right')) {
                    self.css('width', width);
                    self.css('height', '100%');
                    self.css('overflow-y', 'auto');
                } else {
                    self.css('width', '100%');
                    self.css('height', height);
                }
            }

            var PrepareSlide = function (HandleSlide) {
                SlideSize();

                if ((position == 'left') || (position == 'right')) {
                    $(container).addClass('lucentmain-' + position);

                    $(container).addClass('lucentmain');
                    $(container).addClass('lucent-slidebar-open');
                    self.addClass('lucentmain-' + position);
                    self.css('visibility', 'visible');
                };

                $(container).addClass('lucent-' + effect);
                clicked = true;
            };

            var SlideClose = function () {
                console.log(container);
                $(container).removeClass('lucent-slidebar-open');
                $(container).removeClass('lucentmain');
                clicked = false;
            };

            var InitiateSlide = function () {
                PrepareSlide();

                console.log(container);
            };

            var HandleSlide = function () {
                InitiateSlide();
                console.log(clicked);
            };

            var RemoveSlide = function () {
                $(trigger).off('click', HandleSlide);
            }

            $(trigger).click(HandleSlide);
            $(closer).on('click', function () { SlideClose(); });
            $(trigger).on('click', function () { SlideClose(); });

            var Slidebar = {

                reset: function (name) {
                    console.log($body);
                    $body.one(RemoveSlide);
                },
                RemoveSlide: function () { RemoveSlide(); },
                InitiateSlide: function () { InitiateSlide(); },
                //HandleSlide: function() {HandleSlide();}

            }

            return Slidebar;
        });
    }

})(jQuery, window, document);