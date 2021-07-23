<?php


namespace App\Services\Wallet;


use App\Domain\Money\MoneyInterface;
use App\Repositories\DepositRepository\DepositRepositoryInterface;
use Illuminate\Contracts\Auth\Authenticatable;

class WalletDepositService
{
    public function __construct(
        private Authenticatable $user,
        private DepositRepositoryInterface $depositRepository
    ) {}

    public function deposit(MoneyInterface $money): bool
    {
        if ($this->user) {
            $this->depositRepository->deposit($money, $this->user->id);
            return true;
        }

        return false;
    }
}
