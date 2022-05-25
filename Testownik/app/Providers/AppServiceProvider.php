<?php

namespace App\Providers;
use App\Composers\Comp;
use Illuminate\Support\ServiceProvider;


use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // Using class based composers...
        View::composer('header', Comp::class);
    }
}
