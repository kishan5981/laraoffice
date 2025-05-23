<script>
    $(document).ready(function () {
        var dataTable = $('.ajaxTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.home.dashboard-widgets-all') !!}',
            columns: [
                {data: null, name: 'serial', orderable: false, searchable: false, render: function (data, type, full, meta) {
                    // Calculate serial number based on current page and page length
                    var currentPage = dataTable.page.info().page;
                    var pageSize = dataTable.page.info().length;
                    return currentPage * pageSize + meta.row + 1;
                }},
                {data: 'title', name: 'title'},
                {data: 'status', name: 'status'},
                {data: 'type', name: 'type'},
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ],
            responsive: true // Enable responsive mode
        });
    });
</script>
