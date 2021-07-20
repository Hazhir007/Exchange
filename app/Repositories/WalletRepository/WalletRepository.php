<?php


namespace App\Repositories\WalletRepository;


use App\Domain\Money\MoneyInterface;
use App\Models\Wallet;
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

    public function create(MoneyInterface $money, int $userId)
    {
        return $this->model->create([
            'user_id' => $userId,
            'currency_code' => $money->getCurrency()->getCode(),
            'amount' => $money->getAmount()
        ])->refresh();
    }

    public function deposit(MoneyInterface $money, int $userId)
    {
//        return $this->model
//            ->where('user_id', $userId)
//            ->where('currency_code', $money->getCurrency()->getCode())
//            ->update([
//               'amount' =>
//            ]);
    }

    public function withdraw(MoneyInterface $money, int $userId)
    {
        return $this->model
            ->where('user_id', $userId)
            ->where('currency_code', $money->getCurrency()->getCode())
            ->update([
                'amount' =>  $money->getAmount()
            ]);
    }
}
