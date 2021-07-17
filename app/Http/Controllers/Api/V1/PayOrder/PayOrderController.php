<?php


namespace App\Http\Controllers\Api\V1\PayOrder;


use App\Domain\Currency\Currency;
use App\Domain\Money\Money;
use App\Domain\Payment\BankPaymentGateway;

class PayOrderController
{
    public function __invoke(BankPaymentGateway $paymentGateway): void
    {
//        $currency = new Currency();
//        $currency->setName('US Dollar');
//        $currency->setCode('USD');
//        $currency->setScale(2);
//        $money = new Money($currency, 2500);
        dd($paymentGateway->charge());
    }
}
