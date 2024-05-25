<script>
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

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    newValue: newValue,
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    row.find('.display-value').html(newValue + ' <span class="badge bg-orange-lt">@lang('đồng')</span>');
                    row.find('.display-value').show();
                    row.find('.edit-input').hide();
                    row.find('.edit-btn').show();
                    row.find('.save-btn').hide();
                }

            })
        })

    });
</script>
