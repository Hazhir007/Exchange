<?php


namespace App\Services\MoneyConverter;


use App\Domain\Money\Money;
use App\Domain\Money\MoneyInterface;

interface MoneyConverterServiceInterface
{
    public function convert(MoneyInterface $fromCurrency, MoneyInterface $toCurrency, int|float $conversionRatio, int|float $fee);
}
