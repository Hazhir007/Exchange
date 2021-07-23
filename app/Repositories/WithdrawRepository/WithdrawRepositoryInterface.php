<?php


namespace App\Repositories\WithdrawRepository;


use App\Domain\Money\MoneyInterface;

interface WithdrawRepositoryInterface
{
    public function withdraw(MoneyInterface $money, int $userId);
}
