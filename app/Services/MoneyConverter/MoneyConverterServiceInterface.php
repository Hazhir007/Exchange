<?php


namespace App\Services\MoneyConverter;


use App\Domain\Money\Money;
use App\Domain\Money\MoneyInterface;
use App\Http\Resources\CurrencyConverterResources\CurrencyConverterResource;
use App\Http\Resources\CurrencyConverterResources\DatabaseInsertionResource;
use App\Repositories\PairCurrencyRepository\PairCurrencyRepositoryInterface;

interface MoneyConverterServiceInterface
{
    public function convert(
        MoneyInterface $fromCurrency,
        MoneyInterface $toCurrency
    );
}
