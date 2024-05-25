<x-input type="hidden" name="route_search_select_user" :value="route('admin.search.select.user')" />
<x-input type="hidden" name="route_render_info_shipping" :value="route('admin.order.render_info_shipping')" />
<x-input type="hidden" name="route_search_render_product" :value="route('admin.search.render_product')" />
<x-input type="hidden" name="route_calculate_total_before_save_order" :value="route('admin.order.calculate_total_before_save_order')" />
<x-input type="hidden" name="route_delete_item_order_detail" :value="route('admin.order_detail.delete')" />
<x-input type="hidden" name="route_add_product" :value="route('admin.order.add_product')" />
<x-input type="hidden" name="route_update_price_product" :value="route('admin.order.route_update_price_product')" />
<script>

    $(document).ready(function(e) {
        select2LoadData($('input[name="route_search_select_user"]').val());
        searchProduct('', '#showSearchResultProduct');
        $("#inputSearchProduct").keyup($.debounce(500, function(e) {
            searchProduct($(this).val(), '#showSearchResultProduct');
        }));
    });

</script>
