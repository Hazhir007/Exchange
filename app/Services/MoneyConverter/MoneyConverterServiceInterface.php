<?php


namespace App\Services\MoneyConverter;


use App\Domain\Money\Money;
use App\Domain\Money\MoneyInterface;
use App\Repositories\PairCurrencyRepository\PairCurrencyRepositoryInterface;

interface MoneyConverterServiceInterface
{
    public function convert(
        MoneyInterface $fromCurrency,
        MoneyInterface $toCurrency
    );
}
