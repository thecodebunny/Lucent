/******************************************************************
Site Name: Lucent Theme
Author: Lucent Themes

Name: Lucent Scripts

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

******************************************************************/




/*** Vertical Tabs ***/
jQuery(document).ready(function($, window) {
    'use-strict';

    var elements = {};

    //View

    var constructTab = function(tabContainer) {
        var tabContentEl = jQuery(tabContainer).find('.lucent-vert-content > li');
        $.each(tabContentEl, function() {
            hideTabs(this);
        });
        var activeTab = (jQuery('.lucent-vert-legend .active').length) ? jQuery('.lucent-vert-legend .active') : jQuery('.lucent-vert-legend > li:first-child');
        showTab(activeTab);
    };

    var hideTabs = function(tab, callback) {
        jQuery(tab).hide().removeClass('active');
        if (callback) {
            callback();
        }
    };

    var showTab = function(tab) {
        var index = tab.index();

        hideTabs(jQuery('.lucent-vert-content .active'));
        jQuery('.lucent-vert-legend .active').removeClass('active').addClass('inactive');
        jQuery('.lucent-vert-legend > li').eq(index).removeClass('inactive').addClass('active');
        jQuery('.lucent-vert-content > li').eq(index).show().addClass('active');
    };


    //Controller
    var tabController = function(tabContainer) {
        var tabLegendEl = jQuery(tabContainer).find('.lucent-vert-legend li');
        $.each(tabLegendEl, function() {
            jQuery(this).on('click', function() {
                var tabElement = jQuery(this);
                showTab(tabElement);
            });
        });
    };

    var init = function() {

        var self = this;
        var tabElement = jQuery('.lucent-vert');

        $.each(tabElement, function() {
            constructTab(this);
            tabController(this);
        });
    };

    //public
    var tabModule = {
        init: init
    };

    //transport
    if (typeof(define) === 'function' && define.amd) {
        define(tabModule);
    } else if (typeof(exports) === 'object') {
        module.tabModule = tabModule;
    } else {
        window.tabModule = tabModule;
    }

}(jQuery, window));

/*** Accordion ***/
(
    function($) {
        'use-strict';
        $.fn.Lucentaccordion = function(options) {
            return this.each(function() {
                var settings = $.extend({
                    firstChildExpand: true,
                    multiExpand: false,
                    slideSpeed: 500,
                    dropDownIcon: '&#9660'
                }, options);

                jQuery(this).children("h1").each(
                    function() {
                        jQuery(this).next('div').andSelf().wrapAll("<div class='lucent-accordion-item'></div>");
                    }
                );
                jQuery(this).children().children('div').addClass("lucent-accordion-content");
                jQuery(this).find("h1").wrap("<div class='lucent-accordion-header'></div>");
                jQuery(this).find("h1").after("<div class='lucent-accordion-header-icon'>" + settings.dropDownIcon + "</div>");
                jQuery(this).children('.lucent-accordion-item').wrap('<div class="drawer"></div>');
                if (settings.firstChildExpand == true) {
                    jQuery(this).find(".lucent-accordion-header:first").toggleClass("lucent-accordion-header-active");
                    jQuery(this).find(".lucent-accordion-header:first").parent().toggleClass("lucent-accordion-item-active");
                    jQuery(this).find(".lucent-accordion-header:first").next().slideToggle(0);
                    jQuery(this).find(".lucent-accordion-header:first").children(".lucent-accordion-header-icon").toggleClass("lucent-accordion-header-icon-active");
                }
                jQuery(this).find(".lucent-accordion-header").click(
                    function() {
                        if (settings.multiExpand == false) {
                            if (!jQuery(this).hasClass('lucent-accordion-header-active')) {
                                jQuery(this).parent().parent().parent().find(".lucent-accordion-header-active").removeClass('lucent-accordion-header-active');
                                jQuery(this).parent().parent().parent().find(".lucent-accordion-item-active").children(".lucent-accordion-content").slideUp(settings.slideSpeed);
                                jQuery(this).parent().parent().parent().find(".lucent-accordion-header-icon-active").removeClass("lucent-accordion-header-icon-active");
                                jQuery(this).parent().parent().parent().find(".lucent-accordion-item-active").removeClass("lucent-accordion-item-active");
                            }
                        }
                        jQuery(this).toggleClass("lucent-accordion-header-active");
                        jQuery(this).parent().toggleClass("lucent-accordion-item-active");
                        jQuery(this).next().slideToggle(settings.slideSpeed);
                        jQuery(this).children(".lucent-accordion-header-icon").toggleClass("lucent-accordion-header-icon-active");
                    }
                );
            });
        }
    }
    (jQuery));






/****************************************************
 * 
 *  Select Fields Effect
 * 
 ****************************************************/

(function($, undefined) {
    var PROP_NAME = 'lucentselect',
        FALSE = false,
        TRUE = true;

    function LucentSelect() {
        this._state = [];
        this._defaults = { // Global defaults for all the select box instances
            classHolder: "asHolder",
            classHolderDisabled: "asHolderDisabled",
            classSelector: "asSelector",
            classSelectorOpen: "asSelectorOpen",
            classOptions: "asOptions",
            classGroup: "asGroup",
            classSub: "asSub",
            classDisabled: "asDisabled",
            classToggleOpen: "asToggleOpen",
            classToggle: "asToggle  icon-list",
            classFocus: "asFocus",
            speed: 500,
            effect: "slide", // "slide" or "fade"
            onChange: null, //Define a callback function when the lucentselect is changed
            onOpen: null, //Define a callback function when the lucentselect is open
            onClose: null //Define a callback function when the lucentselect is closed
        };
    }

    $.extend(LucentSelect.prototype, {

        _isOpenLucentSelect: function(target) {
            if (!target) {
                return FALSE;
            }
            var inst = this._getInst(target);
            return inst.isOpen;
        },

        _isDisabledLucentSelect: function(target) {
            if (!target) {
                return FALSE;
            }
            var inst = this._getInst(target);
            return inst.isDisabled;
        },

        _attachLucentSelect: function(target, settings) {
            if (this._getInst(target)) {
                return FALSE;
            }
            var $target = $(target),
                self = this,
                inst = self._newInst($target),
                asHolder, asSelector, asToggle, asOptions,
                s = FALSE,
                optGroup = $target.find("optgroup"),
                opts = $target.find("option"),
                olen = opts.length;

            $target.attr("as", inst.uid);

            $.extend(inst.settings, self._defaults, settings);
            self._state[inst.uid] = FALSE;
            $target.hide();

            function closeOthers() {
                var key, sel,
                    uid = this.attr("id").split("_")[1];
                for (key in self._state) {
                    if (key !== uid) {
                        if (self._state.hasOwnProperty(key)) {
                            sel = $("select[as='" + key + "']")[0];
                            if (sel) {
                                self._closeLucentSelect(sel);
                            }
                        }
                    }
                }
            }

            asHolder = $("<div>", {
                "id": "asHolder_" + inst.uid,
                "class": inst.settings.classHolder,
                "tabindex": $target.attr("tabindex")
            });

            asSelector = $("<a>", {
                "id": "asSelector_" + inst.uid,
                "href": "#",
                "class": inst.settings.classSelector,
                "click": function(e) {
                    e.preventDefault();
                    closeOthers.apply($(this), []);
                    var uid = $(this).attr("id").split("_")[1];
                    if (self._state[uid]) {
                        self._closeLucentSelect(target);
                    } else {
                        self._openLucentSelect(target);
                    }
                }
            });

            asToggle = $("<a>", {
                "id": "asToggle_" + inst.uid,
                "href": "#",
                "class": inst.settings.classToggle,
                "click": function(e) {
                    e.preventDefault();
                    closeOthers.apply($(this), []);
                    var uid = $(this).attr("id").split("_")[1];
                    if (self._state[uid]) {
                        self._closeLucentSelect(target);
                    } else {
                        self._openLucentSelect(target);
                    }
                }
            });
            asToggle.appendTo(asHolder);

            asOptions = $("<ul>", {
                "id": "asOptions_" + inst.uid,
                "class": inst.settings.classOptions,
                "css": {
                    "display": "none"
                }
            });

            $target.children().each(function(i) {
                var that = $(this),
                    li, config = {};
                if (that.is("option")) {
                    getOptions(that);
                } else if (that.is("optgroup")) {
                    li = $("<li>");
                    $("<span>", {
                        "text": that.attr("label")
                    }).addClass(inst.settings.classGroup).appendTo(li);
                    li.appendTo(asOptions);
                    if (that.is(":disabled")) {
                        config.disabled = true;
                    }
                    config.sub = true;
                    getOptions(that.find("option"), config);
                }
            });

            function getOptions() {
                var sub = arguments[1] && arguments[1].sub ? true : false,
                    disabled = arguments[1] && arguments[1].disabled ? true : false;
                arguments[0].each(function(i) {
                    var that = $(this),
                        li = $("<li>"),
                        child;
                    if (that.is(":selected")) {
                        asSelector.text(that.text());
                        s = TRUE;
                    }
                    if (i === olen - 1) {
                        li.addClass("last");
                    }
                    if (!that.is(":disabled") && !disabled) {
                        child = $("<a>", {
                            "href": "#" + that.val(),
                            "rel": that.val()
                        }).text(that.text()).bind("click.as", function(e) {
                            if (e && e.preventDefault) {
                                e.preventDefault();
                            }
                            var t = asToggle,
                                $this = $(this),
                                uid = t.attr("id").split("_")[1];
                            self._changeLucentSelect(target, $this.attr("rel"), $this.text());
                            self._closeLucentSelect(target);
                        }).bind("mouseover.as", function() {
                            var $this = $(this);
                            $this.parent().siblings().find("a").removeClass(inst.settings.classFocus);
                            $this.addClass(inst.settings.classFocus);
                        }).bind("mouseout.as", function() {
                            $(this).removeClass(inst.settings.classFocus);
                        });
                        if (sub) {
                            child.addClass(inst.settings.classSub);
                        }
                        if (that.is(":selected")) {
                            child.addClass(inst.settings.classFocus);
                        }
                        child.appendTo(li);
                    } else {
                        child = $("<span>", {
                            "text": that.text()
                        }).addClass(inst.settings.classDisabled);
                        if (sub) {
                            child.addClass(inst.settings.classSub);
                        }
                        child.appendTo(li);
                    }
                    li.appendTo(asOptions);
                });
            }

            if (!s) {
                asSelector.text(opts.first().text());
            }

            $.data(target, PROP_NAME, inst);

            asHolder.data("uid", inst.uid).bind("keydown.as", function(e) {
                var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0,
                    $this = $(this),
                    uid = $this.data("uid"),
                    inst = $this.siblings("select[as='" + uid + "']").data(PROP_NAME),
                    trgt = $this.siblings(["select[as='", uid, "']"].join("")).get(0),
                    $f = $this.find("ul").find("a." + inst.settings.classFocus);
                switch (key) {
                    case 37: //Arrow Left
                    case 38: //Arrow Up
                        if ($f.length > 0) {
                            var $next;
                            $("a", $this).removeClass(inst.settings.classFocus);
                            $next = $f.parent().prevAll("li:has(a)").eq(0).find("a");
                            if ($next.length > 0) {
                                $next.addClass(inst.settings.classFocus).focus();
                                $("#asSelector_" + uid).text($next.text());
                            }
                        }
                        break;
                    case 39: //Arrow Right
                    case 40: //Arrow Down
                        var $next;
                        $("a", $this).removeClass(inst.settings.classFocus);
                        if ($f.length > 0) {
                            $next = $f.parent().nextAll("li:has(a)").eq(0).find("a");
                        } else {
                            $next = $this.find("ul").find("a").eq(0);
                        }
                        if ($next.length > 0) {
                            $next.addClass(inst.settings.classFocus).focus();
                            $("#asSelector_" + uid).text($next.text());
                        }
                        break;
                    case 13: //Enter
                        if ($f.length > 0) {
                            self._changeLucentSelect(trgt, $f.attr("rel"), $f.text());
                        }
                        self._closeLucentSelect(trgt);
                        break;
                    case 9: //Tab
                        if (trgt) {
                            var inst = self._getInst(trgt);
                            if (inst /* && inst.isOpen*/ ) {
                                if ($f.length > 0) {
                                    self._changeLucentSelect(trgt, $f.attr("rel"), $f.text());
                                }
                                self._closeLucentSelect(trgt);
                            }
                        }
                        var i = parseInt($this.attr("tabindex"), 10);
                        if (!e.shiftKey) {
                            i++;
                        } else {
                            i--;
                        }
                        $("*[tabindex='" + i + "']").focus();
                        break;
                    case 27: //Escape
                        self._closeLucentSelect(trgt);
                        break;
                }
                e.stopPropagation();
                return false;
            }).delegate("a", "mouseover", function(e) {
                $(this).addClass(inst.settings.classFocus);
            }).delegate("a", "mouseout", function(e) {
                $(this).removeClass(inst.settings.classFocus);
            });

            asSelector.appendTo(asHolder);
            asOptions.appendTo(asHolder);
            asHolder.insertAfter($target);

            $("html").live('mousedown', function(e) {
                e.stopPropagation();
                $("select").lucentselect('close');
            });
            $([".", inst.settings.classHolder, ", .", inst.settings.classSelector].join("")).mousedown(function(e) {
                e.stopPropagation();
            });
        },

        _detachLucentSelect: function(target) {
            var inst = this._getInst(target);
            if (!inst) {
                return FALSE;
            }
            $("#asHolder_" + inst.uid).remove();
            $.data(target, PROP_NAME, null);
            $(target).show();
        },

        _changeLucentSelect: function(target, value, text) {
            var onChange,
                inst = this._getInst(target);
            if (inst) {
                onChange = this._get(inst, 'onChange');
                $("#asSelector_" + inst.uid).text(text);
            }
            value = value.replace(/\'/g, "\\'");
            var $targetOption = $(target).find("option").filter(function() {
                var $this = $(this);
                return value == ($this.val() || $this.text());
            });
            console.log($targetOption);
            $targetOption.prop("selected", true);
            if (inst && onChange) {
                onChange.apply((inst.input ? inst.input[0] : null), [value, inst]);
            } else if (inst && inst.input) {
                inst.input.trigger('change');
            }
        },

        _enableLucentSelect: function(target) {
            var inst = this._getInst(target);
            if (!inst || !inst.isDisabled) {
                return FALSE;
            }
            $("#asHolder_" + inst.uid).removeClass(inst.settings.classHolderDisabled);
            inst.isDisabled = FALSE;
            $.data(target, PROP_NAME, inst);
        },

        _disableLucentSelect: function(target) {
            var inst = this._getInst(target);
            if (!inst || inst.isDisabled) {
                return FALSE;
            }
            $("#asHolder_" + inst.uid).addClass(inst.settings.classHolderDisabled);
            inst.isDisabled = TRUE;
            $.data(target, PROP_NAME, inst);
        },

        _optionLucentSelect: function(target, name, value) {
            var inst = this._getInst(target);
            if (!inst) {
                return FALSE;
            }
            //TODO check name
            inst[name] = value;
            $.data(target, PROP_NAME, inst);
        },

        _openLucentSelect: function(target) {
            var inst = this._getInst(target);
            //if (!inst || this._state[inst.uid] || inst.isDisabled) {
            if (!inst || inst.isOpen || inst.isDisabled) {
                return;
            }
            var el = $("#asOptions_" + inst.uid),
                viewportHeight = parseInt($(window).height(), 10),
                offset = $("#asHolder_" + inst.uid).offset(),
                scrollTop = $(window).scrollTop(),
                height = el.prev().height(),
                diff = viewportHeight - (offset.top - scrollTop) - height / 2,
                onOpen = this._get(inst, 'onOpen');
            el.css({
                "top": height + "px",
                "maxHeight": (diff - height) + "px"
            });
            inst.settings.effect === "fade" ? el.fadeIn(inst.settings.speed) : el.slideDown(inst.settings.speed);
            $("#asSelector_" + inst.uid).addClass(inst.settings.classSelectorOpen);
            $("#asToggle_" + inst.uid).addClass(inst.settings.classToggleOpen);
            this._state[inst.uid] = TRUE;
            inst.isOpen = TRUE;
            if (onOpen) {
                onOpen.apply((inst.input ? inst.input[0] : null), [inst]);
            }
            $.data(target, PROP_NAME, inst);
        },

        _closeLucentSelect: function(target) {
            var inst = this._getInst(target);
            //if (!inst || !this._state[inst.uid]) {
            if (!inst || !inst.isOpen) {
                return;
            }
            var onClose = this._get(inst, 'onClose');
            inst.settings.effect === "fade" ? $("#asOptions_" + inst.uid).fadeOut(inst.settings.speed) : $("#asOptions_" + inst.uid).slideUp(inst.settings.speed);
            $("#asSelector_" + inst.uid).removeClass(inst.settings.classSelectorOpen);
            $("#asToggle_" + inst.uid).removeClass(inst.settings.classToggleOpen);
            this._state[inst.uid] = FALSE;
            inst.isOpen = FALSE;
            if (onClose) {
                onClose.apply((inst.input ? inst.input[0] : null), [inst]);
            }
            $.data(target, PROP_NAME, inst);
        },

        _newInst: function(target) {
            var id = target[0].id.replace(/([^A-Za-z0-9_-])/g, '\\\\$1');
            return {
                id: id,
                input: target,
                uid: Math.floor(Math.random() * 99999999),
                isOpen: FALSE,
                isDisabled: FALSE,
                settings: {}
            };
        },

        _getInst: function(target) {
            try {
                return $.data(target, PROP_NAME);
            } catch (err) {
                throw 'Missing instance data for this lucentselect';
            }
        },

        _get: function(inst, name) {
            return inst.settings[name] !== undefined ? inst.settings[name] : this._defaults[name];
        }
    });


    $.fn.lucentselect = function(options) {

        var otherArgs = Array.prototype.slice.call(arguments, 1);
        if (typeof options == 'string' && options == 'isDisabled') {
            return $.lucentselect['_' + options + 'LucentSelect'].apply($.lucentselect, [this[0]].concat(otherArgs));
        }

        if (options == 'option' && arguments.length == 2 && typeof arguments[1] == 'string') {
            return $.lucentselect['_' + options + 'LucentSelect'].apply($.lucentselect, [this[0]].concat(otherArgs));
        }

        return this.each(function() {
            typeof options == 'string' ?
                $.lucentselect['_' + options + 'LucentSelect'].apply($.lucentselect, [this].concat(otherArgs)) :
                $.lucentselect._attachLucentSelect(this, options);
        });
    };

    $.lucentselect = new LucentSelect(); // singleton instance
    $.lucentselect.version = "0.2";
})(jQuery);

/**********************************************
 * 
 * Lucent Countdown
 * 
 **********************************************/

(function($) {

    'use-strict';

    $.fn.LucentCountdown = function(givenOptions) {

        var ds = this;
        var refreshed = 1000,
            thread = null,
            running = false,
            left = 0,
            decreament = 1,
            interval = 0,

            seconds = 0,
            minutes = 0,
            hours = 0,
            days = 0,

            elemDays = null,
            elemHours = null,
            elemMinutes = null,
            elemSeconds = null;


        var defaults = {
            startDate: new Date(), // Date Object of starting time of count down, usualy now (whether client time or given php time)
            endDate: null, // Date Object of ends of count down

            elemSelDays: '', // Leave blank to use default value or provide a string selector if the lement already exist, Example: .ac-days
            elemSelHours: '', // Leave blank to use default value or provide a string selector if the lement already exist, Example: .ac-hours
            elemSelMinutes: '', // Leave blank to use default value or provide a string selector if the lement already exist, Example: .ac-minutes
            elemSelSeconds: '', // Leave blank to use default value or provide a string selector if the lement already exist, Example: .ac-seconds

            theme: 'white', // Set the theme 'white', 'black', 'red', 'flat', 'custome'

            titleDays: 'Days', // Set the title of days
            titleHours: 'Hours', // Set the title of hours
            titleMinutes: 'Minutes', // Set the title of minutes
            titleSeconds: 'Seconds', // Set the title of seconds

            onBevoreStart: null, // callback before the count down starts
            onClocking: null, // callback after the timer just clocked
            onFinish: null // callback if the count down is finish or 0 timer defined
        };

        var options = $.extend({}, defaults, givenOptions);

        if (this.length > 1) {
            this.each(function() { $(this).LucentCountdown(givenOptions) });
            return this;
        }

        var init = function() {

            // Init element
            if (!options.elemSelSeconds) {
                ds.prepend('<div class="ac-element ac-element-seconds">\
							<div class="ac-element-title">' + options.titleSeconds + '</div>\
							<div class="ac-element-value ac-seconds">00</div>\
						</div>');
                elemSeconds = ds.find('.ac-seconds');
            } else {
                elemSeconds = ds.find(options.elemSelSeconds);
            }

            if (!options.elemSelMinutes) {
                ds.prepend('<div class="ac-element ac-element-minutes">\
							<div class="ac-element-title">' + options.titleMinutes + '</div>\
							<div class="ac-element-value ac-minutes">00</div>\
						</div>');
                elemMinutes = ds.find('.ac-minutes');
            } else {
                elemMinutes = ds.find(options.elemSelMinutes);
            }

            if (!options.elemSelHours) {
                ds.prepend('<div class="ac-element ac-element-hours">\
							<div class="ac-element-title">' + options.titleHours + '</div>\
							<div class="ac-element-value ac-hours">00</div>\
						</div>');
                elemHours = ds.find('.ac-hours');
            } else {
                elemHours = ds.find(options.elemSelHours);
            }

            if (!options.elemSelDays) {
                ds.prepend('<div class="ac-element ac-element-days">\
							<div class="ac-element-title">' + options.titleDays + '</div>\
							<div class="ac-element-value ac-days">00</div>\
						</div>');
                elemDays = ds.find('.ac-days');
            } else {
                elemDays = ds.find(options.elemSelDays);
            }

            ds.addClass('LucentCountdown');
            ds.addClass('ac-' + options.theme);

            // Init start and end
            if (options.startDate && options.endDate) {
                interval = options.endDate.getTime() - options.startDate.getTime();
                if (interval > 0) {
                    var allSeconds = (interval / 1000);
                    var hoursMod = (allSeconds % 86400);
                    var minutesMod = (hoursMod % 3600);

                    left = allSeconds;
                    days = Math.floor(allSeconds / 86400);
                    hours = Math.floor(hoursMod / 3600);
                    minutes = Math.floor(minutesMod / 60);
                    seconds = Math.floor(minutesMod % 60);
                }
            }

            start();
        }

        var stop = function(callback) {
            if (running) {
                clearInterval(thread);
                running = false;
            }
            if (callback) {
                callback(ds);
            }
        }

        var start = function() {
            if (!running) {

                if (left > 0) {

                    if (options.onBevoreStart) {
                        options.onBevoreStart(ds);
                    }

                    thread = setInterval(
                        function() {

                            if (left > 0) {

                                left -= decreament;

                                seconds -= decreament;

                                if (seconds <= 0 && (minutes > 0 || hours > 0 || days > 0)) {
                                    minutes--;
                                    seconds = 60;
                                }

                                if (minutes <= 0 && (hours > 0 || days > 0)) {
                                    hours--;
                                    minutes = 60;
                                }

                                if (hours <= 0 && days > 0) {
                                    days--;
                                    hours = 24;
                                }

                                if (elemDays)
                                    elemDays.html((days < 10 ? '0' + days : days));
                                if (elemHours)
                                    elemHours.html((hours < 10 ? '0' + hours : hours));
                                if (elemMinutes)
                                    elemMinutes.html((minutes < 10 ? '0' + minutes : minutes));
                                if (elemSeconds)
                                    elemSeconds.html((seconds < 10 ? '0' + seconds : seconds));

                                if (options.onClocking) {
                                    options.onClocking(ds);
                                }

                            } else {
                                stop(options.onFinish);
                            }
                        },
                        refreshed);
                    running = true;
                } else {
                    if (options.onFinish) {
                        options.onFinish(ds);
                    }
                }
            }
        }

        init();

    }
})(jQuery);