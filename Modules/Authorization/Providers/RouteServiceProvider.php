<?php

namespace Modules\Authorization\Providers;

use File;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Core\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $dashboardModule = '\Modules\Authorization\Http\Controllers\Dashboard';

    protected function mapDashboardRoutes()
    {
        Route::middleware('web', 'localizationRedirect', 'localeSessionRedirect', 'localeViewPath', 'localize', 'permission:dashboard_access')
            ->prefix(LaravelLocalization::setLocale() . '/dashboard')
            ->namespace($this->dashboardModule)->group(
                module_path('Authorization', 'Routes/dashboard/routes.php')
            );
    }
}
