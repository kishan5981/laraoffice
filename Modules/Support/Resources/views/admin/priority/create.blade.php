@extends('layouts.app')

@section('page', trans('support::admin.priority-create-title'))
<?php use Collective\Html\FormFacade as CollectiveForm; ?>
@section('content')
    @include('support::shared.header')
    <div class="well bs-component">
        {!! CollectiveForm::open(['route'=> 'admin.priority.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
            <legend>{{ trans('Create Priority') }}</legend>
            @include('support::admin.priority.form')
        {!! CollectiveForm::close() !!}
    </div>
@stop
