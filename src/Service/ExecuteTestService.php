<?php

namespace App\Service;

use App\Entity\FinishedTest;
use App\Kernel;
use Doctrine\Persistence\ManagerRegistry;

class ExecuteTestService
{
    private $container;
    /**
     * @var ManagerRegistry
     */
    private $managerRegistry;

    public function __construct(Kernel $kernel, ManagerRegistry $managerRegistry)
    {
        $this->container = $kernel->getContainer();
        $this->managerRegistry = $managerRegistry;
    }

    public function executeTest(array $testData)
    {
        $em = $this->managerRegistry->getManager();
        foreach ($testData['tests'] as $test) {
            $service = $this->container->get($test);
            $result = $service->execute($testData['url']);

            $em->persist(
                (new FinishedTest())->setTestName($test)
                    ->setServiceName($testData['name'])
                    ->setUrl($testData['url'])
                    ->setResult($result['result'])
                    ->setErrorInfo($result['error'])
            );
        }
        $em->flush();
    }

    public function executeTests(array $testData)
    {
        foreach ($testData as $testCase) {
            $this->executeTest($testCase);
        }
    }
}
