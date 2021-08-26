<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
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




        view()->composer('*', function($view)
        {
            if (Auth::check()) {
                $has_hospital = isset(Auth::user()->hospital_id) ? true : false;
                $is_registrar = isset(Auth::user()->Title) && (Auth::user()->Title == 'Registrar') ? true : false;

                if($is_registrar){
                    $nav_fields = [
                        'Dashboard',
                        'Hospital',
                        'Entries',
                        'Administrator'
                    ];
                }else{
                    if($has_hospital){
                        $nav_fields = [
                            'Dashboard',
                            'Entries',
                            'Account'
                        ];
                    }else{
                        $nav_fields = [
                            'Dashboard',
                            'Entries',
                            'Administrator'
                        ];
                    }
                }

                $nav_fields = collect($nav_fields);
                $nav_fields = $nav_fields->toJson();

                $view->with('nav_buttons',$nav_fields);
            }
        });
    }
}
