@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')

    <h3 class="page-title">@lang('global.content-tags.title')</h3>
    @can('content_tag_create')
    <p>
        <a href="{{ route('admin.content_tags.create') }}" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($content_tags) > 0 ? 'datatable' : '' }} @can('content_tag_delete_multi') dt-select @endcan">
                <thead>
                    <tr>
                        @can('content_tag_delete_multi')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('global.content-tags.fields.title')</th>
                        <th>@lang('global.content-tags.fields.slug')</th>
                        @if ( ! config('app.action_buttons_hover') )
                            <th>&nbsp;</th>
                        @endif

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($content_tags) > 0)
                        @foreach ($content_tags as $content_tag)
                            <tr data-entry-id="{{ $content_tag->id }}">
                                @can('content_tag_delete_multi')
                                    <td></td>
                                @endcan

                                <td field-key='title'>
                                    {{ $content_tag->title }}
                                    @if ( config('app.action_buttons_hover') )
                                        <br>{!! view('actionsTemplateHover', ['row' => $content_tag, 'gateKey' => 'content_tag_', 'routeKey' => 'admin.content_tags']) !!}
                                    @endif
                                </td>
                                <td field-key='slug'>{{ $content_tag->slug }}</td>
                                @if ( ! config('app.action_buttons_hover') )
                                <td>
                                    @can('content_tag_view')
                                    <a href="{{ route('admin.content_tags.show',[$content_tag->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('content_tag_edit')
                                    <a href="{{ route('admin.content_tags.edit',[$content_tag->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('content_tag_delete_multi')
                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.content_tags.destroy', $content_tag->id])) !!}
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
        @can('content_tag_delete_multi')
            window.route_mass_crud_entries_destroy = '{{ route('admin.content_tags.mass_destroy') }}';
            
        @endcan
        

    </script>
@endsection