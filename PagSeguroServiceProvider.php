<?php

namespace MichelMelo\EasyPay;

use Illuminate\Support\ServiceProvider;

class EasyPayServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('easypay', function ($app) {
            return new EasyPay($app['log'], $app['validator']);
        });

        $this->app->bind('easypay_recorrente', function ($app) {
            return new EasyPayRecorrente($app['log'], $app['validator']);
        });

        $this->app->bind('easypay_boleto', function ($app) {
            return new EasyPayBoleto($app['log'], $app['validator']);
        });
    }

    public function boot()
    {
        if (!method_exists($this->app, 'routesAreCached')) {
            require __DIR__.'/routes.php';

            return; // lumen
        }

        if (!$this->app->routesAreCached()) {
            require __DIR__.'/routes.php';
        }

        $this->publishes([
            __DIR__.'/Config.php' => config_path('mm-easypay.php'),
        ],
        'config');
    }
}
