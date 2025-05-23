@extends('layouts.app')
@section('page', trans('support::admin.administrator-create-title'))
<?php use Collective\Html\FormFacade as CollectiveForm; ?>
@section('content')
    @include('support::shared.header')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>ADD ADMINISTRATOR</h2>
        </div>
        @if ($users->isEmpty())
            <h3 class="text-center">{{ trans('support::admin.administrator-create-no-users') }}</h3>
        @else
            {!! CollectiveForm::open(['route'=> 'admin.administrator.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
            <div class="panel-body">
            Select user accounts to be added as administrators
            </div>
            <table class="table table-hover">
                <tfoot>
                    <tr>
                        <td class="text-center">
                            {!! link_to_route('admin.administrator.index', 'Back', null, ['class' => 'btn btn-default']) !!}
                            {!! CollectiveForm::submit('Submit', ['class' => 'btn btn-primary']) !!}
                        </td>
                    </tr>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <div class="checkbox">
                                <label>
                                    <input name="administrators[]" type="checkbox" value="{{ $user->id }}" {!! $user->support_admin ? "checked" : "" !!}> {{ $user->name }}
                                </label>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! CollectiveForm::close() !!}
        @endif
    </div>
    {!! $users->render() !!}
@stop
