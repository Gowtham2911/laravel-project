<?php

namespace Sparkout\User;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
         $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'user');
         $this->loadViewsFrom(__DIR__.'/resources/views', 'user');
         $this->loadMigrationsFrom(__DIR__.'/database/migrations');
         $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/config.php' => config_path('user.php'),
            ], 'config');

            // Publishing the views.
            $this->publishes([
                __DIR__.'/resources/views' => resource_path('views/vendor/user'),
            ], 'views');

            // Publishing assets.
            $this->publishes([
                __DIR__.'/resources/assets' => public_path('vendor/user'),
            ], 'assets');

            // Publishing the translation files.
            $this->publishes([
                __DIR__.'/resources/lang' => resource_path('lang/vendor/user'),
            ], 'lang');

            // Registering package commands.
            $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'user');

        // Register the main class to use with the facade
        $this->app->singleton('user', function () {
            return new User;
        });
    }
}
