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

        $this->app->bind('RequestResponseBuilder', function(){
            return app('App\Components\ResponseBuilder\RequestResponseBuilder');
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

        $this->app->bind('requestModel', function(){
            return app('App\Models\Request');
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

        $this->app->bind('requestService', function(){
            return app('App\Services\Request');
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
