<?php

namespace App\Providers;
use Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend("vnuemail",function($attribute, $value,$parameters){
            $pattern = '/^[a-z0-9](\.?[a-z0-9]){2,}@vnu\.edu.vn$/';
            return preg_match($pattern, $value);
        });
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
