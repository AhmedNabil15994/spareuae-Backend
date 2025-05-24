<?php

namespace Modules\Core\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        if (config("app.have_website")) {
        } else {
            $this->mapFrontNeeded();
        }

        $this->mapDashboardRoutes();
        $this->mapDashboardVendorRoutes();
    }

    protected function mapDashboardVendorRoutes()
    {
    }

    protected function mapFrontNeeded()
    {
    }
    protected function mapWebRoutes()
    {
    }
    protected function mapApiRoutes()
    {
    }
    protected function mapDashboardRoutes()
    {
    }



}
