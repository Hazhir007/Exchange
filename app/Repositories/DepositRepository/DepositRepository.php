<?php


namespace App\Repositories\DepositRepository;


use App\Domain\Money\MoneyInterface;
use App\Models\deposit;
use App\Repositories\WalletRepository\WalletRepository;


class DepositRepository implements DepositRepositoryInterface
{

    public function __construct(private Deposit $model)
    {

    }

    public function deposit(MoneyInterface $money, int $userId)
    {
        return $this->model->create([
            'user_id' => $userId,
            'currency_code' => $money->getCurrency()->getCode(),
            'amount' => $money->getAmount()
        ])->refresh();
    }

//    public function updateWalletAmount(WalletRepository $walletRepository)
//    {
//        return $walletRepository->
//    }
}
