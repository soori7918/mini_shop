<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClearanceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->hasRole('مدیر')) {
            return $next($request);
        }

        if ($request->is('posts/create')) {
            if (!Auth::user()->hasPermissionTo('add_posts')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('posts/*/edit')) {
            if (!Auth::user()->hasPermissionTo('edit_posts')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) {
            if (!Auth::user()->hasPermissionTo('delete_posts')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        return $next($request);
    }
}