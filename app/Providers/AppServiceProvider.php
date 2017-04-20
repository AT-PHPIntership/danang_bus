<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer(
            ['admin.directions.create','admin.directions.edit'],
            'App\Http\ViewComposers\RouteComposer'
        );
        View::composer(
            ['admin.directions.create','admin.directions.edit'],
            'App\Http\ViewComposers\StopComposer'
        );
        View::composer(['danabus.index.index','admin.news.create'], 'App\Http\ViewComposers\CategoryComposer');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
