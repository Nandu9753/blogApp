<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Arr;

class AdminMiddleware extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('admin.login');
        }
        
    }
    public function authenticate($request, array $guard){
        if (Auth::guard('admin')->check()) {
            return $this->auth->shouldUse('admin');
        }
        $this->unauthenticated($request,['admin']);
    }
}
