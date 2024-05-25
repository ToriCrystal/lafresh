<script>
    function searchColumsDataTable(datatable) {
        datatable.api().columns([2, 3, 4, 6, 8, 9]).every(function() {
            var column = this;
            var input = document.createElement("input");
            input.setAttribute('class', 'form-control');
            if (column.selector.cols == 8) {
                input.setAttribute('type', 'date');
            } else if (column.selector.cols == 3) {
                input = document.createElement("select");
                createSelectColumnUniqueDatatableAll(input, @json($in_stock));
            } else if (column.selector.cols == 4) {
                input = document.createElement("select");
                createSelectColumnUniqueDatatableAll(input, @json($status));
            } else if (column.selector.cols == 6) {
                input = document.createElement("select");
                createSelect2ColumnCategory(input, @json($categories));
            } else if (column.selector.cols == 9) {
                input = document.createElement("select");
                createSelectColumnUniqueDatatableAll(input, @json($unit));
            }

            input.setAttribute('placeholder', 'Nhập từ khóa');
            

            $(input).appendTo($(column.footer()).empty())
                .on('change', function() {
                    column.search($(this).val(), false, false, true).draw();
                });
        });
    }
    $(document).ready(function() {
        // define columns for the datatables
        columns = window.LaravelDataTables["productTable"].columns();
        toggleColumnsDatatable(columns);
    });
</script>
