<?php

namespace Modules\Support\Http\Middleware;

use Closure;
use Modules\Support\Entities\Agent;
use Modules\Support\Entities\Setting;

class IsAdminMiddleware
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

        return redirect()->route(Setting::grab('main_route') . '.index')
            ->with('warning', trans('ticketit::lang.you-are-not-permitted-to-access'));
    }
}