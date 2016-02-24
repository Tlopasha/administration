<?php

namespace Stevebauman\Administration;

use Illuminate\Support\ServiceProvider;

class AdministrationServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        // The assets path.
        $assets = __DIR__.'/../resources/assets/';

        // The views path.
        $views = __DIR__.'/../resources/views/';

        // The controllers path.
        $controllers = __DIR__.'/Http/Controllers/';

        // The presenters path.
        $presenters = __DIR__.'/Http/Presenters/';

        // The requests path.
        $requests = __DIR__.'/Http/Requests/';

        // The middleware path.
        $middleware = __DIR__.'/Http/Middleware/';

        // The administration routes file.
        $routes = __DIR__.'/Http/administration.php';

        // The models path.
        $models = __DIR__.'/Models/';

        // The exceptions path.
        $exceptions = __DIR__.'/Exceptions/';

        // The processors path.
        $processors = __DIR__.'/Processors/';

        // The providers path.
        $providers = __DIR__.'/Providers/';

        // The jobs path.
        $jobs = __DIR__.'/Jobs/';

        // The migrations path.
        $migrations = __DIR__.'/Migrations/';

        // The authorization tag.
        $tag = 'administration';

        // Add all publishable scaffolding.
        $this->publishes([
            $assets => public_path(),
            $views => resource_path('views'),
            $controllers => app_path('Http/Controllers'),
            $presenters => app_path('Http/Presenters'),
            $requests => app_path('Http/Requests'),
            $middleware => app_path('Http/Middleware'),
            $routes => app_path('Http/administration.php'),
            $models => app_path('Models'),
            $exceptions => app_path('Exceptions'),
            $processors => app_path('Processors'),
            $providers => app_path('Providers'),
            $jobs => app_path('Jobs'),
            $migrations => database_path('migrations'),
        ], $tag);
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        //
    }
}
