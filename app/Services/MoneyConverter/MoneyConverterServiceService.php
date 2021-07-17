<?php


namespace App\Services\MoneyConverter;


use App\Domain\Money\Money;
use App\Domain\Money\MoneyInterface;

class MoneyConverterServiceService implements MoneyConverterServiceInterface
{
    public function convert(MoneyInterface $fromCurrency, MoneyInterface $toCurrency, int|float $conversionRatio, int|float $fee): Money
    {
        if ($fromCurrency->getCurrency()->sameAs($toCurrency->getCurrency()))  {
            throw new \InvalidArgumentException('Currencies must not be identical');
        }

        return $toCurrency->setAmount(
            $fromCurrency->getAmount() * $conversionRatio - ($fromCurrency->getAmount() * $conversionRatio) / $fee
        );
    }
}
