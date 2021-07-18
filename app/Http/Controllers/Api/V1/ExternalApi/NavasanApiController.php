<?php

namespace App\Http\Controllers\Api\V1\ExternalApi;

use App\Domain\ExternalApi\ExchangeExternalApiInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NavasanApiController extends Controller
{
    public function __invoke(ExchangeExternalApiInterface $api)
    {
        return $api->getPriceList();
    }
}
