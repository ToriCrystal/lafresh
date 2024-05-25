<script>
    function searchColumsDataTable(datatable) {
        datatable.api().columns([0, 1]).every(function () {
            var column = this;
            var input = document.createElement("input");
            input.setAttribute('class', 'form-control');

            if(column.selector.cols == 1){
                input.setAttribute('type', 'date');
            }

            input.setAttribute('placeholder', 'Nhập từ khóa');

            $(input).appendTo($(column.footer()).empty())
            .on('change', function () {
                column.search($(this).val(), false, false, true).draw();
            });
        });
    }
    $(document).ready(function() {
        // define columns for the datatables
        columns = window.LaravelDataTables["pageTable"].columns();
        toggleColumnsDatatable(columns);
    });
</script>
