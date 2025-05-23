@extends('admin.messenger.template')

@section('title', $title)

@section('messenger-content')
    <div class="row">
        <div class="col-md-12">
            <div class="list-group"> 
                @forelse($topics as $topic)
                    <div class="row list-group-item">
                        <div class="col-xl-4 col-lg-4 col-md-3 col-sm-12">
                            <a href="{{ route('admin.messenger.show', [$topic->id]) }}" class="{{$topic->unread()?'unread':false}}">
                                {{ $topic->otherPerson()->name }}
                            </a>
                            @if ( config('app.action_buttons_hover') )
                           
                                <br>{!! view('actionsTemplateHover', ['row' => $topic, 'gateKey' => 'topic_', 'routeKey' => 'admin.messenger']) !!}
                               
                            @endif
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                            <a href="{{ route('admin.messenger.show', [$topic->id]) }}" class="{{$topic->unread()?'unread':false}}">
                                {{ $topic->subject }}
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3= col-md-3 col-sm-12 text-right">{{  \Carbon\Carbon::parse($topic->sent_at)->diffForHumans() }}</div>


                        @if ( ! config('app.action_buttons_hover') )
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 text-center">
                            {!! Form::open(array(
                                    'style' => 'display: inline-block;',
                                    'method' => 'DELETE',
                                    'onsubmit' => "return confirm('Are you sure?');",
                                    'route' => ['admin.messenger.destroy', $topic->id])) !!}
                            {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                            {!! Form::close() !!}
                        </div>
                        @endif
                    </div>
                @empty
                    <div class="row list-group-item">
                        You have no messages.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <style>
        .messenger-table tr:first-child td {
            border-top: 0 !important;
        }
        .unread {
            font-weight: bold;
            color:black;
        }
    </style>

@endsection