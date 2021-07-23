<?php


namespace App\Repositories\WalletRepository;


use App\Domain\Money\MoneyInterface;
use App\Models\Wallet;
use App\Repositories\DepositRepository\DepositRepository;
use Illuminate\Database\Eloquent\Collection;

class WalletRepository implements WalletRepositoryInterface
{
    public function __construct(private Wallet $model)
    {

    }

    public function all(): Collection|array
    {
        return $this->model->all();
    }

//    public function create(MoneyInterface $money, int $userId)
//    {
//        return $this->model->create([
//            'user_id' => $userId,
//            'currency_code' => $money->getCurrency()->getCode(),
//            'amount' => $money->getAmount()
//        ])->refresh();
//    }
}
