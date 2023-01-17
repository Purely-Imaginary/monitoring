<?php

namespace App\Command;

use App\Service\ExecuteTestService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Yaml\Yaml;

class TestEndpointCommand extends Command
{
    protected const FILEPATH = 'config.yaml';
    protected static $defaultName = 'app:test';
    /**
     * @var ExecuteTestService
     */
    private $executeTestService;

    public function __construct(ExecuteTestService $executeTestService)
    {
        $this->executeTestService = $executeTestService;
        parent::__construct();
    }

    public function configure(): void
    {
        $this->setDescription('Tests endpoints.')
            ->addOption('service', 's', InputOption::VALUE_REQUIRED);
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
    ): int
    {
        $io = new SymfonyStyle($input, $output);
        $service = $input->getOption('service');

        $configData = Yaml::parseFile(self::FILEPATH);

        if ($service !== null) {
//            xdebug_break();
            if (!isset($configData[$service])) {
                $io->error("Service with the name '$service' not found. Check " . self::FILEPATH . " if name is correct.");
                return Command::FAILURE;
            }
            $this->executeTestService->executeTest($configData[$service]);
            return Command::SUCCESS;
        }

        $this->executeTestService->executeTests($configData);

        return Command::SUCCESS;
    }
}
