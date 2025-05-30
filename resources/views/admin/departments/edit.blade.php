@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.departments.title')</h3>
    
    {!! Form::model($department, ['method' => 'PUT', 'route' => ['admin.departments.update', $department->id],'class'=>'formvalidation']) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            @include('admin.departments.form-fields')            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger wave-effect']) !!}
    {!! Form::submit(trans('global.app_Cancel'), ['class' => 'btn btn-secondary wave-effect', 'name' => 'Cancel','value' => 'Cancel']) !!}

    {!! Form::close() !!}
@stop

