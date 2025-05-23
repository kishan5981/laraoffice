@extends('layouts.app')

@section('page', trans('support::admin.status-edit-title', ['name' => ucwords($status->name)]))
<?php use Collective\Html\FormFacade as CollectiveForm; ?>
@section('content')
    @include('support::shared.header')
    <div class="well bs-component">
        {!! CollectiveForm::model($status, [
                                    'route' => ['admin.status.update', $status->id],
                                    'method' => 'PATCH',
                                    'class' => 'form-horizontal'
                                    ]) !!}
        <legend>Edit Status: {{ucwords($status->name) }}</legend>
        @include('support::admin.status.form', ['update', true])
        {!! CollectiveForm::close() !!}
    </div>
@stop
