<?php


namespace App\Services\GetPairConversionRatio\Navasan;


use App\Repositories\PairCurrencyRepository\PairCurrencyRepositoryInterface;

class UpdatePairCurrencyConversionTableService
{


    public function __construct(
        private PairCurrencyRepositoryInterface $pairCurrencyRepository,
        private ReturnStructuredResult $structuredResult
    ) {

    }

    public function __invoke()
    {
        $result = $this->structuredResult->getStructuredResult();
        $update = $this->pairCurrencyRepository->all();

        if (! count($update)) {
            $this->pairCurrencyRepository->bulkCreate($result);
        } else {
            $this->pairCurrencyRepository->updatePairs($result);
        }
        return true;
    }

}
