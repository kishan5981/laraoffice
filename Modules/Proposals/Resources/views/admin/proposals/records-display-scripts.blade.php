<script>
    @can('recurring_invoice_delete')
        @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.proposals.mass_destroy') }}'; @endif
    @endcan
    $(document).ready(function () {
        @if ( ! empty( $type ) && ! empty( $type_id ) )
            window.dtDefaultOptionsNew.ajax.url = '{!! route('admin.list-proposals.index', [ 'type' => $type, 'type_id' => $type_id ]) !!}?show_deleted={{ request('show_deleted') }}';
        @else
            window.dtDefaultOptionsNew.ajax.url = '{!! route('admin.proposals.index') !!}?show_deleted={{ request('show_deleted') }}';
        @endif
        window.dtDefaultOptionsNew.columns = [@can('recurring_invoice_delete')
            @if ( request('show_deleted') != 1 )
                {data: 'massDelete', name: 'id', searchable: false, sortable: false},
            @endif
            @endcan
            {data: 'invoice_no', name: 'invoice_no'},
            {data: 'title', name: 'title'},
            {data: 'customer.first_name', name: 'customer.first_name'},
            {data: 'amount', name: 'amount'},
            {data: 'paymentstatus', name: 'paymentstatus'},
            
            {data: 'status', name: 'status'},
            {data: 'invoice_date', name: 'invoice_date'},
            {data: 'invoice_due_date', name: 'invoice_due_date'},  
            //{data: 'actions', name: 'actions', searchable: false, sortable: false}          
           
            @if ( ! config('app.action_buttons_hover') )
            {data: 'actions', name: 'actions', searchable: false, sortable: false}
            @endif
        ];
        processAjaxTablesNew();
    });
</script>