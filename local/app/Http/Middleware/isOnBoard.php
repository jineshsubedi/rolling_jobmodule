<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isOnBoard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'staffs')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('staffs/login');
        }
        else{
            if(auth()->guard($guard)->user()->on_board == 0){
                if(auth()->guard($guard)->user()->staffType == 1){
                    return redirect('supervisor/welcome');
                }
                if(auth()->guard($guard)->user()->staffType == 2){
                    return redirect('staffs/welcome');
                }
                if(auth()->guard($guard)->user()->staffType == 3){
                    return redirect('branchadmin/welcome');
                }
            }
            return $next($request);
        }
    }
}
