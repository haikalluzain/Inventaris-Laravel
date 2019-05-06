<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class EmployeeMiddleware
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
        if (Auth::guard('employee')->check()) {
            return $next($request);
        }else{
            return redirect()->route('emp.show');
        }
    }
}
