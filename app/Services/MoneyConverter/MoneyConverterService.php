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
        MoneyInterface $toCurrency): MoneyInterface
    {
        if ($fromCurrency->getCurrency()->sameAs($toCurrency->getCurrency()))  {
            throw new \InvalidArgumentException('Currencies must not be identical');
        }

        $pair = $this->pairCurrencyRepository->findPair(
            $fromCurrency->getCurrency()->getCode().$toCurrency->getCurrency()->getCode()
        );
//        dd($pair);

        if (! $pair) {
            throw new ModelNotFoundException('pair can not be found');
        }


        $feeAmount = $fromCurrency->getAmount() * $pair->conversion_ratio * $pair->fee;
        ;
        $result = ($fromCurrency->getAmount() * $pair->conversion_ratio) - ($feeAmount);
        $toCurrency->setTrueAmount($result);
        $toCurrency->setAmount($result, null);
//        $result = (int)round($result, 0, PHP_ROUND_HALF_DOWN);
        $toCurrency->setFormattedAmount($toCurrency->getFormattedAmount());
        $toCurrency->setFeeAmount($feeAmount);
        $toCurrency->setFormattedFeeAmount($feeAmount);
        $toCurrency->conversionRatio = $pair->conversion_ratio;
        return $toCurrency;
    }
}
