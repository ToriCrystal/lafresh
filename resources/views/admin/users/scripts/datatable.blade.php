<script>
    function searchColumsDataTable(datatable) {
        datatable.api().columns([0, 1, 2, 3, 4, 5, 6]).every(function() {
        datatable.api().columns([0, 1, 2, 3, 4, 5, 6]).every(function() {
            var column = this;
            var input = document.createElement("input");
            if (column.selector.cols == 6) {
            if (column.selector.cols == 6) {
                input.setAttribute('type', 'date');
            } else if (column.selector.cols == 4 ){
                input = document.createElement("select");
                createSelectColumnUniqueDatatableAll(input, @json($roles))
            }
            input.setAttribute('placeholder', 'Nhập từ khóa');
            input.setAttribute('class', 'form-control');

            $(input).appendTo($(column.footer()).empty())
                .on('change', function() {
                    column.search($(this).val(), false, false, true).draw();
                });
        });
    }
    $(document).ready(function() {
        // define columns for the datatables
        columns = window.LaravelDataTables["userTable"].columns();
        toggleColumnsDatatable(columns);
    });
</script>
