<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $theme = request()->cookie('theme', 'light');
            $view->with('theme', $theme);
        });
    }

    public function register()
    {
        //
    }
}
