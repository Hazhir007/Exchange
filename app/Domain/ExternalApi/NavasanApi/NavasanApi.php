<?php


namespace App\Domain\ExternalApi\NavasanApi;


use App\Domain\ExternalApi\ClientRequest;

use App\Domain\ExternalApi\ExchangeExternalApiInterface;
use GuzzleHttp\Exception\GuzzleException;

class NavasanApi implements ExchangeExternalApiInterface
{
    const BASE_API_URI = 'https://api.navasan.tech/latest?api_key=JgVoQBY2gvyTzYH4tfgdBZa3CdY1TgQ4&';

    public function __construct(private ClientRequest $client)
    {

    }

    /**
     * @throws GuzzleException
     */
    public function getPriceList(): string
    {
        return $this->client->getRequest(self::BASE_API_URI);
    }
}
