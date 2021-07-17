<?php

namespace App\Providers;

use App\Domain\Currency\Currency;
use App\Domain\Currency\CurrencyInterface;
use App\Domain\Money\Factory\Currencies\USD;
use App\Domain\Money\Factory\MoneyFactory;
use App\Domain\Money\Factory\MoneyFactoryInterface;
use App\Domain\Money\Money;
use App\Domain\Money\MoneyInterface;
use App\Repositories\UserRepository\UserRepository;
use App\Repositories\UserRepository\UserRepositoryInterface;
use App\Services\MoneyConverter\MoneyConverter;
use App\Services\MoneyConverter\MoneyConverterInterface;
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
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );


        $this->app->bind(
            MoneyInterface::class,
            Money::class
        );


        $this->app->bind(
            CurrencyInterface::class,
            Currency::class
        );

        $this->app->bind(
            MoneyFactoryInterface::class,
            MoneyFactory::class
        );

        $this->app->bind(
            MoneyConverterInterface::class,
            MoneyConverter::class
        );

        $this->app->bind(
            'USD',
            USD::class
        );

        $this->app->bind(
            'EUR',
            USD::class
        );

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
