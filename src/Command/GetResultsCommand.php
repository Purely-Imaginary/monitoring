<?php

namespace App\Command;

use App\Repository\FinishedTestRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetResultsCommand extends Command
{
    protected static $defaultName = 'app:get-results';
    /**
     * @var FinishedTestRepository
     */
    private $finishedTestRepository;

    public function __construct(FinishedTestRepository $finishedTestRepository)
    {
        parent::__construct();
        $this->finishedTestRepository = $finishedTestRepository;
    }

    public function configure(): void
    {
        $this->setDescription('Retrieves data about last tests.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    public function execute(
        InputInterface  $input,
        OutputInterface $output
    )
    {
        $testResults = $this->finishedTestRepository->getLastResults();
        $failedTests = array_filter($testResults, function ($test) {
            return !$test['result'];
        });
        $returnData = [];
        foreach ($failedTests as $failedTest) {
            $returnData[$failedTest['serviceName']] = $failedTest;
        }

        foreach ($testResults as $testResult) {
            if (!isset($returnData[$testResult['serviceName']])) {
                $returnData[$testResult['serviceName']] = $testResult;
            }
        }

        $table = new Table($output);
        $table
            ->setHeaders(['Service Name', 'Test Name', 'Test Time', 'Result']);

        foreach ($returnData as $test) {
            $table->addRow([
                    $test['serviceName'],
                    $test['testName'],
                    $test['testTime']->format('Y-m-d H:i:s'),
                    $test['result'] ? 'OK' : 'ERROR',
                ]
            );
        }
        $table->render();

        return Command::SUCCESS;
    }
}
