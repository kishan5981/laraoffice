@extends('layouts.app')

@section('content')

    <h2 style="margin-top:0px;">@yield('title')</h2>

    <div class="row msg-row" style="margin:15px;">

        {{--Sidebar--}}
        <div class="col-xs-4">
            <a href="{{ route('admin.messenger.create') }}" class="btn btn-primary btn-group-justified">New message</a>

            <div class="list-group" style="margin-top:8px;">
                <a href="{{ route('admin.messenger.index') }}" class="list-group-item">All Messages</a>
                @php($unread = App\Models\MessengerTopic::unreadInboxCount())
                <a href="{{ route('admin.messenger.inbox') }}" class="list-group-item {{ ($unread > 0 ? 'unread' : '') }}">
                    Inbox
                    {{ ($unread > 0 ? '('.$unread.')' : '') }}
                </a>
                <a href="{{ route('admin.messenger.outbox') }}" class="list-group-item">Outbox</a>
            </div>
        </div>


        {{--Main content--}}
        <div class="col-xs-8 msg-mt">
            @yield('messenger-content')
        </div>
    </div>

@stop
<style>
.msg-mt{
    margin-top: 50px;

}
.btn-group-justified{
    width: 100% !important;
}

@media   (min-width:320px) and (max-width:429px) {
    .msg-row {
    display: flex;
    flex-direction: column;
}
    .msg-row .col-xs-4  {
    width:100%;
}
    .msg-row .col-xs-8 {
    width:100%;
}
    .msg-row .col-xs-4 .list-group{
        display:flex;
    }
}
</style>