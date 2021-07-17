<?php


namespace App\Domain\Payment;


use App\Domain\Currency\Currency;
use App\Domain\Money\MoneyInterface;
use Illuminate\Support\Str;

class BankPaymentGateway implements PaymentGatewayInterface
{

    public function __construct(private Currency $currency, private MoneyInterface $money)
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
            'currency' => $this->currency
        ];
    }
}
