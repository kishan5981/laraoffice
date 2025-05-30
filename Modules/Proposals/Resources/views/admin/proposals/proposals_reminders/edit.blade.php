@extends('layouts.app')

@section('content')
    @include('proposals::admin.proposals.invoice.invoice-menu', ['invoice' => $proposal])

    <h3 class="page-title">@lang('global.proposals-reminders.title')</h3>
    
    {!! Form::model($proposals_reminder, ['method' => 'PUT', 'route' => ['admin.proposal_reminders.update', $proposals_reminder->proposal_id, $proposals_reminder->id],'class'=>'formvalidation']) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            @include('proposals::admin.proposals.proposals_reminders.form-fields', compact('enum_isnotified', 'enum_notify_by_email', 'proposals', 'reminder_tos', 'created_bies', 'proposal'))            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

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
                minDate: 'now'
            });
            
        });
    </script>
            
@stop