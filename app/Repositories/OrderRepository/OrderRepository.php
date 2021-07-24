<?php


namespace App\Repositories\OrderRepository;


use App\Domain\Money\MoneyInterface;
use App\Models\Order;
use App\Repositories\WalletRepository\WalletRepository;

class OrderRepository implements OrderRepositoryInterface
{

    public function __construct(
        private Order $model,
        private WalletRepository $walletRepository
    ) {

    }
    /**
     * @throws \Exception
     */
    public function addOrder(
        MoneyInterface $orderData,
        int $userId
    ) {

        $wallet = $this->walletRepository->findWallet($userId,$orderData->fromCurrency->getCurrency()->getCode());

        if ($wallet->amount >= $orderData->fromCurrency->getAmount()) {
            return $this->model->create([
                'user_id' => $userId,
                'from_currency_code' => $orderData->fromCurrency->getCurrency()->getCode(),
                'from_currency_amount' => $orderData->fromCurrency->getAmount(),
                'from_currency_formatted_amount' => $orderData->fromCurrency->getFormattedAmount(),
                'to_currency_code' => $orderData->getCurrency()->getCode(),
                'to_currency_true_amount' => $orderData->getTrueAmount(),
                'to_currency_formatted_amount' => $orderData->getFormattedAmount(),
                'fee_amount' => $orderData->getFeeAmount(),
                'formatted_fee_amount' => $orderData->getFormattedFeeAmount(),
                'formatted_fee_amount_in_irr' =>  0.0,
                'conversion_ratio' => $orderData->conversionRatio,
                'tracking_code' => random_int(1000, 9999).time()
            ]);
        }



        throw new \InvalidArgumentException('please check your wallet amount');
    }
}
