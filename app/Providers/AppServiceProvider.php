<?php

namespace App\Providers;

use App\Billing\CreditPayment;
use App\Billing\PaymentGateway;
use App\Billing\PaymentGatewayContract;
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
        $this->app->singleton(PaymentGatewayContract::class, function ($app) {

            if (request()->has('credit')) {
                return new CreditPayment('Rp');
            }
            return new PaymentGateway('Rp');
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
