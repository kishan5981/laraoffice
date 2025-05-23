@extends('layouts.app')
@section('page', trans('support::admin.status-create-title'))
<?php use Collective\Html\FormFacade as CollectiveForm; ?>
@section('content')
    @include('support::shared.header')
    <div class="well bs-component">
        {!! CollectiveForm::open(['route'=> 'admin.status.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
            <legend>{{ trans('support::admin.status-create-title') }}</legend>
            @include('support::admin.status.form')
        {!! CollectiveForm::close() !!}
    </div>
@stop
