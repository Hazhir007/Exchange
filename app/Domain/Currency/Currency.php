<?php


namespace App\Domain\Currency;


use App\Domain\Money\Money;

class Currency implements CurrencyInterface
{
    private string $name;

    private int $scale;

    private string $code;

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setScale(int $scale)
    {
        $this->scale = $scale;
    }

    public function getScale(): string
    {
        return $this->scale;
    }

    public function setCode(string $code)
    {
        $this->code = strtoupper($code);
    }

    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param Currency $otherCurrency
     * @return bool
     */
    public function sameAs(Currency $otherCurrency): bool
    {
        return $this->code === $otherCurrency->code;
    }

}
