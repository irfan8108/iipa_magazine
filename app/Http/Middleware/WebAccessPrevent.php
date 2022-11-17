<?php

namespace App\Http\Middleware;

use Closure;
use Jenssegers\Agent\Agent;

class WebAccessPrevent
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
        $agent = new Agent();

        if($agent->isMobile())
        {
            return $next($request);
        }

        // return response()->view('web_access_prevent');
    }
}
