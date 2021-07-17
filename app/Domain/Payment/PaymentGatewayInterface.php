<?php


namespace App\Domain\Payment;


use App\Domain\Money\MoneyInterface;

interface PaymentGatewayInterface
{
    public function charge();
}
