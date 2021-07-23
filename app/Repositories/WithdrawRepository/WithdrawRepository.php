<?php


namespace App\Repositories\WithdrawRepository;


use App\Domain\Money\MoneyInterface;

class WithdrawRepository implements WithdrawRepositoryInterface
{

    public function withdraw(MoneyInterface $money, int $userId)
    {
        return $this->model->create([
            'user_id' => $userId,
            'currency_code' => $money->getCurrency()->getCode(),
            'amount' => $money->getAmount()
        ])->refresh();
    }
}
