<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CommentsServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Route
        // include __DIR__.'/routes.php';

        $this->app->singleton('LaravelLikeComment', function ($app) { return new LaravelLikeComment; });

        // Config
        // $this->mergeConfigFrom( __DIR__.'/config/laravelLikeComment.php', 'laravelLikeComment');

        // View
        // $this->loadViewsFrom(__DIR__.'/views', 'laravelLikeComment');
    }
}
