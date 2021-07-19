<?php


namespace App\Repositories\PairCurrencyRepository;


use App\Models\PairCurrency;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PairCurrencyRepository implements PairCurrencyRepositoryInterface
{
    /**
     * UserRepository constructor.
     * @param PairCurrency $model
     */
    public function __construct(private PairCurrency $model)
    {

    }

    public function all(): Collection|array
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function bulkCreate(array $data)
    {
        foreach ($data as $pair) {
            $this->create($pair);
        }
    }

    public function findPair(string $pair)
    {
        if (null === $pair = $this->model
                ->where('pair', $pair)
                ->first()
        ) {
            throw new ModelNotFoundException("Pair not found");
        }

        return $pair;
    }


    public function updatePairs(array $data)
    {
        foreach ($data as $pair) {
            $this->model
                ->where('pair', $pair['pair'])
                ->where('conversion_ratio', '<>', $pair['conversion_ratio'])
                ->update([
                    'conversion_ratio' => $pair['conversion_ratio'],
                ]);
        }

    }
}
