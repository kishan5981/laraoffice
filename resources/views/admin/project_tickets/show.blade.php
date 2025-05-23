@extends('layouts.app')

@section('content')
    @include('admin.client_projects.operations.menu', array( 'client_project' => $project))
    
    <h3 class="page-title">@lang('global.client-projects.title-tickets')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">

                    <p> <strong>{{ trans('Subject') }}</strong>{{ trans('       ::       ') }}{{ $ticket->subject }}</p>

                    <p> <strong>{{ trans('Owner') }}</strong>{{ trans('         ::       ') }}{{ $ticket->user->name }}</p>
                    <p>
                        <strong>{{ trans('Status') }}</strong>{{ trans('        ::      ') }}
                        @if( $ticket->isComplete() && ! $ticket->status_id )
                            <span style="color: blue">Complete</span>
                        @else
                            <span style="color: {{ $ticket->status->color }}">{{ $ticket->status->name }}</span>
                        @endif

                    </p>
                    <p>
                        <strong>{{ trans('Priority') }}</strong>{{ trans('       ::        ') }}
                        <span style="color: {{ $ticket->priority->color }}">
                            {{ $ticket->priority->name }}
                        </span>
                    </p>

                     <p>
                        <strong>{{ trans('Description') }}</strong>{{ trans('     ::      ') }}{{ $ticket->content }}
                       
                    </p>
                </div>
                <div class="col-md-6">
                    <p> <strong>{{ trans('Agent') }}</strong>{{ trans('        ::     ') }}{{ $ticket->agent->name }}</p>
                    <p>
                        <strong>{{ trans('Category') }}</strong>{{ trans('    ::        ') }}
                        <span style="color: {{ $ticket->category->color }}">
                            {{ $ticket->category->name }}
                        </span>
                    </p>
                    <p> <strong>{{ trans('Created') }}</strong>{{ trans('     ::     ') }}{{ $ticket->created_at->diffForHumans() }}</p>
                    <p> <strong>{{ trans('Last-update') }}</strong>{{ trans('   ::   ') }}{{ $ticket->updated_at->diffForHumans() }}</p>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.project_tickets.index', $project->id) }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
