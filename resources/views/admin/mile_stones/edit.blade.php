@extends('layouts.app')

@section('content')
    @include('admin.client_projects.operations.menu', array( 'client_project' => $project))
    
    <h3 class="page-title">@lang('global.mile-stones.title')</h3>
    
    {!! Form::model($mile_stone, ['method' => 'PUT', 'route' => ['admin.mile_stones.update', $project->id, $mile_stone->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            @include('admin.mile_stones.form-fields', compact('mile_stone', 'project'))            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger wave-effect']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    @include('admin.common.standard-ckeditor')

    <script src="{{ asset('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });
            
        });
    </script>

    <link href="{{ asset('css/cdn-styles-css/bootstrap/2.5.3/bootstrap-colorpicker.min.css') }}" rel="stylesheet"> 
    <script src="{{ asset('js/cdn-js-files/bootstrap/2.5.3') }}/bootstrap-colorpicker.min.js"></script>
    <script>
        $('.colorpicker').colorpicker();
    </script>
            
@stop