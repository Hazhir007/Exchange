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
        //the line below is for dev environment when running -> php artisan schedule:work
//        echo 'it is working fine , ok';

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
