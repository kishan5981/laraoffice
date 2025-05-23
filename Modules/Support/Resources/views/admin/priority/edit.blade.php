@extends('layouts.app')
@section('page', trans('support::admin.priority-edit-title', ['name' => ucwords($priority->name)]))
<?php use Collective\Html\FormFacade as CollectiveForm; ?>
@section('content')
    @include('support::shared.header')
    <div class="well bs-component">
        {!! CollectiveForm::model($priority, [
                                    'route' => ['admin.priority.update', $priority->id],
                                    'method' => 'PATCH',
                                    'class' => 'form-horizontal'
                                    ]) !!}
        <legend>EDIT PRIORITY:{{ucwords($priority->name)}}</legend>
        @include('support::admin.priority.form', ['update', true])
        {!! CollectiveForm::close() !!}
    </div>
@stop
