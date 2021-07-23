<?php


namespace App\Domain\ClientRequest;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;

class ClientRequest implements ClientRequestInterface
{
    private array $options = [
        'headers' => [
            'Accept' => 'application/json',
            'content-type' => 'application/json'
        ],
    ];

    public function __construct(private Client $client)
    {

    }

    /**
     * @throws GuzzleException
     */
    public function getRequest(string $uri, ?array $options): string
    {
        return $this->client->request('GET', $uri, $this->options)->getBody()->getContents();
    }

    /**
     * @throws GuzzleException
     */
    public function postRequest(string $uri, ?array $bodyData): string
    {
        return $this->client->request('POST', $uri, [
            'headers' => [
                'Accept' => 'application/json',
                'content-type' => 'application/json'
            ],
            'body' => [
                $bodyData
            ]
        ])->getBody()->getContents();
    }
}
