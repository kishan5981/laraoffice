@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.credit_notes.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-9">
                    @include('admin.credit_notes.invoice.invoice', compact('invoice'))
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.credit_notes.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
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
            
@stop
