<?php


namespace App\Domain\Money\Factory\Wallets;


use App\Domain\Currency\CurrencyInterface;
use App\Domain\Money\Factory\MoneyFactoryInterface;
use App\Domain\Money\Money;
use App\Domain\Money\MoneyInterface;

class EUR
{
    public function __construct(private MoneyFactoryInterface $money)
    {

    }

    public function create(int $amount , ?string $from = null): MoneyInterface
    {
        return $this->money->create('Euro', 'EUR', 2, $amount, $from);
    }
}
