<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Validator;
use Hash;
use Socialite;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('*', function ($view) 
        {
            $instantiator = new \Doctrine\Instantiator\Instantiator();
            $instance = $instantiator->instantiate(\App\Http\Controllers\Helper\Front\Helper::class);
            $config_main = $instance->getConfig();
            $config_other = $instance->getConfigOther();
            $config_language = $instance->getConfigLanguage(\Session::get('locale'));
            $menu = $instance->getMenu();
            $ads = $instance->getAds();
            $config_rating = $instance->getRating();
            Paginator::defaultView('pagination::bootstrap-4');
            Paginator::defaultSimpleView('pagination::bootstrap-4');
            View::share('config_main', $config_main);
            View::share('config_language', $config_language);
            View::share('config_other', $config_other);
            View::share('config_rating', $config_rating);
            View::share('menu', $menu);
            View::share('ads', $ads);
            View::share('now', Carbon::now());
           // View::share('map_distance', $map_distance);
            View::share('noimage', asset('assets/frontend/images/no_image.png'));
        });  

        Validator::extend('base64', function ($attribute, $value, $parameters, $validator) {
            if (preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $value)) {
                return true;
            } else {
                return false;
            }
        });
        Validator::extend('base64image', function ($attribute, $value, $parameters, $validator) {
            if(empty($value)) {
                return true;
            }
            $explode = explode(',', $value);
            $allow = ['png', 'jpg', 'svg', 'gif', 'bmp', 'jpeg'];
            $format = str_replace(
                [
                    'data:image/',
                    ';',
                    'base64',
                ],
                [
                    '', '', '',
                ],
                $explode[0]
            );
            // check file format
            if (!in_array($format, $allow)) {
                return false;
            }
            // check base64 format
            if (!preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $explode[1])) {
                return false;
            }
            return true;
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register(\Reliese\Coders\CodersServiceProvider::class);
        }
    }
}
