<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class GeneralValidation
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
        if (!Auth::check()) {
            return redirect(route('login'));
        } else {
            if (Auth::user()->user_role == User::USER_ROLES['TRANSLATOR']) {
                return redirect(route('translator.home'));
            } else if (Auth::user()->user_role == User::USER_ROLES['MODERATOR']) {
                return redirect(route('moderator.home'));
            } else if (Auth::user()->user_role == User::USER_ROLES['ADMIN']) {
                return redirect(route('admin.home'));
            }
        }
        return $next($request);
    }
}
