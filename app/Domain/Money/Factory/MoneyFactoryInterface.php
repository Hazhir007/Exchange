<?php


namespace App\Domain\Money\Factory;


use App\Domain\Currency\CurrencyInterface;
use App\Domain\Money\MoneyInterface;

interface MoneyFactoryInterface
{
    public function __construct();

    public function create(string $name, string $code, int $scale, ?int $amount, ?string $from = null): MoneyInterface;
}
