<?php

namespace App\Test;

use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class TestForHttpHeaderBase extends AbstractTest
{
    public $HTTP_HEADER_NAME = 0;

    /**
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     */
    public function execute(string $url, string $method = 'GET'): bool
    {
        $response = $this->httpClient->request($method,$url);

        $testHeader = $response->getHeaders()['content-type'][0];

        return strpos($testHeader, $this->HTTP_HEADER_NAME) !== false;
    }
}
