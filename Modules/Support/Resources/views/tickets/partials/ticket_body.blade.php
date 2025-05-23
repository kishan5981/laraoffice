<div class="panel panel-default">
    <div class="panel-body">
        <div class="content">
            <h2 class="header">
                {{ $ticket->subject }}
               
                <span class="pull-right">
                    @if(! $ticket->completed_at && $close_perm == 'yes')
                    {!! link_to_route('admin.' . $setting->grab('main_route') . '.complete', trans('support::lang.btn-mark-complete'), $ticket->id,
                                                ['class' => 'btn btn-success']) !!}
                    @elseif($ticket->completed_at && $reopen_perm == 'yes')
                            {!! link_to_route('admin.' . $setting->grab('main_route').'.reopen', trans('support::lang.reopen-ticket'), $ticket->id,
                                                ['class' => 'btn btn-success']) !!}
                    @endif
                    @if($u->isAgent() || $u->isAdmin())
                    <button type="button" class="btn btn-info" onclick="window.location.href='{{ route('admin.support.edit', $ticket->id) }}'">
                    {{ trans('support::lang.btn-edit') }}
    </button>
                    @endif
                    @if($u->isAdmin())
                   
                        @if($setting->grab('delete_modal_type') == 'builtin')
                            {!! link_to_route(
                                            'admin.support.destroy', trans('support::lang.btn-delete'), $ticket->id,
                                            [
                                            'class' => 'btn btn-danger deleteit',
                                            'form' => "delete-ticket-$ticket->id",
                                            "node" => $ticket->subject
                                            ])
                            !!}
                        @elseif($setting->grab('delete_modal_type') == 'modal')
{{-- // OR; Modal Window: 1/2 --}}
                            {!! Form::open(array(
                                    'route' => array($setting->grab('main_route').'.destroy', $ticket->id),
                                    'method' => 'delete',
                                    'style' => 'display:inline'
                               ))
                            !!}
                            <button type="button"
                                    class="btn btn-danger"
                                    data-toggle="modal"
                                    data-target="#confirmDelete"
                                    data-title="{!! trans('support::lang.show-ticket-modal-delete-title', ['id' => $ticket->id]) !!}"
                                    data-message="{!! trans('support::lang.show-ticket-modal-delete-message', ['subject' => $ticket->subject]) !!}"
                             >
                              {{ trans('support::lang.btn-delete') }}
                            </button>
                        @endif
                            {!! Form::close() !!}
{{-- // END Modal Window: 1/2 --}}
                    @endif
                </span>
            </h2>
            <div class="panel well well-sm">
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <p> <strong>{{ trans('support::lang.owner') }}</strong>{{ trans('support::lang.colon') }}{{ $ticket->user_id == $u->id ? $u->name : $ticket->user->name }}</p>
                            <p>
                                <strong>{{ trans('support::lang.status') }}</strong>{{ trans('support::lang.colon') }}
                                @if( $ticket->isComplete() && ! $setting->grab('default_close_status_id') )
                                    <span style="color: blue">Complete</span>
                                @else
                                    <span style="color: {{ $ticket->status->color }}">{{ $ticket->status->name }}</span>
                                @endif

                            </p>
                            <p>
                                <strong>{{ trans('support::lang.priority') }}</strong>{{ trans('support::lang.colon') }}
                                <span style="color: {{ $ticket->priority->color }}">
                                    {{ $ticket->priority->name }}
                                </span>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p> <strong>{{ trans('support::lang.responsible') }}</strong>{{ trans('support::lang.colon') }}{{ $ticket->agent_id == $u->id ? $u->name : $ticket->agent->name }}</p>
                            <p>
                                <strong>{{ trans('support::lang.category') }}</strong>{{ trans('support::lang.colon') }}
                                <span style="color: {{ $ticket->category->color }}">
                                    {{ $ticket->category->name }}
                                </span>
                            </p>
                            <p> <strong>{{ trans('support::lang.created') }}</strong>{{ trans('support::lang.colon') }}{{ $ticket->created_at->diffForHumans() }}</p>
                            <p> <strong>{{ trans('support::lang.last-update') }}</strong>{{ trans('support::lang.colon') }}{{ $ticket->updated_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                {!! $ticket->html !!}
            </div>
        </div>
        {!! Form::open([
                        'method' => 'DELETE',
                        'route' => [
                                    'admin.support.destroy',
                                    $ticket->id
                                    ],
                        'id' => "delete-ticket-$ticket->id"
                        ])
        !!}
        {!! Form::close() !!}
    </div>
</div>

  

{{-- // OR; Modal Window: 2/2 --}}
    @if($u->isAdmin())
        @include('support::tickets.partials.modal-delete-confirm')
    @endif
{{-- // END Modal Window: 2/2 --}}
