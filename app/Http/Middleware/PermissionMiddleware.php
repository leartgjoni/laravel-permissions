<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
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

        if(Auth::user()->hasAccess($request->route()->getName()))
            return $next($request);

        return redirect('/welcome')->with([
            'flash_message'=>'No permissions for this route',
            'flash_message_important' => true,
            'flash_class'=>'alert-danger'
        ]);
    }
}