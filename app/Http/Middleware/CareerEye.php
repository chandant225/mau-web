<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CareerEye
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $user = auth()->user();
            if ($user->is_admin == 1 && ($user->role_id == 1 || $user->role_id == 2 || $user->role_id == 3)) {
                return $next($request);
            }
            return redirect('/');
        }
        return redirect('/');
    }
}
