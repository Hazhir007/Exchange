<?php


namespace App\Domain\ClientRequest;


interface ClientRequestInterface
{
    public function getRequest(string $uri, ?array $options): string;

    public function postRequest(string $uri, ?array $bodyData): string;
}
