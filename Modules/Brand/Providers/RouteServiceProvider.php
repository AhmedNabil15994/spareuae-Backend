<?php

namespace Modules\Brand\Providers;

use File;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Core\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    // protected $apiModule       = '\Modules\Brand\Http\Controllers\Api';
    protected $frontendModule  = '\Modules\Brand\Http\Controllers\Frontend';
    protected $dashboardModule = '\Modules\Brand\Http\Controllers\Dashboard';


    protected function mapDashboardRoutes()
    {
        Route::middleware('web', 'localizationRedirect', 'localeSessionRedirect', 'localeViewPath', 'localize', 'permission:dashboard_access')
            ->prefix(LaravelLocalization::setLocale() . '/dashboard')
            ->namespace($this->dashboardModule)->group(module_path('Brand', 'Routes/dashboard/routes.php'));
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web', 'localizationRedirect', 'localeSessionRedirect', 'localeViewPath', 'localize')
            ->prefix(LaravelLocalization::setLocale())
            ->namespace($this->frontendModule)->group(module_path('Brand', 'Routes/frontend/routes.php'));
    }

    // protected function mapApiRoutes()
    // {
    //     Route::group(['prefix' => 'api', 'middleware' => ['api'], 'namespace' => $this->apiModule], module_path('Brand', 'Routes/api/routes.php'));
    // }
}
