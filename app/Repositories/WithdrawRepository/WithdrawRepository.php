<?php


namespace App\Repositories\WithdrawRepository;


use App\Domain\Money\MoneyInterface;
use App\Models\Withdraw;
use App\Repositories\WalletRepository\WalletRepositoryInterface;


class WithdrawRepository implements WithdrawRepositoryInterface
{

    public function __construct(private Withdraw $model, private WalletRepositoryInterface $walletRepository)
    {

    }

    public function withdraw(MoneyInterface $money, int $userId)
    {
        if ($wallet = $this->walletRepository->findWallet($userId, $money->getCurrency()->getCode())) {

            if ($wallet->amount >= $money->getAmount()) {
                return $this->model->create([
                    'user_id' => $userId,
                    'currency_code' => $money->getCurrency()->getCode(),
                    'amount' => $money->getAmount()
                ])->refresh();
            }

        }
    }
}
