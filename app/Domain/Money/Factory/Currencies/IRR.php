<?php


namespace App\Domain\Money\Factory\Currencies;


use App\Domain\Money\Factory\MoneyFactoryInterface;
use App\Domain\Money\MoneyInterface;

class IRR
{
    public function create(?int $amount, MoneyFactoryInterface $moneyFactory): MoneyInterface
    {
        return $moneyFactory->create('Iranian Rial', 'IRR', 0, $amount);
    }
}
