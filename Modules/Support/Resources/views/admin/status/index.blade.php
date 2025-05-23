@extends('layouts.app')


@section('page')
    {{ trans('support::admin.status-index-title') }}
@stop
<?php use Collective\Html\FormFacade as CollectiveForm; ?>
@section('content')
    @include('support::shared.header')
    <div class="panel panel-default">
        <div class="panel-heading">
        <h2>STATUS MANAGEMENT
            {!! link_to_route(
                                    'admin.status.create',
                                    'ADD NEW STATUS', null,
                                    ['class' => 'btn btn-primary pull-right'])
                !!}
                </h2>
        </div>

        @if ($statuses->isEmpty())
          
            <a href="{{route('admin.status.create')}}" class="btn btn-priamary pull-right">CREATE NEW STATUS</a>
        @else
        <div class="panel-body">
            <div id="message"></div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($statuses as $status)
                    <tr>
                        <td style="vertical-align: middle">
                            {{ $status->id }}
                        </td>
                        <td style="color: {{ $status->color }}; vertical-align: middle">
                            {{ $status->name }}
                        </td>
                        <td>
                        {!! link_to_route(
                                                    'admin.status.edit', 'Edit', $status->id,
                                                    ['class' => 'btn btn-info'] )
                                !!}

                                {!! link_to_route(
                                                    'admin.status.destroy','Delete', $status->id,
                                                    [
                                                    'class' => 'btn btn-danger deleteit',
                                                    'form' => "delete-$status->id",
                                                    "node" => $status->name
                                                    ])
                                !!}
                            {!! CollectiveForm::open([
                                            'method' => 'DELETE',
                                            'route' => [
                                                        'admin.status.destroy',
                                                        $status->id
                                                        ],
                                            'id' => "delete-$status->id"
                                            ])
                            !!}
                            {!! CollectiveForm::close() !!}
                           
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
</div>
        @endif
    </div>
@stop
@section('footer')
    <script>
       $(document).on('click', '.deleteit', function(event){
            event.preventDefault();
            if (confirm("{!! trans('Deleting Status ') !!}" + $(this).attr("node") + " ?"))
            {
                $form = $(this).attr("form");
                $("#" + $form).submit();
            }

        });
    </script>
@append
