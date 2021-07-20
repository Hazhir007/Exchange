<?php


namespace App\Services\Wallet;


use App\Repositories\WalletRepository\WalletRepositoryInterface;
use http\Exception\InvalidArgumentException;
use Illuminate\Contracts\Auth\Authenticatable;

class WalletCreateService
{
    public function __construct(
        private Authenticatable $user,
        private WalletRepositoryInterface $walletRepository
    ) {}

    public function createWallet(string $currencyCode)
    {
        if ($this->user) {
            $currencyCode = resolve(strtoupper($currencyCode));
            $wallet = $currencyCode->create(0, null);
            return $this->walletRepository->create($wallet, $this->user->id);
        }

        throw new InvalidArgumentException('currency code can not be find');
    }
}
