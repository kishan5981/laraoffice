@extends('layouts.app')

@section('content')

    <h3 class="page-title">@lang('global.permissions.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.permissions.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', trans('global.permissions.fields.title').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-success wave-effect']) !!}
    {!! Form::button(trans('global.app_Cancel'), ['class' => 'btn btn-secondary wave-effect','id' => 'cancelButton', 'name' => 'Cancel','value' => 'Cancel']) !!}

    {!! Form::close() !!}
@stop
@section('javascript') 
<script>
    document.getElementById('cancelButton').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default form submission behavior
        window.history.back(); // Go back in the browser's history
    });
</script>
@endsection

