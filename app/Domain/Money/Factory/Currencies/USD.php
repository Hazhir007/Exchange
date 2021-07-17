<?php


namespace App\Domain\Money\Factory\Currencies;


use App\Domain\Money\Factory\MoneyFactoryInterface;
use App\Domain\Money\MoneyInterface;

class USD
{
    public function create(?int $amount, MoneyFactoryInterface $money): MoneyInterface
    {
        return $money->create('US Dollar', 'USD', 2, $amount);
    }
}
