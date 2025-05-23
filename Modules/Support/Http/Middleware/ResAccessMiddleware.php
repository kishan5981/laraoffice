<?php

namespace Modules\Support\Http\Middleware;

use Closure;
use Modules\Support\Helpers\LaravelVersion;
use Modules\Support\Entities\Agent;
use Modules\Support\Entities\Setting;

class ResAccessMiddleware
{
    /**
     * Run the request filter.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Agent::isAdmin()) {
            return $next($request);
        }

        // All Agents have access in none restricted mode
        if (Setting::grab('agent_restrict') == 'no') {
            if (Agent::isAgent()) {
                return $next($request);
            }
        }
        
        
        // if this is a ticket show page
        if ($request->route()->getName() == 'admin.support.show') {
            if (LaravelVersion::lt('5.2.0')) {
                $ticket_id = $request->route('support');
            } else {
                $ticket_id = $request->route('support');
            }
        }

        // if this is a new comment on a ticket
        if ($request->route()->getName() == 'admin.support-comment.store') {
            $ticket_id = $request->get('ticket_id');
        }

        // Assigned Agent has access in the restricted mode enabled
        if (Agent::isAgent() && Agent::isAssignedAgent($ticket_id)) {
            return $next($request);
        }
       
        // Ticket Owner has access
        if (Agent::isTicketOwner($ticket_id)) {
            return $next($request);
        }

        return redirect()->route('admin.support.index')
            ->with('warning', trans('ticketit::lang.you-are-not-permitted-to-access'));
    }
}