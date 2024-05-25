<x-input type="hidden" name="route_search_select_user" :value="route('admin.search.select.user')" />
<x-input type="hidden" name="route_render_info_shipping" :value="route('admin.order.render_info_shipping')" />
<x-input type="hidden" name="route_check_user_role" :value="route('admin.order.check_user_role')" />
<x-input type="hidden" name="route_search_render_product" :value="route('admin.search.render_product')" />
<x-input type="hidden" name="route_calculate_total_before_save_order" :value="route('admin.order.calculate_total_before_save_order')" />
<x-input type="hidden" name="route_delete_item_order_detail" :value="route('admin.order_detail.delete')" />
<x-input type="hidden" name="route_add_product" :value="route('admin.order.add_product')" />
<x-input type="hidden" name="route_update_price_product" :value="route('admin.order.route_update_price_product')" />
<script>
    function searchProduct(keyword, elmRender) {
        $.ajax({
            type: "GET",
            url: $('input[name="route_search_render_product"]').val(),
            data: {
                key: keyword
            },
            success: function(response) {
                $(elmRender).html(response);
            },
            error: function(response) {
                handleAjaxError(response);
            }
        })
    }

    function addProduct(payload) {
        var url = $('input[name="route_add_product"]').val(),
            user_id = $('select[name="order[user_id]"]').val();
        payload.user_id = user_id ? user_id : 0;

        closeModal('#modalAddProduct');
        $.ajax({
            type: "GET",
            url: url,
            data: payload,
            success: function(response) {
                console.log(response.data);
                $('#tableProduct tbody').prepend(response.data);
                $('#tableProduct tbody tr.no-product').hide();
                updateTotalOrder();
            },
            error: function(response) {
                handleAjaxError(response);
            }
        })

        $
    }

    function deleteItemOrderDetail(id, elm) {
        var url = $('input[name="route_delete_item_order_detail"]').val();
        $.ajax({
            type: "DELETE",
            url: url + '/' + id,
            data: {
                _token: token
            },
            success: function(response) {
                removeElmItemOrderDetail(elm);
            },
            error: function(response) {
                handleAjaxError(response);
            }
        })
    }

    function closeModal(modal) {
        $(modal).find('.btn-close').trigger('click');
    }

    function checkAddProduct(productId) {
        var elm = '#tableProduct tbody tr.item-product' + '.product-' + productId;
        if ($(elm).length > 0) {
            return true;
        }
        return false;
    }
    $(document).on('change', 'select[name="order[user_id]"]', function(e) {
        var url = $('input[name="route_render_info_shipping"]').val(),
            url_role = $('input[name="route_check_user_role"]').val(),
            userId = $(this).val();
        if (userId) {
            $.ajax({
                type: "GET",
                url: url,
                data: {
                    user_id: userId
                },
                success: function(response) {
                    $("#infoShipping").html(response);
                },
                error: function(response) {
                    handleAjaxError(response);
                }
            })

            $.ajax({
                type: "GET",
                url: url_role,
                data: {
                    user_id: userId
                },
                success: function(response) {
                    $("#tableProduct").html(response);
                },
                error: function(response) {
                    handleAjaxError(response);
                }
            })
        }
    });
    $(document).ready(function(e) {
        select2LoadData($('input[name="route_search_select_user"]').val());
        searchProduct('', '#showSearchResultProduct');
        $("#inputSearchProduct").keyup($.debounce(500, function(e) {
            searchProduct($(this).val(), '#showSearchResultProduct');
        }));
    });
    $(document).on('click', '.add-product', function(e) {
        var that = $(this),
            productId = that.data('product-id');
        if (checkAddProduct(productId)) {
            msgWarning('Sản phẩm này đã được thêm');
            return;
        }
        addProduct({
            product_id: productId
        });
    });

    function removeElmItemOrderDetail(elm) {
        $(elm).parents('.item-product').remove();
        if ($('#tableProduct tbody tr.item-product').length == 0) {
            $('#tableProduct tbody tr.no-product').show();
        }
    }
    $(document).on('click', '.remove-item-product', function(e) {
        var id = $(this).data('id'),
            that = this;
        if (!confirm('Bạn có chắc là muốn thực hiện?')) {
            return;
        }
        if (id) {
            deleteItemOrderDetail(id, that);
        } else {
            removeElmItemOrderDetail(that)
        }
    })

    function updateTotalOrder() {
        if ($('select[name="order[user_id]"]').val() == null) {
            return;
        }
        var url = $('input[name="route_calculate_total_before_save_order"]').val();
        $.ajax({
            type: "GET",
            url: url,
            data: $('#formOrder').serialize(),
            success: function(response) {
                $("#tableTotalOrder").replaceWith(response.data);
            },
            error: function(response) {
                handleAjaxError(response);
            }
        });
    }
    // $(document).on('DOMSubtreeModified change', 'select[name="order[user_id]"]', $.debounce(1000, function (e) {
    //     updateTotalOrder();
    // }));
    $(document).on('DOMSubtreeModified change', '#tableProduct tbody, select[name="order[user_id]"]', $.debounce(1000,
        function(e) {
            updateTotalOrder();
        }));

    $(document).on('change', 'input[name="order_detail[product_qty][]"]', $.debounce(1000, function(e) {
        // var unitPrice = $(this).parents('.item-product').find('td.unit-price').text();
        // unitPrice = parseInt(unitPrice.replace(new RegExp(currency + "|,", "g"), "")) * $(this).val();
        // $(this).parents('.item-product').find('td.total-price').text(formatPrice(unitPrice));
        var that = $(this),
            url = $('input[name="route_update_price_product"]').val(),
            pId = that.parents('.item-product').data('product-id'),
            qty = that.val();
        $.ajax({
            type: "GET",
            url: url,
            data: {
                id: pId,
                qty: qty
            },
            success: function(response) {
                that.parents('.item-product').find('td.unit-price').text(formatPrice(response[
                    'unit_price']));
                that.parents('.item-product').find('td.total-price').text(formatPrice(response[
                    'total']));
                var qtyDonateInput = that.parents('.item-product').find(
                    'td.qty_donate input[type="number"]');
                qtyDonateInput.val(response['qty_donate']);

                updateTotalOrder();
            },
            error: function(response) {
                handleAjaxError(response);
            }
        });

    }));
</script>
