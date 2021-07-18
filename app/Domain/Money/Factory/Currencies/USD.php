<?php


namespace App\Domain\Money\Factory\Currencies;


use App\Domain\Money\Factory\MoneyFactoryInterface;
use App\Domain\Money\MoneyInterface;

class USD
{
    public function __construct(private MoneyFactoryInterface $money)
    {

    }

    public function create(int $amount, ?string $from): MoneyInterface
    {
        return $this->money->create('US Dollar', 'USD', 2, $amount, $from);
    }
}
