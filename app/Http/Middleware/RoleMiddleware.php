<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Enums\UserRole;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is logged in
        if (!$request->user()) {
            return redirect()->route('checklLogin');
        }

        // If user is 'admin', allow access
        if ($request->user()->role === UserRole::Admin) {
            return $next($request);
        }

        // If user is 'store'
        if ($request->user()->role === UserRole::Store) {
            // If the user is trying to update their own information, allow access
            if ($request->user()->id == $request->route('id')) {
                return $next($request);
            }

            // Check if the user 'store' has permission to edit staff information
            $user = User::find($request->route('id'));
            if ($user->role === UserRole::Staff) {
                return $next($request);
            }

            return redirect()->route('checkPermissionFailStore');

        }

        // If the user is 'admin' or 'store', or does not have access rights
        if ($request->user()->role !== UserRole::Staff || $request->user()->id != $request->route('id')) {
            return redirect()->route('checkPermissionFailStall');
        }
        return $next($request);
    }
}
