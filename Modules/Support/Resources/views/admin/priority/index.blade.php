@extends('layouts.app')

@section('page')
    {{ trans('support::admin.priority-index-title') }}
@stop
<?php use Collective\Html\FormFacade as CollectiveForm; ?>
@section('content')
    @include('support::shared.header')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>PRIORITIES MANAGEMENT
            {!! link_to_route(
                                    'admin.priority.create',
                                    'ADD NEW PRIORITY', null,
                                    ['class' => 'btn btn-primary pull-right'])
                !!}
               
            </h2>
        </div>

        @if ($priorities->isEmpty())
            <h3 class="text-center">There are no priorities
                {!! link_to_route('admin.priority.create', trans('support::admin.priority-index-create-new')) !!}
            </h3>
        @else
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
                @foreach($priorities as $priority)
                    <tr>
                        <td style="vertical-align: middle">
                            {{ $priority->id }}
                        </td>
                        <td style="color: {{ $priority->color }}; vertical-align: middle">
                            {{ $priority->name }}
                        </td>
                        <td>
                        {!! link_to_route(
                                                    'admin.priority.edit', 'Edit', $priority->id,
                                                    ['class' => 'btn btn-info'] )
                                !!}

                                {!! link_to_route(
                                                    'admin.priority.destroy','Delete', $priority->id,
                                                    [
                                                    'class' => 'btn btn-danger deleteit',
                                                    'form' => "delete-$priority->id",
                                                    "node" => $priority->name
                                                    ])
                                !!}
                            {!! CollectiveForm::open([
                                            'method' => 'DELETE',
                                            'route' => [
                                                        'admin.priority.destroy',
                                                        $priority->id
                                                        ],
                                            'id' => "delete-$priority->id"
                                            ])
                            !!}
                            {!! CollectiveForm::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@stop
@section('footer')
    <script>
       
            $(document).on('click', '.deleteit', function(event){
            event.preventDefault();
            if (confirm("{!! trans('Deleting Priority ') !!}" + $(this).attr("node") + " ?"))
            {
                $form = $(this).attr("form");
                $("#" + $form).submit();
            }

        });
    </script>
@append
