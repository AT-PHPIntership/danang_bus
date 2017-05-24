<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Observers\UserObserver;
use App\Models\User;
use Laravel\Dusk\DuskServiceProvider;

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
            ['admin.directions.create','admin.directions.edit','danabus.search.index'],
            'App\Http\ViewComposers\RouteComposer'
        );
        View::composer(
            ['admin.routes.create','admin.routes.edit'],
            'App\Http\ViewComposers\StopComposer'
        );
        View::composer(
            'admin.news.create',
            'App\Http\ViewComposers\CategoryComposer'
        );
        View::composer(
            'admin.users.index',
            'App\Http\ViewComposers\UserComposer'
        );
        View::composer(['danabus.index.index','admin.news.create'], 'App\Http\ViewComposers\CategoryComposer');
        
        User::observe(UserObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
    }
}
