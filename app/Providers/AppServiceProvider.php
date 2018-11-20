<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Blade::if('admin', function () {
            return auth()->user()->admin;
        });

         \View::composer("*", function($view){
            $settings = \Cache::rememberForever("settings", function(){
                return \App\Setting::first();
            });

            $categories = \Cache::rememberForever("categories", function(){
                return \App\Category::all();
            });
            return $view->with('settings', $settings)->with('categories', $categories);
         });

        \Schema::defaultStringLength(191);
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
