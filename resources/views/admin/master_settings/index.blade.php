@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')

    <h3 class="page-title">@lang('global.master-settings.title')</h3>
    @can('master_setting_create')
    <p>
        <a href="{{ route('admin.master_settings.create') }}" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.master_settings.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')
                   <span class="badge"> 
            
               {{\App\Models\MasterSetting::count()}}
                        </span>
            </a></li> 
            @can('master_setting_delete')
            |
            <li><a href="{{ route('admin.master_settings.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')

                 <span class="badge"> 
           
               {{\App\Models\MasterSetting::onlyTrashed()->count()}}
                       </span>
            </a></li>
            @endcan
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('master_setting_delete_multi') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('master_setting_delete_multi')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.master-settings.fields.module')</th>
                        <th>@lang('global.master-settings.fields.key')</th>
                        <th>@lang('custom.settings.moduletype')</th>
                        <th>@lang('global.master-settings.fields.description')</th>
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
        @can('master_setting_delete_multi')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.master_settings.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.master_settings.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('master_setting_delete_multi')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'module', name: 'module'},
                {data: 'key', name: 'key'},
                {data: 'moduletype', name: 'moduletype'},
                {data: 'description', name: 'description'},
                
                //{data: 'actions', name: 'actions', searchable: false, sortable: false}
                @if ( ! config('app.action_buttons_hover') )
            {data: 'actions', name: 'actions', searchable: false, sortable: false}
            @endif
            ];
            processAjaxTables();
        });
    </script>
@endsection