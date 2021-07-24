<?php


namespace App\Domain\ExternalApi\NavasanApi;



use App\Domain\ClientRequest\ClientRequestInterface;
use App\Domain\ExternalApi\ExchangeExternalApiInterface;

class NavasanApi implements ExchangeExternalApiInterface
{
    public const BASE_API_URI = 'https://api.navasan.tech/latest?api_key=JgVoQBY2gvyTzYH4tfgdBZa3CdY1TgQ4&';

    public function __construct(private ClientRequestInterface $client)
    {

    }

    public function getPriceList(): string
    {
        return $this->client->getRequest(self::BASE_API_URI, null);
    }
}
