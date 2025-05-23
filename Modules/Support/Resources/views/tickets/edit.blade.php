@extends('layouts.app')

@section('content')

@include('support::shared.nav')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<div class="panel panel-default">

   

    <div class="panel-body">
        <div class="well bs-component">
            {!! Form::model($ticket, [
                'route' => ['admin.support.update', $ticket->id],
                'method' => 'PATCH',
                'class' => 'form-horizontal',
                'novalidate' => 'novalidate'
            ]) !!}
            <legend class="page-title">Edit Ticket</legend>
            <div class="form-group">
                {!! Form::label('subject', 'Subject:', ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::text('subject', $ticket->subject, ['class' => 'form-control', 'required' => 'required']) !!}
                    <span class="help-block">A brief of your issue ticket</span>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('content', 'Description:', ['class' => 'col-lg-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::textarea('content', htmlentities($ticket->html), ['class' => 'form-control summernote-editor', 'rows' => '5', 'required' => 'required']) !!}
                    <span class="help-block">Describe your issue here in details</span>
                </div>
            </div>
            <div class="form-inline row">
                <div class="form-group col-lg-4">
                    {!! Form::label('priority', 'Priority:', ['class' => 'col-lg-6 control-label']) !!}
                    <div class="col-lg-6">
                        {!! Form::select('priority_id', $priority_lists, $ticket->priority_id, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    {!! Form::label('category', 'Category:', ['class' => 'col-lg-6 control-label']) !!}
                    <div class="col-lg-6">
                        {!! Form::select('category_id', $category_lists, $ticket->category_id, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                </div>
                {!! Form::hidden('agent_id', 'auto') !!}
            </div>
            <br>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    {!! link_to_route('admin.support.index', 'Back', null, ['class' => 'btn btn-default']) !!}
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

</div>

@endsection
