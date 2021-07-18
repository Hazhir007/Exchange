<?php

namespace App\Providers;

use App\Domain\Money\Factory\MoneyFactory;
use Illuminate\Support\ServiceProvider;

class CurrencyServiceProvider extends ServiceProvider
{
    private string $currencyNameWithoutExtension;
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//        foreach (glob(app_path() . '/Domain/Money/Factory/Currencies/*.php') as $currencyFactory) {
//            $currencyName = explode('/', $currencyFactory);
//            $currencyName = array_pop($currencyName);
//            $currencyNameAndExtension = explode('.', $currencyName);
//            $this->currencyNameWithoutExtension = $currencyNameAndExtension[0];
//            print_r($this->currencyNameWithoutExtension);
////            dd($this->currencyNameWithoutExtension);
//            $this->app->bind(
//                $this->currencyNameWithoutExtension, function ($app) {
//                    $temp = new ('\App\Domain\Money\Factory\Currencies\\' . ($this->currencyNameWithoutExtension))(new MoneyFactory());
//                    dump($temp->create());
//                    return $temp;
////                return new ('\App\Domain\Money\Factory\Currencies\\' . ($this->currencyNameWithoutExtension))(new MoneyFactory());
//            });
//        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
