<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdminMiddleware
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
        if($request->session()->has('user')){
            $user = $request->session()->get('user');
            if($user->type == 1){
                return $next($request);
            } else {
                return redirect('/');
            }
        }elseif($request->session()->get('user') == null) {
            return redirect('signin');
        }else {
            return redirect('signin');
        }
    }
}
