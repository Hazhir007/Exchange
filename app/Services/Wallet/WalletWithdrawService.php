<?php


namespace App\Services\Wallet;


use App\Domain\Money\MoneyInterface;
use App\Repositories\WalletRepository\WalletRepositoryInterface;
use App\Repositories\WithdrawRepository\WithdrawRepositoryInterface;
use Exception;
use Illuminate\Contracts\Auth\Authenticatable;

class WalletWithdrawService
{
    public function __construct(
        private Authenticatable $user,
        private WithdrawRepositoryInterface $withdrawRepository,
        private WalletRepositoryInterface $walletRepository
    ) {}

    /**
     * @throws Exception
     */
    public function withdraw(MoneyInterface $money)
    {
        if ($this->user) {
            $result =  $this->withdrawRepository->withdraw($money, $this->user->id);
            $this->walletRepository->updateAmount($this->user->id);
            return $result;
        }

        throw new Exception('could not withdraw, please check the available balance');
    }
}
