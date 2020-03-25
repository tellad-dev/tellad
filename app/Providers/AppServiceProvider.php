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
        /*
        |
        --------------------------------------------------------------------------
        | Component
        |
        --------------------------------------------------------------------------
        */
        $this->app->bind('arrayUtil', function(){
            return app('App\Components\ArrayUtil');
        });

        $this->app->bind('apiResponseBuilder', function(){
            return app('App\Components\ResponseBuilder\ApiResponseBuilder');
        });

        $this->app->bind('adRequestResponseBuilder', function(){
            return app('App\Components\ResponseBuilder\AdRequestResponseBuilder');
        });


        /*
        |
        --------------------------------------------------------------------------
        | Model
        |
        --------------------------------------------------------------------------
        */
        $this->app->bind('userModel', function(){
            return app('App\Models\User');
        });

        $this->app->bind('adRequestModel', function(){
            return app('App\Models\AdRequest');
        });


        /*
        |
        --------------------------------------------------------------------------
        | Service
        |
        --------------------------------------------------------------------------
        */
        $this->app->bind('userService', function(){
            return app('App\Services\User');
        });

        $this->app->bind('adRequestService', function(){
            return app('App\Services\AdRequest');
        });
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
