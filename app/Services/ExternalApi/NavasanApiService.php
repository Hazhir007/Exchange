<?php


namespace App\Services\ExternalApi;


use App\Domain\ExternalApi\ExchangeExternalApiInterface;

class NavasanApiService
{
    public function call(ExchangeExternalApiInterface $api)
    {
        return $api->getPriceList();
    }
}
