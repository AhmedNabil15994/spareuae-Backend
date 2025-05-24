<?php

namespace Modules\Comment\Providers;

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Core\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $frontendModule  = '\Modules\Comment\Http\Controllers\Frontend';

    protected function mapWebRoutes()
    {
        Route::middleware(
            'web',
            'localizationRedirect',
            'localeSessionRedirect',
            'localeViewPath',
            'localize'
        )
            ->prefix(LaravelLocalization::setLocale())
            ->namespace($this->frontendModule)->group(module_path('Comment', 'Routes/frontend/routes.php'));
    }
}
