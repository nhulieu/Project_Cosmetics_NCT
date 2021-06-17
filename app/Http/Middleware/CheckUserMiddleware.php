<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $request->session()->put('redirect', 'redirect');
        if ($request->session()->has('user')) {
            $user = $request->session()->get('user');
            if ($user->TYPE == 2) {
                return $next($request);
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
