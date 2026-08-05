<?php

namespace Nameera\NameeraTemplate;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Nameera\NameeraTemplate\Console\InstallCommand;

class NameeraTemplateServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/nameera.php', 'nameera'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);

            $this->publishes([
                __DIR__ . '/../stubs' => base_path('stubs/nameera'),
            ], 'nameera-stubs');

            $this->publishes([
                __DIR__ . '/../config/nameera.php' => config_path('nameera.php'),
            ], 'nameera-config');
        }

        // Register Blade component namespace
        // This allows components to be referenced as <x-nameera::component-name>
        Blade::componentNamespace('Nameera\\NameeraTemplate\\Views\\Components', 'nameera');
        
        // Load views from the package for fallback
        $this->loadViewsFrom(__DIR__ . '/../stubs/resources/views', 'nameera');
    }
}
