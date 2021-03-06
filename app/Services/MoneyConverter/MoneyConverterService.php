<?php


namespace App\Services\MoneyConverter;


use App\Domain\Money\MoneyInterface;
use App\Repositories\PairCurrencyRepository\PairCurrencyRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MoneyConverterService implements MoneyConverterServiceInterface
{
    public function __construct(
        private PairCurrencyRepositoryInterface $pairCurrencyRepository
    ){}

    public function convert(
        MoneyInterface $fromCurrency,
        MoneyInterface $toCurrency)
    {
        if ($fromCurrency->getCurrency()->sameAs($toCurrency->getCurrency()))  {
            throw new \InvalidArgumentException('Currencies must not be identical');
        }

        $pair = $this->pairCurrencyRepository->findPair(
            $fromCurrency->getCurrency()->getCode().$toCurrency->getCurrency()->getCode()
        );

        if (! $pair) {
            throw new ModelNotFoundException('pair can not be found');
        }



        $feeAmount = $fromCurrency->getAmount() * $pair->conversion_ratio * $pair->fee;
        $result = ($fromCurrency->getAmount() * $pair->conversion_ratio) - ($feeAmount);
        $toCurrency->setTrueAmount($result);
        $toCurrency->setAmount($result, null);
        $toCurrency->setFormattedAmount($toCurrency->getFormattedAmount());

        $fromCurrency->setFormattedAmount($fromCurrency->getFormattedAmount());
//        dd($fromCurrency);
        $toCurrency->setFeeAmount($feeAmount);
        $toCurrency->setFormattedFeeAmount($feeAmount);
        $toCurrency->conversionRatio = $pair->conversion_ratio;


        $toCurrency->fromCurrency = $fromCurrency;

        return $toCurrency;
    }
}
