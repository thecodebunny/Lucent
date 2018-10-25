jQuery(function($) {

    // global wc_add_to_cart_params.
    if (typeof wc_add_to_cart_params === 'undefined') {
        return false;
    }
    console.log($(this));
    $(document).on('click', '.product-type-simple form .single_add_to_cart_button', function(e) {
        e.preventDefault();
    
        var $thisbutton = $(this);
        var $databutton = $('.lucent-ajax-btn');
        console.log($(this));
        if (!$databutton.attr('data-product_id')) {
            return true;
        }

        $thisbutton.removeClass('added');
        $thisbutton.addClass('loading');

        var data = {
            product_id: $databutton.data('product_id'),
            product_sku: $databutton.data('product_sku'),
            quantity: $('.quantity .qty').val()
        };

        // Trigger event.
        $(document.body).trigger('adding_to_cart', [$thisbutton, data]);

        // Ajax action.
        $.post(wc_add_to_cart_params.wc_ajax_url.toString().replace('%%endpoint%%', 'add_to_cart'), data, function(response) {

            if (!response) {
                return;
            }

            var this_page = window.location.toString();

            this_page = this_page.replace('add-to-cart', 'added-to-cart');

            if (response.error && response.product_url) {
                window.location = response.product_url;
                return;
            }

            // Redirect to cart option.
            if (wc_add_to_cart_params.cart_redirect_after_add === 'yes') {

                window.location = wc_add_to_cart_params.cart_url;
                return;

            } else {

                $thisbutton.removeClass('loading');

                var fragments = response.fragments;
                var cart_hash = response.cart_hash;

                // Block fragments class.
                if (fragments) {
                    $.each(fragments, function(key) {
                        $(key).addClass('updating');
                    });
                }

                // Block widgets and fragments.
                $('.shop_table.cart, .updating, .cart_totals').fadeTo('400', '0.6').block({
                    message: null,
                    overlayCSS: {
                        opacity: 0.6
                    }
                });

                // Changes button classes.
                $thisbutton.addClass('added');

                // View cart text.
                if (!wc_add_to_cart_params.is_cart && $thisbutton.parent().find('.added_to_cart').length === 0) {
                    $thisbutton.after(' <a href="' + wc_add_to_cart_params.cart_url + '" class="added_to_cart wc-forward" title="' +
                        wc_add_to_cart_params.i18n_view_cart + '">' + wc_add_to_cart_params.i18n_view_cart + '</a>');
                }

                // Replace fragments.
                if (fragments) {
                    $.each(fragments, function(key, value) {
                        $(key).replaceWith(value);
                    });
                }

                // Unblock.
                $('.widget_shopping_cart, .updating').stop(true).css('opacity', '1').unblock();

                // Cart page elements.
                $('.shop_table.cart').load(this_page + ' .shop_table.cart:eq(0) > *', function() {

                    $('.shop_table.cart').stop(true).css('opacity', '1').unblock();

                    $(document.body).trigger('cart_page_refreshed');
                });

                $('.cart_totals').load(this_page + ' .cart_totals:eq(0) > *', function() {
                    $('.cart_totals').stop(true).css('opacity', '1').unblock();
                });

                // Trigger event so themes can refresh other areas.
                $(document.body).trigger('added_to_cart', [fragments, cart_hash, $thisbutton]);

            } // End if().

        });

    });

});
jQuery(function($) {

    // Ajax add to cart.
    $(document).on('click', '.product_type_variable', function(e) {

        e.preventDefault();
        $variation_form = $(this).prev('form');
        var var_id = $variation_form.find('input[name=variation_id]').val();

        var product_id = $variation_form.find('input[name=product_id]').val();
        var quantity = $variation_form.find('input[name=quantity]').val();

        // attributes = [];.
        $('.ajaxerrors').remove();
        var item = {},
            check = true;

        variations = $variation_form.find('select[name^=attribute]');

        // Updated code to work with radio button - mantish - WC Variations Radio Buttons - 8manos.
        if (!variations.length) {
            variations = $variation_form.find('[name^=attribute]:checked');
        }

        // Backup Code for getting input variable.
        if (!variations.length) {
            variations = $variation_form.find('input[name^=attribute]');
        }

        variations.each(function() {

            var $this = $(this),
                attributeName = $this.attr('name'),
                attributevalue = $this.val(),
                index,
                attributeTaxName;

            $this.removeClass('error');

            if (attributevalue.length === 0) {
                index = attributeName.lastIndexOf('_');
                attributeTaxName = attributeName.substring(index + 1);

                $this
                    .addClass('required error')
                    .before('<div class="ajaxerrors"><p>Please select ' + attributeTaxName + '</p></div>')

                check = false;
            } else {
                item[attributeName] = attributevalue;
            }

        });

        // AJAX add to cart request.
        var $thisbutton = $(this);
        console.log($thisbutton);

        if ($thisbutton.is('.product_type_variable')) {

            $thisbutton.removeClass('added');
            $thisbutton.addClass('loading');

            var data = {
                action: 'woocommerce_add_to_cart_variable_rc',
                product_id: product_id,
                quantity: quantity,
                variation_id: var_id,
                variation: item
            };
            
            // Trigger event.
            $('body').trigger('adding_to_cart', [$thisbutton, data]);
            // Ajax action.
            console.log(data);
            $.post(wc_add_to_cart_params.ajax_url, data, function(response) {
                console.log(response)
                if (!response)
                    return;

                var this_page = window.location.toString();

                this_page = this_page.replace('add-to-cart', 'added-to-cart');
                console.log(this_page)
                if (response.error && response.product_url) {
                    window.location = response.product_url;
                    return;
                }

                if (wc_add_to_cart_params.cart_redirect_after_add === 'yes') {

                    window.location = wc_add_to_cart_params.cart_url;
                    return;

                } else {

                    $thisbutton.removeClass('loading');

                    var fragments = response.fragments;
                    var cart_hash = response.cart_hash;

                    // Block fragments class.
                    if (fragments) {
                        $.each(fragments, function(key) {
                            $(key).addClass('updating');
                        });
                    }

                    // Block widgets and fragments.
                    $('.shop_table.cart, .updating, .cart_totals').fadeTo('400', '0.6').block({
                        message: null,
                        overlayCSS: {
                            opacity: 0.6
                        }
                    });

                    // Changes button classes.
                    $thisbutton.addClass('added');

                    // View cart text.
                    if (!wc_add_to_cart_params.is_cart && $thisbutton.parent().find('.added_to_cart').size() === 0) {
                        $thisbutton.after(' <a href="' + wc_add_to_cart_params.cart_url + '" class="added_to_cart wc-forward" title="' +
                            wc_add_to_cart_params.i18n_view_cart + '">' + wc_add_to_cart_params.i18n_view_cart + '</a>');
                    }

                    // Replace fragments.
                    if (fragments) {
                        $.each(fragments, function(key, value) {
                            $(key).replaceWith(value);
                        });
                    }

                    // Unblock.
                    $('.widget_shopping_cart, .updating').stop(true).css('opacity', '1').unblock();

                    // Cart page elements.
                    $('.shop_table.cart').load(this_page + ' .shop_table.cart:eq(0) > *', function() {

                        $('.shop_table.cart').stop(true).css('opacity', '1').unblock();

                        $(document.body).trigger('cart_page_refreshed');
                    });

                    $('.cart_totals').load(this_page + ' .cart_totals:eq(0) > *', function() {
                        $('.cart_totals').stop(true).css('opacity', '1').unblock();
                    });

                    // Trigger event so themes can refresh other areas.
                    $(document.body).trigger('added_to_cart', [fragments, cart_hash, $thisbutton]);
                } // End if().
            });

            return false;

        } else {
            return true;
        } // End if().

    });

});
jQuery(document).ready(function($) {

    lucentChange = function(element) {
        console.log(element);
        form = element.closest('form.cart-form');
        console.log(form);
        $("<input type='hidden' name='update_cart' id='update_cart' value='1'>").appendTo(form);

        $("<input type='hidden' name='is_lucent_ajax' id='is_lucent_ajax' value='1'>").appendTo(form);

        el_qty = element;
        matches = element.attr('name').match(/cart\[(\w+)\]/);

        cart_item_key = matches[1];
        form.append($("<input type='hidden' name='cart_item_key' id='cart_item_key'>").val(cart_item_key));


        if (!lucentZeroQuantityCheck(el_qty)) {
            return false;
        }

        if (el_qty.val() == 0) {

            removeLink = el_qty.closest('.cart_item').find('.remove');
            removeLink.click();
            console.log('RemoveLink = ' + removeLink);
        }

        formData = form.serialize();
        $("input[name='update_cart']").val('Updating…').prop('disabled', true);

        $("a.checkout-button").addClass('disabled').html('Updating…');

        $.post(form.attr('action'), formData, lucentPostCallback, 'json');
        console.log(form.attr('action'));
        return true;
    };

    lucentPostCallback = function(resp) {

        $('body').find('.itemsnumber').html(resp.carttotalqty);

        $('body').find('.cart-collaterals').html(resp.html);

        el_qty.closest('.cart_item').find('.product-subtotal').html(resp.price);

        $('#update_cart').remove();
        $('#is_lucent_ajax').remove();
        $('#cart_item_key').remove();

        $("input[name='update_cart']").val(resp.update_label).prop('disabled', false);

        $("a.checkout-button").removeClass('disabled').html(resp.checkout_label);

        if (el_qty.val() == 0) {
            el_qty.closest('.cart_item').remove();
        }

        form.find('.remove').click(function(e) {
            e.preventDefault;
            console.log(el_qty);
            el_qty.closest('.cart_item').remove();
        });

        maxStock = el_qty.attr('max');
        if (maxStock > 0) {
            incrementButton = el_qty.parent().find('.plus').parent().parent();

            (el_qty.val() >= maxStock) ? incrementButton.hide(): incrementButton.show();
        }

        if ($('.woocommerce-checkout').length) {
            $(document.body).trigger('update_checkout');
        }

        $(document.body).trigger('updated_cart_totals');
    };

    lucentZeroQuantityCheck = function(el_qty) {
        if (el_qty.val() == 0) {

            if (!confirm('Are you sure you want to remove this item from cart?')) {
                el_qty.val(1);
                return false;
            }
        }

        return true;
    };

    lucentListenChange = function() {
        $(document).on('change', '#lucentpopupcart .qty', function() {
            if ($(this).val() == 0) {
                lucentFixEventLose();
            }
            return lucentChange($(this));
            console.log($(this));
        });
        $(document).on('change', '#lucentslideoutcart .qty', function() {
            if ($(this).val() == 0) {
                lucentFixEventLose();
            }
            return lucentChange($(this));
            console.log($(this));
        });
    };

    lucentCartDeleteEvent = function() {
        $('.remove').on('click', function() {
            lucentFixEventLose();
        });
    };

    lucentFixEventLose = function() {
        // fix event lose when set qty to zero or item removed from the cart
        setTimeout(function() { lucentListenChange(); }, 500);
    };

    lucentQtyButtons = function() {
        $('.quantity').on('click', '.plus', {}, function(e) {
            inputQty = $(this).parent().parent().parent().find('.qty');
            inputQty.val(function(i, oldval) { return ++oldval; });
            inputQty.change();
            return false;
            console.log(inputQty);
        });

        $('.quantity').on('click', '.minus', {}, function(e) {
            inputQty = $(this).parent().parent().parent().find('.qty');
            inputQty.val(function(i, oldval) { return oldval > 0 ? --oldval : 0; });
            inputQty.change();
            return false;
        });
    };

    //
    // start calls
    //
    lucentListenChange();
    lucentQtyButtons();
    lucentCartDeleteEvent();

});