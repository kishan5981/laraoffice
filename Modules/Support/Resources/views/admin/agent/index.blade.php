@extends('layouts.app')


@section('page')
    {{ trans('support::admin.agent-index-title') }}
@stop
<?php use Collective\Html\FormFacade as CollectiveForm; ?>
@section('content')
    @include('support::shared.header')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>AGENT MANAGEMENT
                {!! link_to_route(
                                   'admin.agent.create',
                                    'CREATE NEW AGENT', null,
                                    ['class' => 'btn btn-primary pull-right'])
                !!}
                <!-- <a href="{{route('admin.agent.create')}}" class="btn btn-priamary pull-right">CREATE NEW AGENT</a> -->
            </h2>
        </div>

        @if ($agents->isEmpty())
            <h3 class="text-center">{{ trans('support::admin.agent-index-no-agents') }}
                {!! link_to_route('admin.agent.create', 'CREATE NEW AGENT') !!}
            </h3>
        @else
            <div id="message"></div>
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Categories</td>
                        <td>Joined Categories</td>
                        <td>Remove from Agents</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($agents as $agent)
                    <tr>
                        <td>
                            {{ $agent->id }}
                        </td>
                        <td>
                            {{ $agent->name }}
                        </td>
                        <td>
                            @foreach($agent->categories as $category)
                                <span style="color: {{ $category->color }}">
                                    {{  $category->name }}
                                </span>
                            @endforeach
                        </td>
                        <td>
                            {!! CollectiveForm::open([
                                            'method' => 'PATCH',
                                            'route' => [
                                                        'admin.agent.update',
                                                        $agent->id
                                                        ],
                                            ]) !!}
                            @foreach(\Modules\Support\Entities\Category::all() as $agent_cat)
                                <input name="agent_cats[]"
                                       type="checkbox"
                                       value="{{ $agent_cat->id }}"
                                       {!! ($agent_cat->agents()->where("id", $agent->id)->count() > 0) ? "checked" : ""  !!}
                                       > {{ $agent_cat->name }}
                            @endforeach
                            {!! CollectiveForm::submit('Join', ['class' => 'btn btn-info btn-sm']) !!}
                            {!! CollectiveForm::close() !!}
                        </td>
                        <td>
                            {!! CollectiveForm::open([
                            'method' => 'DELETE',
                            'route' => [
                                        'admin.agent.destroy',
                                        $agent->id
                                        ],
                            'id' => "delete-$agent->id"
                            ]) !!}
                            {!! CollectiveForm::submit('Remove', ['class' => 'btn btn-danger']) !!}
                            {!! CollectiveForm::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endif
    </div>
@stop
