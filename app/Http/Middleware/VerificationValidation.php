<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class VerificationValidation
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
        if (Auth::user()) {
            if (Auth::user()->is_verified || Auth::user()->user_role == User::USER_ROLES['ADMIN']) {
                return $next($request);
            } else {
                return redirect(route('verification.home', 'en'));
            }
        } else {
            return redirect(route('login'));
        }
    }
}
