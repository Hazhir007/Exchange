<?php

namespace App\Http\Controllers\Api\V1\ExternalApi;

use App\Http\Controllers\Controller;
use App\Services\GetPairConversionRatio\Navasan\UpdatePairCurrencyConversionTableService;

class NavasanApiController extends Controller
{
    public function __invoke(UpdatePairCurrencyConversionTableService $service)
    {
        return $service->updateTable();
    }
}
