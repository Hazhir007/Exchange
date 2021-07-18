<?php


namespace App\Domain\Money;


use App\Domain\Currency\CurrencyInterface;

interface MoneyInterface
{
    public function setAmount(int $amount, ?string $from);

    public function getAmount(): int;

    public function setCurrency(CurrencyInterface $currency);

    public function getCurrency(): CurrencyInterface;

    public function equals(Money $other): bool;
}
