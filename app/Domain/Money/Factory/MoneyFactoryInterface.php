<?php


namespace App\Domain\Money\Factory;


use App\Domain\Currency\CurrencyInterface;
use App\Domain\Money\MoneyInterface;

interface MoneyFactoryInterface
{
    public function __construct(MoneyInterface $money, CurrencyInterface $currency);

    public function create(string $name, string $code, int $scale, ?int $amount): MoneyInterface;
}
