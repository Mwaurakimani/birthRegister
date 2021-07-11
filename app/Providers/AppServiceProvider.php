<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use View;

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
        $nav_fields = [
            'Dashboard',
            'Hospital',
            'Entries',
            'Administrators'
        ];

        $nav_fields = collect($nav_fields);
        $nav_fields = $nav_fields->toJson();

        View::share('nav_buttons', $nav_fields);
    }
}
