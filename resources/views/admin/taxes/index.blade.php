@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')

    <h3 class="page-title">@lang('global.taxes.title')</h3>
    @can('tax_create')
    <p>
        <a href="{{ route('admin.taxes.create') }}" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;@lang('global.app_add_new')</a>  
        
    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.taxes.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')
          <span class="badge">{{\App\Models\Tax::count()}}</span>
            </a></li> 
            @can('tax_delete')|
            <li><a href="{{ route('admin.taxes.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')
                   <span class="badge"> {{\App\Models\Tax::onlyTrashed()->count()}}</span>
            </a></li>
            @endcan
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('tax_delete_multi') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('tax_delete_multi')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.taxes.fields.name')</th>
                        <th>@lang('global.taxes.fields.rate')</th>
                        <th>@lang('global.taxes.fields.rate-type')</th>
                        @if ( ! config('app.action_buttons_hover') )
                @if( request('show_deleted') == 1 )
                <th>&nbsp;</th>
                @else
                <th>&nbsp;</th>
                @endif
            @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('tax_delete_multi')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.taxes.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.buttons = [];
            window.dtDefaultOptions.ajax = '{!! route('admin.taxes.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('tax_delete_multi')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'name', name: 'name'},
                {data: 'rate', name: 'rate'},
                {data: 'rate_type', name: 'rate_type'},
                
                //{data: 'actions', name: 'actions', searchable: false, sortable: false}
                @if ( ! config('app.action_buttons_hover') )
            {data: 'actions', name: 'actions', searchable: false, sortable: false}
            @endif
            ];
            processAjaxTables();
        });
    </script>
@endsection