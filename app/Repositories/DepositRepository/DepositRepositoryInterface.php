<?php


namespace App\Repositories\DepositRepository;


use App\Domain\Money\MoneyInterface;

interface DepositRepositoryInterface
{
    public function deposit(MoneyInterface $money, int $userId);
}
