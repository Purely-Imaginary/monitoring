<?php

namespace App\Test;

use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class TestForHttpCodeBase extends AbstractTest
{
    public $httpReturnCode = 0;

    /**
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     */
    public function execute(string $url, string $method = 'GET'): bool
    {
        $response = $this->httpClient->request($method,$url);

        return $response->getStatusCode() === $this->httpReturnCode;
    }
}
