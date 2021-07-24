<?php


namespace App\Repositories\WalletRepository;


use App\Domain\Money\MoneyInterface;
use App\Models\Wallet;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

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


    public function getWallets(int $userId)
    {
        return $this->model
            ->where('user_id', $userId)
            ->get();
    }

    public function findWallet(int $userId, string $currencyCode)
    {
        return $this->model
            ->where('user_id', $userId)
            ->where('currency_code', $currencyCode)
            ->get()
            ->first();
    }

    public function updateAmount(int $userId): array
    {
        $wallets = DB::select(DB::raw(
            "select (coalesce(total_deposits,0) - coalesce(total_withdraws,0)) as amount, dcc as currency_code from (
                        (select sum(rd.amount) as total_deposits, rd.currency_code as dcc from
                            (select * from deposits as d where d.user_id = ?) as rd group by dcc) as rd2
                        left join
                        (select sum(rw.amount) as total_withdraws, rw.currency_code as wcc from
                            (select * from withdraws as w where w.user_id = ?) as rw group by wcc) as rw2
                        on rd2.dcc = rw2.wcc
                    ) group by currency_code"
                ), [$userId, $userId]
            );

        foreach ($wallets as $wallet) {
            $this->model
                ->where('user_id', $userId)
                ->where('currency_code', $wallet->currency_code)
                ->update([
                    'amount' => $wallet->amount
                ]);
        }

        return $wallets;
    }
}
