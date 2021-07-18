<?php


namespace App\Domain\ExternalApi;




use GuzzleHttp\Client;

interface ExchangeExternalApiInterface
{
    public function getPriceList();
}
