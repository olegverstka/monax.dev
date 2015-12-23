//*http://brooksite.ru 28.04.2014 version 2.0.6*//
jQuery(document).ready(function() {
    var f = "",//"http://" + document.domain,
        d = jQuery(".currency_code").text();
    jQuery(".buttons .button_buy, .button_buy").live("click", function() {
        var c = jQuery(this).attr("href"),
            a = jQuery(".list_product input.product_plus, .list_product input.product_minus, .list_product input[name^='quantity']").length ? jQuery(this).attr("id").split("productlink")[1] : c.split("product_id=")[1];
        jQuery(".productitem_" + a + " .name a").length ? jQuery(".productitem_" + a + " .name a").attr("href") : (jQuery(".mysef_redirect").text(),
            c.split("?"));
        jQuery(this).addClass("was_clicked");
        jQuery("#system-message-container, #system-message").remove();
        if (jQuery(".jshop_list_product .product .jshop_prod_attributes").length) {
            jQuery(".productitem_" + a + " .buttons").append("<div class='attr_link_buy' style='display:none'></div>");
            var e = function() {
                var b = jQuery(".productitem_" + a + " .jshop_prod_attributes select, .productitem_" + a + " .jshop_prod_attributes input:radio").serializeArray();
                jQuery(".attr_link_buy").empty();
                jQuery.each(b, function(a,
                    b) {
                    jQuery(".attr_link_buy").append("&" + b.name + "=" + b.value)
                })
            };
            jQuery(".productitem_" + a + " .jshop_prod_attributes select, .productitem_" + a + " .jshop_prod_attributes input:radio").change(e);
            e()
        }
        jQuery(".mycart_mini_txt").append('<div class="ajaxloaddingcart_mini"></div>');
        jQuery(this).css("position", "relative").append('<div class="ajaxloaddingcart_mini"></div>');
        jQuery.ajax({
            cache: !1,
            url: c + jQuery(".attr_link_buy").text() + "&ajax=1",
            dataType: "json",
            success: function(a) {
                jQuery(".ajaxloaddingcart_mini").remove();
                "cart" == a.type_cart ? (jQuery(".mycart_mini_txt a").html(a.count_product), jQuery(".mycart_mini_txt").attr("title", jQuery(".lang_productsatcart").text() + " " + a.count_product + " " + jQuery(".lang_productssumm").text() + " " + a.price_product + " " + d), jQuery(".defaultDOMWindow").append("<a style='position:absolute;right:5px;bottom:0;color:#666666;font-size:11px;' href='http://brooksite.ru' title='\u0420\u0430\u0437\u0440\u0430\u0431\u043e\u0442\u043a\u0430 \u043c\u043e\u0434\u0443\u043b\u044f'>Brooksite.ru</a>"),
                    jQuery(".show_added_to_cart").length ? (jQuery(".was_clicked").parent().prepend("<span class='was_added_to_cart'>" + jQuery(".lang_productatcart").text() + "</span>"), setTimeout("jQuery('.was_added_to_cart').fadeOut(3000);", 1E3)) : (jQuery(".modal_quantity").html(a.count_product), jQuery(".modal_summ").html(a.price_product + " " + d), jQuery(".sqzy").length ? SqueezeBox.open("#inlineContent_minicart", {
                        size: {
                            x: 350,
                            y: 160
                        }
                    }) : jQuery.openDOMWindow({
                        anchoredClassName: "defaultDOMWindow",
                        windowSourceID: "#inlineContent_minicart",
                        height: 160,
                        width: 350,
                        overlayOpacity: 5,
                        windowBGColor: "#fff",
                        borderColor: "#555555"
                    })), setTimeout("jQuery('a').removeClass('was_clicked');", 3500)) : (jQuery.each(a, function(a, b) {
                    jQuery(".modal_err").html(b.message)
                }), jQuery(".jshop_list_product .attrib").length ? jQuery(".sqzy").length ? SqueezeBox.open("#error_inlineContent_minicart", {
                    size: {
                        x: 350,
                        y: 160
                    }
                }) : jQuery.openDOMWindow({
                    anchoredClassName: "errorDOMWindow",
                    windowSourceID: "#error_inlineContent_minicart",
                    height: 160,
                    width: 350,
                    overlayOpacity: 5,
                    windowBGColor: "#fff",
                    borderColor: "#555555"
                }) : window.location.replace(c))
            },
            error: function(a) {
                jQuery(".ajaxloaddingcart_mini").remove();
                jQuery(".modal_err").html(a.message);
                jQuery(".sqzy").length ? SqueezeBox.open("#error_inlineContent_minicart", {
                    size: {
                        x: 350,
                        y: 160
                    }
                }) : jQuery.openDOMWindow({
                    anchoredClassName: "errorDOMWindow",
                    windowSourceID: "#error_inlineContent_minicart",
                    height: 160,
                    width: 350,
                    overlayOpacity: 5,
                    windowBGColor: "#fff",
                    borderColor: "#555555"
                })
            }
        });
        return !1
    });
    jQuery(".buttons .button:first").live("click", function() {
        if ("cart" ==
            jQuery("#to").val()) {
            var c = jQuery('form[name="product"]').serialize();
            jQuery(".mycart_mini_txt").append('<div class="ajaxloaddingcart_mini"></div>');
            jQuery(".prod_buttons").css("position", "relative").append('<div class="ajaxloaddingcart_mini"></div>');
            jQuery("#system-message-container, #system-message").remove();
            jQuery.ajax({
                cache: !1,
                url: f + "/index.php?option=com_jshopping&controller=cart&task=add&" + c + "&ajax=1",
                dataType: "json",
                ifModified: !0,
                success: function(a) {
                    jQuery(".ajaxloaddingcart_mini").remove();
                    "cart" == a.type_cart ? (jQuery(".mycart_mini_txt a").html(a.count_product), jQuery(".mycart_mini_txt a", window.parent.document).html(a.count_product), jQuery(".mycart_mini_txt").attr("title", jQuery(".lang_productsatcart").text() + " " + a.count_product + " " + jQuery(".lang_productssumm").text() + " " + a.price_product + " " + d), jQuery(".mycart_mini_txt", window.parent.document).attr("title", jQuery(".lang_productsatcart").text() + " " + a.count_product + " " + jQuery(".lang_productssumm", window.parent.document).text() + " " + a.price_product +
                        " " + d), jQuery(".defaultDOMWindow").append("<a style='position:absolute;right:5px;bottom:0;color:#666666;font-size:11px;' href='http://brooksite.ru' title='\u0420\u0430\u0437\u0440\u0430\u0431\u043e\u0442\u043a\u0430 \u043c\u043e\u0434\u0443\u043b\u044f'>Brooksite.ru</a>"), jQuery(".show_added_to_cart").length ? (jQuery(".prod_buttons").prepend("<span class='was_added_to_cart'>" + jQuery(".lang_productatcart").text() + "</span>"), setTimeout("jQuery('.was_added_to_cart').fadeOut(3000);", 1E3)) : (jQuery(".modal_quantity").html(a.count_product),
                        jQuery(".modal_summ").html(a.price_product + " " + d), jQuery(".sqzy").length ? SqueezeBox.open("#inlineContent_minicart", {
                            size: {
                                x: 350,
                                y: 160
                            }
                        }) : jQuery.openDOMWindow({
                            anchoredClassName: "defaultDOMWindow",
                            windowSourceID: "#inlineContent_minicart",
                            height: 160,
                            width: 350,
                            overlayOpacity: 5,
                            windowBGColor: "#fff",
                            borderColor: "#555555"
                        }))) : (jQuery.each(a, function(a, b) {
                        jQuery(".modal_err").html(b.message)
                    }), jQuery(".sqzy").length ? SqueezeBox.open("#error_inlineContent_minicart", {
                        size: {
                            x: 350,
                            y: 160
                        }
                    }) : jQuery.openDOMWindow({
                        anchoredClassName: "errorDOMWindow",
                        windowSourceID: "#error_inlineContent_minicart",
                        height: 160,
                        width: 350,
                        overlayOpacity: 5,
                        windowBGColor: "#fff",
                        borderColor: "#555555"
                    }))
                },
                error: function(a) {
                    jQuery(".ajaxloaddingcart_mini").remove();
                    location.reload()
                }
            });
            return !1
        }
    });
    jQuery(".closeDOMWindow").live("click", function() {
        SqueezeBox.close()
    })
});