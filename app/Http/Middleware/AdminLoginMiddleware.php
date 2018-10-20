<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminLoginMiddleware
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
        // dd(Auth::check());
        if (Auth::check()) {
            $user = Auth::user();
            if($user->is_admin == 1){
                return $next($request);
            }else{
                return redirect('/admin/login');
            }
        }
        return redirect('/admin/login');
    }
}
