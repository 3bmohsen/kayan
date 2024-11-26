<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckIfEMP
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('employees')->check() || Auth::guard('admins')->check()) {

                return $next($request); // المستخدم موظف، السماح بالمتابعة
            
        }
        

        return redirect('/Employee/Login')->withErrors('يجب تسجيل دخولك');
        
    }
}
