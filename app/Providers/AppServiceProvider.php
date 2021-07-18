<?php

namespace App\Providers;

use App\Domain\Currency\Currency;
use App\Domain\Currency\CurrencyInterface;
use App\Domain\ExternalApi\ExchangeExternalApiInterface;
use App\Domain\ExternalApi\NavasanApi\NavasanApi;
use App\Domain\Money\Factory\Currencies\EUR;
use App\Domain\Money\Factory\Currencies\IRR;
use App\Domain\Money\Factory\Currencies\USD;
use App\Domain\Money\Factory\MoneyFactory;
use App\Domain\Money\Factory\MoneyFactoryInterface;
use App\Domain\Money\Money;
use App\Domain\Money\MoneyInterface;
use App\Domain\Payment\BankPaymentGateway;
use App\Domain\Payment\PaymentGatewayInterface;
use App\Domain\Payment\WalletPaymentGateway;
use App\Repositories\UserRepository\UserRepository;
use App\Repositories\UserRepository\UserRepositoryInterface;
use App\Services\MoneyConverter\MoneyConverterServiceService;
use App\Services\MoneyConverter\MoneyConverterServiceInterface;
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
            MoneyConverterServiceInterface::class,
            MoneyConverterServiceService::class
        );

//        $this->app->singleton(
//            PaymentGatewayInterface::class, function ($app) {
//                if (request()?->has('wallet')) {
//                    return new WalletPaymentGateway();
//                }
//
//                return new BankPaymentGateway();
//        });

//        $this->app->bind(
//            'USD',
//            USD::class
//        );

//        $this->app->bind(
//            'EUR',
//            EUR::class
//        );

        // Service Provider
        $this->app->bind('USD', function ($app) {
                return new USD(new MoneyFactory());
        });

        $this->app->bind('EUR', function ($app) {
            return new EUR(new MoneyFactory());
        });

        $this->app->bind('IRR', function ($app) {
            return new IRR(new MoneyFactory());
        });

        $this->app->bind(
            ExchangeExternalApiInterface::class,
            NavasanApi::class
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
