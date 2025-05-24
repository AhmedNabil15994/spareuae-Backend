<?php

namespace Modules\Customer\Providers;

use File;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Core\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $dashboardModule = '\Modules\Customer\Http\Controllers\Dashboard';

    protected function frontendGroups()
    {

        return [
            'middleware' => config('core.route-middleware.frontend.auth'),
            'prefix' => LaravelLocalization::setLocale() . config('core.route-prefix.frontend')
        ];
    }

    protected function mapDashboardRoutes()
    {
        Route::middleware('web', 'localizationRedirect', 'localeSessionRedirect', 'localeViewPath', 'localize', 'permission:dashboard_access')
            ->prefix(LaravelLocalization::setLocale() . '/dashboard')
            ->namespace($this->dashboardModule)->group(module_path('Customer', 'Routes/dashboard/routes.php'));
    }

    protected function apiGroups()
    {

        return [
            'middleware' => config('core.route-middleware.api.auth'),
            'prefix' => config('core.route-prefix.api')
        ];
    }
}
