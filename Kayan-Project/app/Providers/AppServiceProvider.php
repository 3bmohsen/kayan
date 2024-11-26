<?php

namespace App\Providers;

use App\Models\Missions;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::useBootstrap(); // استخدام Bootstrap لنمط الترقيم
        View::composer('kayan.managing.clients.master', function ($view) {
            // جلب البيانات من قاعدة البيانات
            $Missions = Missions::all(); // استبدل بـ Model والبيانات المطلوبة

            // إرسال البيانات إلى الـ view
            $view->with('Missions', $Missions);
        });
        View::composer('kayan.managing.clients.Cprofile', function ($view) {
            // جلب البيانات من قاعدة البيانات
            $Missions = Missions::all(); // استبدل بـ Model والبيانات المطلوبة

            // إرسال البيانات إلى الـ view
            $view->with('Missions', $Missions);
        });
    }
}
