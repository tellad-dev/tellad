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

        $this->app->bind('authResponseBuilder', function(){
            return app('App\Components\ResponseBuilder\AuthResponseBuilder');
        });

        $this->app->bind('userResponseBuilder', function(){
            return app('App\Components\ResponseBuilder\UserResponseBuilder');
        });
        
        $this->app->bind('adRequestResponseBuilder', function(){
            return app('App\Components\ResponseBuilder\AdRequestResponseBuilder');
        });

        $this->app->bind('profileResponseBuilder', function(){
            return app('App\Components\ResponseBuilder\ProfileResponseBuilder');
        });

        $this->app->bind('businessResponseBuilder', function(){
            return app('App\Components\ResponseBuilder\BusinessResponseBuilder');
        });

        $this->app->bind('adResponseBuilder', function(){
            return app('App\Components\ResponseBuilder\AdResponseBuilder');
        });

        $this->app->bind('shopResponseBuilder', function(){
            return app('App\Components\ResponseBuilder\ShopResponseBuilder');
        });

        $this->app->bind('spaceResponseBuilder', function(){
            return app('App\Components\ResponseBuilder\SpaceResponseBuilder');
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

        $this->app->bind('profileModel', function(){
        return app('App\Models\Profile');
        });

        $this->app->bind('businessModel', function(){
        return app('App\Models\Business');
        });

        $this->app->bind('adModel', function(){
        return app('App\Models\Ad');
        });

        $this->app->bind('shopModel', function(){
        return app('App\Models\Shop');
        });

        $this->app->bind('spaceModel', function(){
        return app('App\Models\Space');
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

        $this->app->bind('profileService', function(){
        return app('App\Services\Profile');
        });

        $this->app->bind('businessService', function(){
        return app('App\Services\Business');
        });

        $this->app->bind('adService', function(){
        return app('App\Services\Ad');
        });

        $this->app->bind('shopService', function(){
        return app('App\Services\Shop');
        });

        $this->app->bind('spaceService', function(){
        return app('App\Services\Space');
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
