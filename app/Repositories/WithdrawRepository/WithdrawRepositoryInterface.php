<?php


namespace App\Repositories\WithdrawRepository;


use App\Domain\Money\MoneyInterface;
use App\Repositories\WalletRepository\WalletRepositoryInterface;

interface WithdrawRepositoryInterface
{
    public function withdraw(MoneyInterface $money, int $userId);
}
