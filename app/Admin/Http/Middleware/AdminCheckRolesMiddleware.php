<?php

namespace App\Admin\Http\Middleware;

use App\Enums\Admin\AdminRoles;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class AdminCheckRolesMiddleware extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$roles)
    {
        foreach($roles as $key => $item){
            $roles[$key] = AdminRoles::from($item);
        }

        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->rolesIn($roles)) {
            return $next($request);
        }

        return to_route('admin.dashboard')->with('error', __('unauthorized'));
        
    }
}