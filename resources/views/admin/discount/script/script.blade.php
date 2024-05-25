<x-input type="hidden" name="route_create_add_discount_seller" :value="route('admin.discount.create')" />
< <script>
    $(document).ready(function() {
        $('.edit-btn').click(function() {
            var row = $(this).closest('tr');
            row.find('.display-value').hide();
            row.find('.edit-input').show();
            row.find('.edit-btn').hide();
            row.find('.save-btn').show();
        });

        $('.save-btn').click(function() {
            var row = $(this).closest('tr');
            var newValue = row.find('.input-value').val();
            var id = $(this).data('id');
            var url = $(this).data('url');
            var unit = $(this).data('unit');

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    newValue: newValue,
                    id: id,
                    unit: unit,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    row.find('.display-value').text(newValue + ' %');
                    row.find('.display-value').show();
                    row.find('.edit-input').hide();
                    row.find('.edit-btn').show();
                    row.find('.save-btn').hide();
                }

            })
        })

    });

    $(document).ready(function(e) {
        addSelect2();

        $("#btnAddDiscountSeller").click(function(e) {
            var elm = $("#wrapLoopDiscountSeller"),
                url = $("input[name='route_create_add_discount_seller']").val();
            $.ajax({
                type: "get",
                url: url,
                success: function(response) {
                    elm.append(response);
                },
                error: function(response) {
                    handleAjaxError(response);
                }
            });
        });
    });


    $(document).on('click', '.btn-delete-item-discount', function(e) {
        if (!confirm('Bạn có chắc muốn xóa?')) {
            return false;
        }
        $(this).parents('.item-discount').remove();
    });


    // seller
    $(document).ready(function() {
        $(document).on('click', '#editDiscountSeller', function(e) {
            var itemId = $(this).data('item-id');
            var url = $(this).data('url');
        
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    $("input[name='id']").val(response.id)
                    $("input[name='product_name']").val(response.product.name)
                    $("input[name='product_id']").val(response.product_id)
                    $("input[name='qty']").val(response.qty)
                    $("input[name='qty_donate']").val(response.qty_donate)
                },
                error: function(error) {
                    console.log(error);
                }
            });
        })
    })
</script>
