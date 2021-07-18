<?php


namespace App\Domain\Money;


use App\Domain\Currency\CurrencyInterface;

class Money implements MoneyInterface
{
    private int $amount;

    private float $formattedAmount;

    private float $trueAmount;

    public function __construct(private CurrencyInterface $currency)
    {

    }

    public function setTrueAmount(float $amount)
    {
        $this->trueAmount = $amount / (10**$this->currency->getScale());
    }

    public function getTrueAmount(float $amount): float
    {
        return $this->trueAmount;
    }

    public function setAmount(int $amount, ?string $from = null)
    {
        if ($from === 'user') {
            $this->amount = $amount * (10**$this->currency->getScale());
        } else {
            $this->amount = $amount;
        }
    }

    public function setFormattedAmount(float $formattedAmount)
    {
        $this->formattedAmount = $formattedAmount;
    }

    public function getFormattedAmount(int $amount): float
    {
        return ( $this->formattedAmount = $amount / (10**$this->currency->getScale()) );
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
        if ($this->currency !== $other->getCurrency()) {
            return false;
        }

        if ($this->amount === $other->amount) {
            return true;
        }

        return false;
    }

}
