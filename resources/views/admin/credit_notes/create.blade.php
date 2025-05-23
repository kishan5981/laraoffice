@extends('layouts.app')

@section('content')

    <h3 class="page-title">@lang('global.credit_notes.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.credit_notes.store'],'class'=>'formvalidation']) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body credit_n-create">
            @include('admin.credit_notes.form-fields')

             {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger wave-effect']) !!}
    {!! Form::submit(trans('custom.common.save-manage'), ['class' => 'btn btn-info wave-effect', 'name' => 'btnsavemanage', 'value' => 'savemanage']) !!}
    {!! Form::submit(trans('custom.common.save-send'), ['class' => 'btn btn-success wave-effect', 'name' => 'btnsavesend', 'value' => 'savesend']) !!}
    {!! Form::button(trans('global.app_Cancel'), ['class' => 'btn btn-secondary wave-effect','id' => 'cancelButton', 'name' => 'Cancel','value' => 'Cancel']) !!}
    {!! Form::close() !!}

@include('admin.common.modal-loading-submit')


        </div>
    </div>

   
 
@stop

@section('javascript')
    @parent
    
    @include('admin.common.standard-ckeditor')

    @include('admin.common.scripts')
    @include('admin.common.modal-scripts')
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

    <script>
        $("#selectbtn-allowed_paymodes").click(function(){
            $("#selectall-allowed_paymodes > option").prop("selected","selected");
            $("#selectall-allowed_paymodes").trigger("change");
        });
        $("#deselectbtn-allowed_paymodes").click(function(){
            $("#selectall-allowed_paymodes > option").prop("selected","");
            $("#selectall-allowed_paymodes").trigger("change");
        });
        _token: '{{ csrf_token() }}'
    </script>            
@stop