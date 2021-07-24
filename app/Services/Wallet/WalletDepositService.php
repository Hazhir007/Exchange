<?php


namespace App\Services\Wallet;


use App\Domain\Money\MoneyInterface;
use App\Repositories\DepositRepository\DepositRepositoryInterface;
use App\Repositories\WalletRepository\WalletRepositoryInterface;
use Exception;
use Illuminate\Contracts\Auth\Authenticatable;

class WalletDepositService
{
    public function __construct(
        private Authenticatable $user,
        private DepositRepositoryInterface $depositRepository,
        private WalletRepositoryInterface $walletRepository
    ) {}

    /**
     * @throws Exception
     */
    public function deposit(MoneyInterface $money)
    {
        if ($this->user) {
            $result =  $this->depositRepository->deposit($money, $this->user->id);
//            $temp = $this->walletRepository->updateAmount($this->user->id);
            $temp = $this->walletRepository->updateAmount($this->user->id);
            dd($temp);
            return $result;
            //send deposited event and update the wallet amount


            //send deposited email to user
        }

        throw new Exception('could not deposit');
    }
}
