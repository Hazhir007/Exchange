<?php


namespace App\Services\MoneyConverter;


use App\Domain\Money\MoneyInterface;

class MoneyConverterServiceService implements MoneyConverterServiceInterface
{
    public function convert(MoneyInterface $fromCurrency, MoneyInterface $toCurrency,
                            int|float $conversionRatio, int|float $fee): MoneyInterface
    {
        if ($fromCurrency->getCurrency()->sameAs($toCurrency->getCurrency()))  {
            throw new \InvalidArgumentException('Currencies must not be identical');
        }

        $result = ($fromCurrency->getAmount() * $conversionRatio) - ($fromCurrency->getAmount() * $conversionRatio * $fee);
        $toCurrency->setTrueAmount($result);
        $toCurrency->setAmount($result, null);
        $result = (int)round($result, 0, PHP_ROUND_HALF_DOWN);
        $toCurrency->setFormattedAmount($toCurrency->getFormattedAmount($result));

        return $toCurrency;
    }
}
