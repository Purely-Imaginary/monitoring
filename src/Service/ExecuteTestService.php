<?php

namespace App\Service;

use App\Kernel;

class ExecuteTestService
{
    private $container;

    public function __construct(Kernel $kernel)
    {
        $this->container = $kernel->getContainer();
    }

    public function executeTest(array $testData): array
    {
        $testResults = [];
        foreach ($testData['tests'] as $test) {
            $service = $this->container->get($test);
            $testResults[$test] = $service->execute($testData['url']);
//            echo $testResults[$test] ? '.' : 'F';
        }
        return $testResults;
    }

    public function executeTests(array $testData)
    {
        foreach ($testData as $testCase) {
            $this->executeTest($testCase);
        }
    }
}
