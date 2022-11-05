<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminSecurity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $docs_routes=['donner','case-all','case','logout'];
        $manager_routes=['dashboard','get-donner','logout'];
        if(session()->get('role')=='admin'){
            return $next($request);
        }
        else if(session()->get('role')=='docs' && in_array( $request->path(), $docs_routes)){
            return $next($request);
        }
        else if(session()->get('role')=='manager' && in_array( $request->path(), $manager_routes)){
            return $next($request);
        }        
        else{
            return response()->view('messages.admin_security');
        }
    }
}
