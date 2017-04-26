<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Observers\UserObserver;
use App\Models\User;

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
        //
    }
}
