<?php


namespace App\Domain\Money\Factory\Currencies;


use App\Domain\Money\Factory\MoneyFactoryInterface;
use App\Domain\Money\MoneyInterface;

class IRR
{
    public function __construct(private MoneyFactoryInterface $moneyFactory)
    {

    }

    public function create(int $amount, ?string $from): MoneyInterface
    {
        return $this->moneyFactory->create('Iranian Rial', 'IRR', 0, $amount, $from);
    }
}
