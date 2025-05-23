@extends($master)

@section('page')
    {{ trans('support::lang.index-title') }}
@stop

@section('content')
    @include('support::shared.header')
    @include('support::tickets.index')
@stop

@section('footer')
	<script src="https://cdn.datatables.net/v/bs/dt-{{ Modules\Support\Helpers\Cdn::DataTables }}/r-{{ Modules\Support\Helpers\Cdn::DataTablesResponsive }}/datatables.min.js"></script>
	<script>
	    $('.table').DataTable({
	        processing: false,
	        serverSide: true,
	        responsive: true,
            pageLength: {{ $setting->grab('paginate_items') }},
        	lengthMenu: {{ json_encode($setting->grab('length_menu')) }},
	        ajax: '{!! route($setting->grab('main_route').'.data', $complete) !!}',
	        language: {
				decimal:        "{{ trans('support::lang.table-decimal') }}",
				emptyTable:     "{{ trans('support::lang.table-empty') }}",
				info:           "{{ trans('support::lang.table-info') }}",
				infoEmpty:      "{{ trans('support::lang.table-info-empty') }}",
				infoFiltered:   "{{ trans('support::lang.table-info-filtered') }}",
				infoPostFix:    "{{ trans('support::lang.table-info-postfix') }}",
				thousands:      "{{ trans('support::lang.table-thousands') }}",
				lengthMenu:     "{{ trans('support::lang.table-length-menu') }}",
				loadingRecords: "{{ trans('support::lang.table-loading-results') }}",
				processing:     "{{ trans('support::lang.table-processing') }}",
				search:         "{{ trans('support::lang.table-search') }}",
				zeroRecords:    "{{ trans('support::lang.table-zero-records') }}",
				paginate: {
					first:      "{{ trans('support::lang.table-paginate-first') }}",
					last:       "{{ trans('support::lang.table-paginate-last') }}",
					next:       "{{ trans('support::lang.table-paginate-next') }}",
					previous:   "{{ trans('support::lang.table-paginate-prev') }}"
				},
				aria: {
					sortAscending:  "{{ trans('support::lang.table-aria-sort-asc') }}",
					sortDescending: "{{ trans('support::lang.table-aria-sort-desc') }}"
				},
			},
	        columns: [
	            { data: 'id', name: 'ticketit.id' },
	            { data: 'subject', name: 'subject' },
	            { data: 'status', name: 'ticketit_statuses.name' },
	            { data: 'updated_at', name: 'ticketit.updated_at' },
            	{ data: 'agent', name: 'users.name' },
	            @if( $u->isAgent() || $u->isAdmin() )
		            { data: 'priority', name: 'ticketit_priorities.name' },
	            	{ data: 'owner', name: 'users.name' },
		            { data: 'category', name: 'ticketit_categories.name' }
	            @endif
	        ]
	    });
	</script>
@append
