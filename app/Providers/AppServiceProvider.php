<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use \Illuminate\Validation\Factory;
use Carbon\Carbon;
use Rut;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Factory $factory)
    {
        Carbon::setLocale('es');
        
        //Custom Validator Rut
        $factory->extend('rut_valid',
            function ($attribute, $value, $parameters)
            {
                return Rut::check($value);
            }
            ,'El campo Rut no tiene un formato válido'
        );
        //
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
