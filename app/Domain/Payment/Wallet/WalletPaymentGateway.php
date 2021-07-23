<?php


namespace App\Domain\Payment\Wallet;


use App\Domain\Money\MoneyInterface;
use App\Domain\Payment\PaymentGatewayInterface;
use Illuminate\Support\Str;

class WalletPaymentGateway implements PaymentGatewayInterface
{
    public function __construct(private MoneyInterface $money)
    {

    }

    /**
     * @param MoneyInterface $money
     * @return array
     */
    public function pay(?array $data): array
    {

//        return [
//            'amount' => $this->money->getAmount(),
//            'confirmation_number' => Str::random(),
//            'currency' => $this->money->getCurrency()
//        ];
    }
}
