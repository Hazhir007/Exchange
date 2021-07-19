<?php


namespace App\Domain\ExternalApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ClientRequest
{
    private array $options = [
        'headers' => [
            'Accept' => 'application/json',
            'content-type' => 'application/json'
        ]
    ];

    public function __construct(private Client $client)
    {

    }

    /**
     * @throws GuzzleException
     */
    public function getRequest(string $uri): string
    {
        return $this->client->request('GET', $uri, $this->options)->getBody()->getContents();
    }

    /**
     * @throws GuzzleException
     */
    public function postRequest(string $uri): string
    {
        return $this->client->request('POST', $uri, $this->options)->getBody();
    }
}
