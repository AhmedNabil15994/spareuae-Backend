<?php

namespace Modules\Core\Providers;

use Illuminate\Support\Facades\Blade;
use Modules\Core\Packages\SMS\SmsBox;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Packages\SMS\SmsGetWay;
use Illuminate\Database\Eloquent\Factory;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Providers\ConfigServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path('Core', 'Database/Migrations'));
        $this->registerComponent();


    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app->register(ConfigServiceProvider::class);
        // $this->app->register(RouteServiceProvider::class);
        $this->app->bind(
            SmsGetWay::class,
            SmsBox::class
        );
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishConfig('core', 'available-locales');
        $this->publishConfig('core', 'config');
    }

    public function registerComponent(){

        Blade::component('core::components.multipleImage', "multipleImage");
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/core');

        $sourcePath = module_path('Core', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/core';
        }, \Config::get('view.paths')), [$sourcePath]), 'core');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/core');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'core');
        } else {
            $this->loadTranslationsFrom(module_path('Core', 'Resources/lang'), 'core');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path('Core', 'Database/factories'));
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
