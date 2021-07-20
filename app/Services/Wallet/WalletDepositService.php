<?php


namespace App\Services\Wallet;


use App\Repositories\WalletRepository\WalletRepositoryInterface;
use Illuminate\Contracts\Auth\Authenticatable;

class WalletDepositService
{
    public function __construct(
        private Authenticatable $user,
        private WalletRepositoryInterface $walletRepository
    ) {}

    public function deposit(string $currencyCode, int $amount)
    {

    }
}
