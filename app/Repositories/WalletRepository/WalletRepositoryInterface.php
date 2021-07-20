<?php


namespace App\Repositories\WalletRepository;


use App\Domain\Money\MoneyInterface;

interface WalletRepositoryInterface
{
    public function all();
    public function create(MoneyInterface  $money, int $userId);
}
