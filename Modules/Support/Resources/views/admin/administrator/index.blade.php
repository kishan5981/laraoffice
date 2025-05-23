@extends('layouts.app')

@section('page')
    {{ trans('support::admin.administrator-index-title') }}
@stop
<?php use Collective\Html\FormFacade as CollectiveForm; ?>
@section('content')
    @include('support::shared.header')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>ADMINISTRATOR MANAGEMENT
                {!! link_to_route(
                                    'admin.administrator.create',
                                    'ADD NEW ADMINISTRATOR', null,
                                    ['class' => 'btn btn-primary pull-right'])
                !!}
            </h2>
        </div>

        @if ($administrators->isEmpty())
            <h3 class="text-center">{{ trans('support::admin.administrator-index-no-administrators') }}
                {!! link_to_route('admin.administrator.create', 'ADD NEW ADMINISTRATOR') !!}
            </h3>
        @else
            <div id="message"></div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Remove from administrators</td>
                </tr>
                </thead>
                <tbody>
                @foreach($administrators as $administrator)
                    <tr>
                        <td>
                            {{ $administrator->id }}
                        </td>
                        <td>
                            {{ $administrator->name }}
                        </td>
                        <td>
                            {!! CollectiveForm::open([
                            'method' => 'DELETE',
                            'route' => [
                                        'admin.administrator.destroy',
                                        $administrator->id
                                        ],
                            'id' => "delete-$administrator->id"
                            ]) !!}
                            {!! CollectiveForm::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! CollectiveForm::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endif
    </div>
@stop
