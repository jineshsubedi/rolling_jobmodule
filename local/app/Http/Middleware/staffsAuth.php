<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class StaffsAuth
{
/**
 * Handle an incoming request.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Closure  $next
 * @param  string|null  $guard
 * @return mixed
 */
    public function handle($request, Closure $next, $guard = 'staffs')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('staffs/login');
        }
        else{
        	if(auth()->guard($guard)->user()->staffType == 2){
                return $next($request);
        	}

        	else{
        		       session()->flush();
        		               return redirect('staffs/login');


        	}
        }
    
    }
}  