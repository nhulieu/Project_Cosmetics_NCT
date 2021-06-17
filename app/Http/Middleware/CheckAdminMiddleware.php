<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdminMiddleware
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
        if ($request->session()->has('user')) {
            $user = $request->session()->get('user');
            if ($user->TYPE == 1) {
                return $next($request);
            } elseif ($user->TYPE == 0) {
                return redirect('supervisor/member/home');
            } else {
                return redirect('index');
            }
        } elseif ($request->session()->get('user') == null) {
            return redirect('login');
        } else {
            return redirect('login');
        }
    }
}
