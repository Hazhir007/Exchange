<?php


namespace App\Repositories\OrderRepository;


use App\Domain\Money\MoneyInterface;

interface OrderRepositoryInterface
{
    public function addOrder(MoneyInterface $money, int $userId);
}
