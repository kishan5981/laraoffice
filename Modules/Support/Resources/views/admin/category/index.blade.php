@extends('layouts.app')

@section('page')
    {{ trans('support::admin.category-index-title') }}
@stop
<?php use Collective\Html\FormFacade as CollectiveForm; ?>
@section('content')
    @include('support::shared.header')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>CATEGORIES MANAGEMENT
                {!! link_to_route(
                                    'admin.category.create',
                                    'ADD NEW CATEGORY', null,
                                    ['class' => 'btn btn-primary pull-right'])
                !!}
            </h2>
        </div>

        @if ($categories->isEmpty())
            <h3 class="text-center">{{ trans('support::admin.category-index-no-categories') }}
                {!! link_to_route('admin.category.create', 'ADD NEW CATEGORY') !!}
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
                @foreach($categories as $category)
                    <tr>
                        <td style="vertical-align: middle">
                            {{ $category->id }}
                        </td>
                        <td style="color: {{ $category->color }}; vertical-align: middle">
                            {{ $category->name }}
                        </td>
                        <td>
                            {!! link_to_route(
                                                    'admin.category.edit', 'Edit', $category->id,
                                                    ['class' => 'btn btn-info'] )
                                !!}

                                {!! link_to_route(
                                                    'admin.category.destroy','Delete', $category->id,
                                                    [
                                                    'class' => 'btn btn-danger deleteit',
                                                    'form' => "delete-$category->id",
                                                    "node" => $category->name
                                                    ])
                                !!}
                            {!! CollectiveForm::open([
                                            'method' => 'DELETE',
                                            'route' => [
                                                        'admin.category.destroy',
                                                        $category->id
                                                        ],
                                            'id' => "delete-$category->id"
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
      
            $(document).on('click', '.deleteit', function(){
            event.preventDefault();
            if (confirm("{!! trans('Deleting Category ') !!}" + $(this).attr("node") + " ?"))
            {
                var form = $(this).attr("form");
                $("#" + form).submit();
            }

        });
    </script>
@append
