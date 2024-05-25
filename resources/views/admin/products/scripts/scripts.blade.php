<x-input type="hidden" name="route_create_product_purchase_qty" :value="route('admin.product_purchase_qty.create')" />
<script>
$(document).ready(function(){
    $("#btnAddPurchaseQty").click(function(e){
        var elm = $("#wrapLoopPurchaseQty"), 
            url = $("input[name='route_create_product_purchase_qty']").val();
        $.ajax({
            type: "get",
            url: url,
            success: function (response) {
                console.log(response);
                elm.append(response);
            },
            error: function(response) {
                handleAjaxError(response);
            }
        });
    });
});
$(document).on('click', '.btn-delete-item-purchase-qty', function (e) { 
    if(!confirm('Bạn có chắc muốn xóa?')){
        return false;
    }
    $(this).parents('.item-purchase-qty').remove();
});
</script>
