<?php


namespace App\Domain\Money\Factory;


use App\Domain\Currency\CurrencyInterface;
use App\Domain\Money\MoneyInterface;

class MoneyFactory implements MoneyFactoryInterface
{
    public function __construct(private MoneyInterface $money, private CurrencyInterface $currency)
    {

    }

    /**
     * @param string $name
     * @param string $code
     * @param int $scale
     * @param int|null $amount
     * @return MoneyInterface
     */
    public function create(string $name, string $code, int $scale, ?int $amount): MoneyInterface
    {
        $this->currency->setName($name);
        $this->currency->setCode($code);
        $this->currency->setScale($scale);
        $this->money->setCurrency($this->currency);
        $this->money->setAmount($amount);
        return $this->money;
    }
}
