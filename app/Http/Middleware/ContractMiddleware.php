<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;

class ContractMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (config("customer_portal.contracts_enabled") !== true) {
            return redirect()->back()->withErrors(utrans("errors.sectionDisabled",[],$request));
        }
        return $next($request);
    }
}
