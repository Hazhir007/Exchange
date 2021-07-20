<?php

namespace App\Providers;

use App\Repositories\PairCurrencyRepository\PairCurrencyRepository;
use App\Repositories\PairCurrencyRepository\PairCurrencyRepositoryInterface;
use App\Repositories\UserRepository\UserRepository;
use App\Repositories\UserRepository\UserRepositoryInterface;
use App\Repositories\WalletRepository\WalletRepository;
use App\Repositories\WalletRepository\WalletRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
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
            PairCurrencyRepositoryInterface::class,
            PairCurrencyRepository::class
        );

        $this->app->bind(
            WalletRepositoryInterface::class,
            WalletRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
