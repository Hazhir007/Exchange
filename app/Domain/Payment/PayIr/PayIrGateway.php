<?php


namespace App\Domain\Payment\PayIr;


use App\Domain\ClientRequest\ClientRequestInterface;
use App\Domain\Money\MoneyInterface;
use App\Domain\Payment\PaymentGatewayInterface;

class PayIrGateway implements PaymentGatewayInterface
{
    public const PAY_IR_API_KEY = 'test';

    public const PAY_IR_BASE_API_URI = 'https://pay.ir/pg';

    public const PAY_IR_VERIFY_URI = self::PAY_IR_BASE_API_URI.'/verify';

    public const PAY_IR_SEND_URI = self::PAY_IR_BASE_API_URI.'/send';

    public function __construct(
        private ClientRequestInterface $request,
        private MoneyInterface $money) {}

    public function pay(?array $data): string
    {
        if ($data !== null && $this->money->getCurrency()->getCode() === 'IRR') {

            return $this->request->postRequest(self::PAY_IR_SEND_URI, [
                'api'          => self::PAY_IR_API_KEY,
                'amount'       => $this->money->getAmount(),
                'redirect'     => $data['redirect'],
                'mobile'       => $data['mobile'],
                'factorNumber' => $data['factorNumber'],
                'description'  => $data['description'],
            ]);

        }

        throw new \InvalidArgumentException('currency should be IRR');

    }

    public function verify(array $data): string
    {
        return $this->request->postRequest(self::PAY_IR_VERIFY_URI, [
            'api'          => self::PAY_IR_API_KEY,
            'token'       => $data['token']
        ]);
    }
}
