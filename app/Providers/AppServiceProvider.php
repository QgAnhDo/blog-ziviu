<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //require ('..\App\Helpers\helpers.php');

        $this->app->bind(
            'App\Repositories\HomeRepositoryInterface',
            'App\Repositories\HomeRepository'
        );
        $this->app->bind(
            'App\Repositories\PostRepositoryInterface',
            'App\Repositories\PostRepository'
        );
        $this->app->bind(
            'App\Repositories\CategoryRepositoryInterface',
            'App\Repositories\CategoryRepository'
        );
        $this->app->bind(
            'App\Repositories\SearchRepositoryInterface',
            'App\Repositories\SearchRepository'
        );
        $this->app->bind(
            'App\Repositories\TagRepositoryInterface',
            'App\Repositories\TagRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
