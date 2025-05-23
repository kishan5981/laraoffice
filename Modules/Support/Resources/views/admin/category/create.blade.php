@extends('layouts.app')
@section('page', trans('support::admin.category-create-title'))
<?php use Collective\Html\FormFacade as CollectiveForm; ?>
@section('content')
    <div class="well bs-component">
        {!! CollectiveForm::open(['route'=> 'admin.category.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
            <legend>Create New Category</legend>
            @include('support::admin.category.form')
        {!! CollectiveForm::close() !!}
    </div>
@stop
