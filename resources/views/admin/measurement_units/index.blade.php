@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')
@section('content')

<h3 class="page-title">@lang('global.measurement-units.title')</h3>
@can('measurement_unit_create')
<p>
   <a href="{{ route('admin.measurement_units.create') }}" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;@lang('global.app_add_new')</a>
   <a href="#" class="btn btn-warning" style="margin-left:5px;" data-toggle="modal" data-target="#myModal"><i class="fa fa-file-o"></i>&nbsp;@lang('global.app_csvImport')</a>
   @include('csvImport.modal', ['model' => 'MeasurementUnit', 'csvtemplatepath' => 'measurement_units.csv', 'duplicatecheck' => 'title'])
</p>
@endcan
<p>
<ul class="list-inline">
   <li><a href="{{ route('admin.measurement_units.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')
      <span class="badge">{{\App\Models\MeasurementUnit::count()}} </span>
      </a>
   </li>
   @can('measurement_unit_delete')
   |
   <li><a href="{{ route('admin.measurement_units.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')
      <span class="badge">{{\App\Models\MeasurementUnit::onlyTrashed()->count()}}</span>
      </a>
   </li>
   @endcan
</ul>
</p>
<div class="panel panel-default">
   <div class="panel-heading">
      @lang('global.app_list')
   </div>
   <div class="panel-body table-responsive">
      <table class="table table-bordered table-striped ajaxTable @can('measurement_unit_delete_multi') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
         <thead>
            <tr>
               @can('measurement_unit_delete_multi')
               @if ( request('show_deleted') != 1 )
               <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
               @endif
               @endcan
               <th>@lang('global.measurement-units.fields.title')</th>
               <th>@lang('global.measurement-units.fields.status')</th>
               <th>@lang('global.measurement-units.fields.description')</th>
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
   @can('measurement_unit_delete_multi')
       @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.measurement_units.mass_destroy') }}'; @endif
   @endcan
   $(document).ready(function () {
       window.dtDefaultOptions.buttons = [];
       window.dtDefaultOptions.ajax = '{!! route('admin.measurement_units.index') !!}?show_deleted={{ request('show_deleted') }}';
       window.dtDefaultOptions.columns = [@can('measurement_unit_delete_multi')
           @if ( request('show_deleted') != 1 )
               {data: 'massDelete', name: 'id', searchable: false, sortable: false},
           @endif
           @endcan{data: 'title', name: 'title'},
           {data: 'status', name: 'status'},
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
