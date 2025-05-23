@extends('layouts.app')

@section('content')

@include('support::shared.nav')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<div class="panel panel-default">

    <div class="panel-heading">
        <h3>My Tickets
        {!! link_to_route(
                                   'admin.support.create',
                                    'CREATE NEW TICKET', null,
                                    ['class' => 'btn btn-primary pull-right'])
                !!}
                </h3>
    </div>
     <!-- Display warning message -->
     @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
    <div id="message"></div>

    <div class="panel-body">
        
        @include('support::tickets.partials.datatable')
    </div>

</div>

@endsection