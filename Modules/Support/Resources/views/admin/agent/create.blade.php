@extends('layouts.app')

@section('page', trans('support::admin.agent-create-title'))
<?php use Collective\Html\FormFacade as CollectiveForm; ?>
@section('content')
    @include('support::shared.header')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>ADD AGENT</h2>
        </div>
        @if ($users->isEmpty())
            <h3 class="text-center"></h3>
        @else
            {!! CollectiveForm::open(['route'=> 'admin.agent.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
            <div class="panel-body">
            Select user accounts to be added as agents
            </div>
            <table class="table table-hover">
                <tfoot>
                    <tr>
                        <td class="text-center">
                            {!! link_to_route('admin.agent.index', 'Back', null, ['class' => 'btn btn-default']) !!}
                            {!! CollectiveForm::submit('Submit', ['class' => 'btn btn-primary']) !!}
                        </td>
                    </tr>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <div class="checkbox">
                                <label>
                                    <input name="agents[]" type="checkbox" value="{{ $user->id }}" {!! $user->support_agent ? "checked" : "" !!}> {{ $user->name }}
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
