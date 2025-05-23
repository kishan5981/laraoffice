<div class="panel panel-default">
    <div class="panel-body">
        <ul class="nav nav-pills">
            <li role="presentation" class="{{ Request::is('admin/support*') ? 'active' : '' }}">
                <a href="{{ route('admin.support.index') }}">Active Tickets
                    <span class="badge">
                        <?php 
                        $u = \Auth::user();
                        // $u = new \App\Models\User;
                        if ($u->ticketit_admin == '1') {
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
            <li role="presentation" class="{{ Request::is('admin/completed/tickets*') ? 'active' : '' }}">
                <a href="{{ route('admin.completed.tickets') }}">Completed Tickets
                    <span class="badge">
                        <?php 
                        if ($u->ticketit_admin == '1') {
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

            @if($u->ticketit_admin == '1') 
            <li role="presentation" class="{{ Request::is('admin/supdashboard*') ? 'active' : '' }}">
                <a href="{{ route('admin.supdashboard.index') }}">Dashboard</a>
            </li>

            <li role="presentation" class="dropdown {{ Request::is('admin/status*') || Request::is('admin/priority*') || Request::is('admin/agent*') || Request::is('admin/category*') || Request::is('admin/administrator*') ? 'active' : '' }}">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    Settings <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li role="presentation">
                        <a href="{{route('admin.status.index')}}" class="{{ Request::is('admin/status*') ? 'active' : '' }}">Status</a>
                    </li>
                    <li role="presentation">
                        <a href="{{route('admin.priority.index')}}" class="{{ Request::is('admin/priority*') ? 'active' : '' }}">Priorities</a>
                    </li>
                    <li role="presentation">
                        <a href="{{route('admin.agent.index')}}" class="{{ Request::is('admin/agent*') ? 'active' : '' }}">Agents</a>
                    </li>
                    <li role="presentation">
                        <a href="{{route('admin.category.index')}}" class="{{ Request::is('admin/category*') ? 'active' : '' }}">Categories</a>
                    </li>
                    <li role="presentation">
                        <a href="{{route('admin.administrator.index')}}" class="{{ Request::is('admin/administrator*') ? 'active' : '' }}">Administrator</a>
                    </li>
                </ul>
            </li>
            @endif 

        </ul>
    </div>
</div>
