@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.recurring-periods.title')</h3>
    
    {!! Form::model($recurring_period, ['method' => 'PUT', 'route' => ['admin.recurring_periods.update', $recurring_period->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body recurring_p-edit">
            @include('recurringperiods::admin.recurring_periods.form-fields')
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger wave-effect']) !!}
    {!! Form::submit(trans('global.app_Cancel'), ['class' => 'btn btn-secondary wave-effect', 'name' => 'Cancel','value' => 'Cancel']) !!}

    {!! Form::close() !!}
@stop

