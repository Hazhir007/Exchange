<?php


namespace App\Domain\Money\Factory\Wallets;


use App\Domain\Money\Factory\MoneyFactoryInterface;
use App\Domain\Money\MoneyInterface;

class IRR
{
    public function __construct(private MoneyFactoryInterface $money)
    {

    }

    public function create(int $amount, ?string $from = null): MoneyInterface
    {
        return $this->money->create('Iranian Rial', 'IRR', 0, $amount, $from);
    }
}
