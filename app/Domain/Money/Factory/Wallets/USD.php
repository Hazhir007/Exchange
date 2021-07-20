<?php


namespace App\Domain\Money\Factory\Wallets;


use App\Domain\Money\Factory\MoneyFactoryInterface;
use App\Domain\Money\MoneyInterface;

class USD
{
    public function __construct(private MoneyFactoryInterface $money)
    {

    }

    public function create(int $amount, ?string $from = null): MoneyInterface
    {
        return $this->money->create('US Dollar', 'USD', 2, $amount, $from);
    }
}
