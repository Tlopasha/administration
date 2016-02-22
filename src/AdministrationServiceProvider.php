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

        // The processors path.
        $processors = __DIR__.'/Processors/';

        // The authorization tag.
        $tag = 'administration';

        // Add all publishable scaffolding.
        $this->publishes([
            $assets => public_path(),
            $views => resource_path('views'),
            $controllers => app_path('Http/Controllers'),
            $presenters => app_path('Http/Presenters'),
            $requests => app_path('Http/Requests'),
            $processors => app_path('Processors'),
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
