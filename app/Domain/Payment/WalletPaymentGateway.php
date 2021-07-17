<?php


namespace App\Domain\Payment;


use App\Domain\Money\MoneyInterface;
use Illuminate\Support\Str;

class WalletPaymentGateway
{
    public function __construct(private MoneyInterface $money)
    {

    }

    /**
     * @param MoneyInterface $money
     * @return array
     */
    public function charge(): array
    {
        return [
            'amount' => $this->money->getAmount(),
            'confirmation_number' => Str::random(),
            'currency' => $this->money->getCurrency()
        ];
    }
}
