<?php


namespace App\Domain\Money\Factory;


use App\Domain\Currency\Currency;
use App\Domain\Money\Money;
use App\Domain\Money\MoneyInterface;

class MoneyFactory implements MoneyFactoryInterface
{

    private Currency $currency;
    private Money $money;


    public function __construct()
    {
        $this->currency = new Currency();
        $this->money = new Money($this->currency);
    }

    /**
     * @param string $name
     * @param string $code
     * @param int $scale
     * @param int|null $amount
     * @return MoneyInterface
     */
    public function create(string $name, string $code, int $scale, ?int $amount, ?string $from): MoneyInterface
    {
        $this->currency->setName($name);
        $this->currency->setCode($code);
        $this->currency->setScale($scale);
        $this->money->setCurrency($this->currency);
        $this->money->setAmount($amount, $from);
        return $this->money;
    }
}
