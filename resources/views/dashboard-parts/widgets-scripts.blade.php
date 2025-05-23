<script>
    $(document).ready(function () {
        var dataTable = $('.ajaxTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.home.dashboard-widgets', $role_id) !!}',
            columns: [
                {data: null, name: 'serial', orderable: false, searchable: false, render: function (data, type, full, meta) {
                    // Calculate serial number based on current page and page length
                    var currentPage = dataTable.page.info().page;
                    var pageSize = dataTable.page.info().length;
                    return currentPage * pageSize + meta.row + 1;
                }},
                {data: 'title', name: 'title'},
                {data: 'status', name: 'status'},
                {data: 'role.title', name: 'roles.title', searchable: false},
                {data: 'type', name: 'type'},
                @if ( ! config('app.action_buttons_hover') )
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
                @endif
            ],
            responsive: true // Enable responsive mode
        });
    });
</script>
