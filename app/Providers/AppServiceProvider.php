<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use App\Models\GeneralSetting;
use App\Models\LogoSetting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
    if (Schema::hasTable('general_settings')) { 
        $generalSetting = GeneralSetting::first() ?? new GeneralSetting(); 
        $logoSetting = LogoSetting::first();
        Config::set('app.timezone', $generalSetting->time_zone ?? 'UTC');

        Paginator::useBootstrap();

        View::composer('*', function($view) use ($generalSetting, $logoSetting) {
            $view->with(['settings' => $generalSetting, 'logoSetting' => $logoSetting]);
        });
    }
}

    
    
}