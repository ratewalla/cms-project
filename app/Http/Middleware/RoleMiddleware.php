<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(!$request->user()->userHasRole($role)){      //if user does not have a role
            abort(403, 'You are not authorised.');      //show error 403
        }

        return $next($request);
    }
}
