<?php

namespace App\Http\Middleware;

use App\Models\Data_manager;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIfEmployee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
        public function handle($request, Closure $next)
        {
            if (Auth::guard('data_manager')->check() || Auth::guard('admins')->check()) {
    
                    return $next($request); // المستخدم موظف، السماح بالمتابعة
                
            }
            
    
            return redirect('/DataManager/login')->withErrors('يجب تسجيل دخولك كاسكرتيرة');
            
        }
}
