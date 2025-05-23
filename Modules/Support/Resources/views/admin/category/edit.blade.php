@extends('layouts.app')
@section('page', trans('support::admin.category-edit-title', ['name' => ucwords($category->name)]))
<?php use Collective\Html\FormFacade as CollectiveForm; ?>
@section('content')
    @include('support::shared.header')
    <div class="well bs-component">
        {!! CollectiveForm::model($category, [
                                    'route' => ['admin.category.update', $category->id],
                                    'method' => 'PATCH',
                                    'class' => 'form-horizontal'
                                    ]) !!}
        <legend>{{ trans('support::admin.category-edit-title', ['name' => ucwords($category->name)]) }}</legend>
        @include('support::admin.category.form', ['update', true])
        {!! CollectiveForm::close() !!}
    </div>
@stop
