@extends('layouts.app')

@section('content')

    <h3 class="page-title">@lang('global.contact-types.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.contact_types.store'],'class'=>'formvalidation']) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-6">
                <div class="form-group">
                    {!! Form::label('title', trans('global.contact-types.fields.name').'*', ['class' => 'control-label form-label']) !!}
                    <div class="form-line">
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => trans('global.contact-types.fields.name'), 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
                </div>
                </div>

                <div class="col-xs-6">
                <div class="form-group">
                    {!! Form::label('description', trans('global.contact-types.fields.description').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control ', 'placeholder' => '','rows'=>'3']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger wave-effect']) !!}
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

