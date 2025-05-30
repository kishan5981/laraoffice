@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')

    <h3 class="page-title">@lang('global.content-categories.title')</h3>
    @can('content_category_create')
    <p>
        <a href="{{ route('admin.content_categories.create') }}" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($content_categories) > 0 ? 'datatable' : '' }} @can('content_category_delete_multi') dt-select @endcan">
                <thead>
                    <tr>
                        @can('content_category_delete_multi')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('global.content-categories.fields.title')</th>
                        <th>@lang('global.content-categories.fields.slug')</th>
                        @if ( ! config('app.action_buttons_hover') )
                            <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($content_categories) > 0)
                        @foreach ($content_categories as $content_category)
                            <tr data-entry-id="{{ $content_category->id }}">
                                @can('content_category_delete_multi')
                                    <td></td>
                                @endcan

                                <td field-key='title'>
                                    {{ $content_category->title }}
                                    @if ( config('app.action_buttons_hover') )
                                        <br>{!! view('actionsTemplateHover', ['row' => $content_category, 'gateKey' => 'content_category_', 'routeKey' => 'admin.content_categories']) !!}
                                    @endif
                                </td>
                                <td field-key='slug'>{{ $content_category->slug }}</td>
                                @if ( ! config('app.action_buttons_hover') )
                                <td>
                                    @can('content_category_view')
                                    <a href="{{ route('admin.content_categories.show',[$content_category->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('content_category_edit')
                                    <a href="{{ route('admin.content_categories.edit',[$content_category->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('content_category_delete_multi')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.content_categories.destroy', $content_category->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('content_category_delete_multi')
            window.route_mass_crud_entries_destroy = '{{ route('admin.content_categories.mass_destroy') }}';
        @endcan
        window.dtDefaultOptions.buttons = [];

    </script>
@endsection