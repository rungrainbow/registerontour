<?php

namespace App\Http\Middleware;

use Closure;
use App\UserProfile;

class CheckProfile
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
        if(UserProfile::where('user_id', session('users')['id'])->first() != null) {
            return $next($request);
        } else {
            return redirect('/home/personal');
        }
    }
}
