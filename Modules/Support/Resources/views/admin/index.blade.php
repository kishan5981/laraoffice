@extends('layouts.app')

@section('page')
    {{ trans('support::admin.index-title') }}
@stop

@section('content')
    @include('support::shared.header')
    @if($tickets_count)
        <div class="row">
            <div class="col-lg-3 col-md-4 col-lg-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3" style="font-size: 5em;">
                                <i class="glyphicon glyphicon-th"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h1>{{ $tickets_count }}</h1>
                                <div>Total tickets</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3" style="font-size: 7em;">
                                <i class="glyphicon glyphicon-wrench"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h1>{{ $open_tickets_count }}</h1>
                                <div>Active tickets</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3" style="font-size: 7em;">
                                <i class="glyphicon glyphicon-thumbs-up"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h1>{{ $closed_tickets_count }}</h1>
                                <span>Completed tickets</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Performance Indicator
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    Periods
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a href="{{ action('\Modules\Support\Http\Controllers\Admin\DashboardController@index', 2) }}">
                                            3 months
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ action('\Modules\Support\Http\Controllers\Admin\DashboardController@index', 5) }}">
                                            6 months
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ action('\Modules\Support\Http\Controllers\Admin\DashboardController@index', 11) }}">
                                            12 months
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="curve_chart" style="width: 100%; height: 350px"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Tickets share per category
                            </div>
                            <div class="panel-body">
                                <div id="catpiechart" style="width: auto; height: 350;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Tickets share per agent
                            </div>
                            <div class="panel-body">
                                <div id="agentspiechart" style="width: auto; height: 350;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                {{--<h4><i class="glyphicon glyphicon-info-sign"></i> Tickets Activities</h4>--}}
                {{--<hr />--}}
                <ul class="nav nav-tabs nav-justified">
                    <li class="{{$active_tab == "cat" ? "active" : ""}}">
                        <a data-toggle="pill" href="#information-panel-categories">
                            <i class="glyphicon glyphicon-folder-close"></i>
                            <small>Categories</small>
                        </a>
                    </li>
                    <li class="{{$active_tab == "agents" ? "active"  : ""}}">
                        <a data-toggle="pill" href="#information-panel-agents">
                            <i class="glyphicon glyphicon-user"></i>
                            <small>Agents</small>
                        </a>
                    </li>
                    <li class="{{$active_tab == "users" ? "active" : ""}}">
                        <a data-toggle="pill" href="#information-panel-users">
                            <i class="glyphicon glyphicon-user"></i>
                            <small>Users</small>
                        </a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div id="information-panel-categories" class="list-group tab-pane fade {{$active_tab == "cat" ? "in active" : ""}}">
                        <a href="#" class="list-group-item disabled">
                            <span>Category
                                <span class="badge">Total</span>
                            </span>
                            <span class="pull-right text-muted small">
                                <em>
                                    Active /
                                     Completed
                                </em>
                            </span>
                        </a>
                        @foreach($categories as $category)
                            <a href="#" class="list-group-item">
                        <span style="color: {{ $category->color }}">
                            {{ $category->name }} <span class="badge">{{ $category->tickets()->count() }}</span>
                        </span>
                        <span class="pull-right text-muted small">
                            <em>
                                {{ $category->tickets()->whereNull('completed_at')->count() }} /
                                 {{ $category->tickets()->whereNotNull('completed_at')->count() }}
                            </em>
                        </span>
                            </a>
                        @endforeach
                        {!! $categories->render() !!}
                    </div>
                    <div id="information-panel-agents" class="list-group tab-pane fade {{$active_tab == "agents" ? "in active" : ""}}">
                        <a href="#" class="list-group-item disabled">
                            <span>Agent
                                <span class="badge">Total</span>
                            </span>
                            <span class="pull-right text-muted small">
                                <em>
                                    Active /
                                    Completed
                                </em>
                            </span>
                        </a>
                        @foreach($agents as $agent)
                            <a href="#" class="list-group-item">
                                <span>
                                    {{ $agent->name }}
                                    <span class="badge">
                                        {{ $agent->agentTickets(false)->count()  +
                                         $agent->agentTickets(true)->count() }}
                                    </span>
                                </span>
                                <span class="pull-right text-muted small">
                                    <em>
                                        {{ $agent->agentTickets(false)->count() }} /
                                         {{ $agent->agentTickets(true)->count() }}
                                    </em>
                                </span>
                            </a>
                        @endforeach
                        {!! $agents->render() !!}
                    </div>
                    <div id="information-panel-users" class="list-group tab-pane fade {{$active_tab == "users" ? "in active" : ""}}">
                        <a href="#" class="list-group-item disabled">
                            <span>User
                                <span class="badge">Total</span>
                            </span>
                            <span class="pull-right text-muted small">
                                <em>
                                   Active /
                                    Completed
                                </em>
                            </span>
                        </a>
                        @foreach($users as $user)
                            <a href="#" class="list-group-item">
                                <span>
                                    {{ $user->name }}
                                    <span class="badge">
                                        {{ $user->userTickets(false)->count()  +
                                         $user->userTickets(true)->count() }}
                                    </span>
                                </span>
                                <span class="pull-right text-muted small">
                                    <em>
                                        {{ $user->userTickets(false)->count() }} /
                                        {{ $user->userTickets(true)->count() }}
                                    </em>
                                </span>
                            </a>
                        @endforeach
                        {!! $users->render() !!}
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="well text-center">
            {{ trans('admin.index-empty-records') }}
        </div>
    @endif
@stop
@section('footer')
    @if($tickets_count)
    {{--@include('support::shared.footer')--}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // performance line chart
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["{{ trans('admin.index-month') }}", "{!! implode('", "', $monthly_performance['categories']) !!}"],
                @foreach($monthly_performance['interval'] as $month => $records)
                    ["{{ $month }}", {!! implode(',', $records) !!}],
                @endforeach
            ]);

            var options = {
                title: 'Performance chart',
                curveType: 'function',
                legend: {position: 'right'},
                vAxis: {
                    viewWindowMode:'explicit',
                    format: '#',
                    viewWindow:{
                        min:0
                    }
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);

            // Categories Pie Chart
            var cat_data = google.visualization.arrayToDataTable([
              ['{{ trans('admin.index-category') }}', '{!! addslashes(trans('admin.index-tickets')) !!}'],
              @foreach($categories_share as $cat_name => $cat_tickets)
                    ['{!! addslashes($cat_name) !!}', {{ $cat_tickets }}],
              @endforeach
            ]);

            var cat_options = {
              title: 'Categories chart',
              legend: {position: 'bottom'}
            };

            var cat_chart = new google.visualization.PieChart(document.getElementById('catpiechart'));

            cat_chart.draw(cat_data, cat_options);

            // Agents Pie Chart
            var agent_data = google.visualization.arrayToDataTable([
              ['{{ trans('admin.index-agent') }}', '{!! addslashes(trans('admin.index-tickets')) !!}'],
              @foreach($agents_share as $agent_name => $agent_tickets)
                    ['{!! addslashes($agent_name) !!}', {{ $agent_tickets }}],
              @endforeach
            ]);

            var agent_options = {
              title: 'Agents chart',
              legend: {position: 'bottom'}
            };

            var agent_chart = new google.visualization.PieChart(document.getElementById('agentspiechart'));

            agent_chart.draw(agent_data, agent_options);

        }
    </script>
    <style>
        @media (min-width: 300px) and (max-width: 414px){
            .panel-default>.panel-heading {
    font-size: 14px;
    font-weight: 700;
    line-height: 30px;
}
}

@media (min-width: 415px) and (max-width: 575px){

}

@media (min-width: 576px) and (max-width: 767px){

}
@media (min-width: 768px) and (max-width: 991px){

}

@media (min-width: 992px) and (max-width: 1199px){

}

@media (min-width: 1200px) and (max-width: 1365px){

}
@media (min-width: 1366px) and (max-width: 1544px){
    
}
    </style>
    @endif
@append
