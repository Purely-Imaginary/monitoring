<?php

namespace App\Test;

use App\Interfaces\ExecutableTestInterface;
use Exception;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class TestForHttpCodeBase extends AbstractTest implements ExecutableTestInterface
{
    public $httpReturnCode = 0;

    /**
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     */
    public function execute(string $url, string $method = 'GET'): array
    {
        $result = false;
        $error = null;
        try {
            $response = $this->httpClient->request($method, $url);
            $result = $response->getStatusCode() === $this->httpReturnCode;
            if (!$result) {
                $error = $response->getStatusCode();
            }
        } catch (Exception $exception) {
            $error = $exception->getMessage();
        }

        return [
            'result' => $result,
            'error' => $error
        ];
    }
}
