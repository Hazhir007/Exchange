<?php


namespace App\Domain\Money\Factory\Currencies;


use App\Domain\Money\Factory\MoneyFactoryInterface;
use App\Domain\Money\MoneyInterface;

class EUR
{
    public function create(?int $amount, MoneyFactoryInterface $moneyFactory): MoneyInterface
    {
        return $moneyFactory->create('Euro', 'EUR', 2, $amount);
    }
}
