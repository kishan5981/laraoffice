<div class="panel panel-default">
    <div class="panel-body">
        <ul class="nav nav-pills">
            <li role="presentation" class="{!! $tools->fullUrlIs(action('\Modules\Support\Http\Controllers\Admin\TicketsController@index')) ? "active" : "" !!}">
                <a href="{{ action('\Modules\Support\Http\Controllers\Admin\TicketsController@index') }}">{{ trans('ticketit::lang.nav-active-tickets') }}
                    <span class="badge">
                         <?php 
                            if ($u->isAdmin()) {
                                echo Modules\Support\Entities\Ticket::active()->count();
                            } elseif ($u->isAgent()) {
                                echo Modules\Support\Entities\Ticket::active()->agentUserTickets($u->id)->count();
                            } else {
                                echo Modules\Support\Entities\Ticket::userTickets($u->id)->active()->count();
                            }
                        ?>
                    </span>
                </a>
            </li>
            <li role="presentation" class="{!! $tools->fullUrlIs(action('\Modules\Support\Http\Controllers\Admin\TicketsController@indexComplete')) ? "active" : "" !!}">
                <a href="{{ action('\Modules\Support\Http\Controllers\Admin\TicketsController@indexComplete') }}">{{ trans('ticketit::lang.nav-completed-tickets') }}
                    <span class="badge">
                        <?php 
                            if ($u->isAdmin()) {
                                echo Modules\Support\Entities\Ticket::complete()->count();
                            } elseif ($u->isAgent()) {
                                echo Modules\Support\Entities\Ticket::complete()->agentUserTickets($u->id)->count();
                            } else {
                                echo Modules\Support\Entities\Ticket::userTickets($u->id)->complete()->count();
                            }
                        ?>
                    </span>
                </a>
            </li>

            @if($u->isAdmin())
                <li role="presentation" class="{!! $tools->fullUrlIs(action('\Modules\Support\Http\Controllers\Admin\DashboardController@index')) || Request::is($setting->grab('admin_route').'/indicator*') ? "active" : "" !!}">
                    <a href="{{ action('\Modules\Support\Http\Controllers\Admin\DashboardController@index') }}">{{ trans('ticketit::admin.nav-dashboard') }}</a>
                </li>

                <li role="presentation" class="dropdown {!!
                    $tools->fullUrlIs(action('\Modules\Support\Http\Controllers\Admin\StatusesController@index').'*') ||
                    $tools->fullUrlIs(action('\Modules\Support\Http\Controllers\Admin\PrioritiesController@index').'*') ||
                    $tools->fullUrlIs(action('\Modules\Support\Http\Controllers\Admin\AgentsController@index').'*') ||
                    $tools->fullUrlIs(action('\Modules\Support\Http\Controllers\Admin\CategoriesController@index').'*') ||
                    $tools->fullUrlIs(action('\Modules\Support\Http\Controllers\Admin\ConfigurationsController@index').'*') ||
                    $tools->fullUrlIs(action('\Modules\Support\Http\Controllers\Admin\AdministratorsController@index').'*')
                    ? "active" : "" !!}">

                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ trans('ticketit::admin.nav-settings') }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li role="presentation" class="{!! $tools->fullUrlIs(action('\Modules\Support\Http\Controllers\Admin\StatusesController@index').'*') ? "active" : "" !!}">
                            <a href="{{ action('\Modules\Support\Http\Controllers\Admin\StatusesController@index') }}">{{ trans('ticketit::admin.nav-statuses') }}</a>
                        </li>
                        <li role="presentation"  class="{!! $tools->fullUrlIs(action('\Modules\Support\Http\Controllers\Admin\PrioritiesController@index').'*') ? "active" : "" !!}">
                            <a href="{{ action('\Modules\Support\Http\Controllers\Admin\PrioritiesController@index') }}">{{ trans('ticketit::admin.nav-priorities') }}</a>
                        </li>
                        <li role="presentation"  class="{!! $tools->fullUrlIs(action('\Modules\Support\Http\Controllers\Admin\AgentsController@index').'*') ? "active" : "" !!}">
                            <a href="{{ action('\Modules\Support\Http\Controllers\Admin\AgentsController@index') }}">{{ trans('ticketit::admin.nav-agents') }}</a>
                        </li>
                        <li role="presentation"  class="{!! $tools->fullUrlIs(action('\Modules\Support\Http\Controllers\Admin\CategoriesController@index').'*') ? "active" : "" !!}">
                            <a href="{{ action('\Modules\Support\Http\Controllers\Admin\CategoriesController@index') }}">{{ trans('ticketit::admin.nav-categories') }}</a>
                        </li>
                        @if ( env('APP_DEV') )
                        <li role="presentation"  class="{!! $tools->fullUrlIs(action('\Modules\Support\Http\Controllers\Admin\ConfigurationsController@index').'*') ? "active" : "" !!}">
                            <a href="{{ action('\Modules\Support\Http\Controllers\Admin\ConfigurationsController@index') }}">{{ trans('ticketit::admin.nav-configuration') }}</a>
                        </li>
                        @endif
                        <li role="presentation"  class="{!! $tools->fullUrlIs(action('\Modules\Support\Http\Controllers\Admin\AdministratorsController@index').'*') ? "active" : "" !!}">
                            <a href="{{ action('\Modules\Support\Http\Controllers\Admin\AdministratorsController@index')}}">{{ trans('ticketit::admin.nav-administrator') }}</a>
                        </li>
                    </ul>
                </li>
            @endif

        </ul>
    </div>
</div>
