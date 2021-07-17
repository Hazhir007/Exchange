<?php


namespace App\Domain\Money;


use App\Domain\Currency\CurrencyInterface;

class Money implements MoneyInterface
{
    public function __construct(protected CurrencyInterface $currency, protected ?int $amount)
    {

    }

    public function setAmount(?int $amount)
    {
        $this->amount = $amount;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setCurrency(CurrencyInterface $currency)
    {
        $this->currency = $currency;
    }

    public function getCurrency(): CurrencyInterface
    {
        return $this->currency;
    }

    public function equals(Money $other): bool
    {
        if ($this->currency !== $other->currency) {
            return false;
        }

        if ($this->amount === $other->amount) {
            return true;
        }

        return false;
    }

}
