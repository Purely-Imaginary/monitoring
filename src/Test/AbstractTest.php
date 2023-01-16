<?php

namespace App\Test;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class AbstractTest
{
    public const SIGNATURE = '';
    /**
     * @var HttpClientInterface
     */
    protected $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

}
