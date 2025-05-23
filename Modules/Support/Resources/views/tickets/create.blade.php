@extends('layouts.app')

@section('page', trans('support::lang.create-ticket-title'))

@section('content')
@include('support::shared.header')
    <div class="well bs-component">
        {!! Form::open([
                        'route'=>'admin.support.store',
                        'method' => 'POST',
                        'class' => 'form-horizontal',
                        'novalidate' => 'novalidate'
                        ]) !!}
            <legend class="page-title">Create New Ticket</legend>
            <div class="form-group">
                {!! Form::label('subject', 'Subject :' , ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('subject', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <span class="help-block">A brief of your issue ticket</span>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('content', 'Description :' , ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                {{-- <textarea id="summernote" name="content"></textarea>  --}}
                {!! Form::textarea('content', null, ['class' => 'form-control summernote-editor', 'rows' => '5', 'required' => 'required']) !!}
                    <span class="help-block">Describe your issue here in details</span>
                </div>
            </div>
            <div class="form-inline row">
                <div class="form-group col-lg-4">
                    {!! Form::label('priority', 'Priority :' , ['class' => 'col-lg-6 control-label']) !!}
                    <div class="col-lg-6">
                        {!! Form::select('priority_id', $priorities, null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    {!! Form::label('category', 'Category :' , ['class' => 'col-lg-6 control-label']) !!}
                    <div class="col-lg-6">
                        {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                </div>
                {!! Form::hidden('agent_id', 'auto') !!}
            </div>
            <br>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    {!! link_to_route('admin.support.index', 'Back', null, ['class' => 'btn btn-default']) !!}
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('footer')
    @include('support::tickets.partials.summernote')
@append
