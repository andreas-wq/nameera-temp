<?php

namespace Nameera\NameeraTemplate;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Nameera\NameeraTemplate\Console\InstallCommand;
use Nameera\NameeraTemplate\Views\Components\Form\Input;
use Nameera\NameeraTemplate\Views\Components\Form\Label;

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

        // Register Blade components with the 'nameera' prefix
        // This registers <x-nameera::form.input> and <x-nameera::form.label>
        Blade::component('nameera::form.input', Input::class);
        Blade::component('nameera::form.label', Label::class);
        
        // Load views from the published location for components
        // This ensures components are found after installation
        $this->loadViewsFrom(__DIR__ . '/../stubs/resources/views', 'nameera');
    }
}
