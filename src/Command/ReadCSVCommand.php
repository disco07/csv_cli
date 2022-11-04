<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ReadCSVCommand extends Command
{
    protected static $defaultName = 'read:csv';

    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription("Read csv")
            ->addOption('source', 's', InputOption::VALUE_REQUIRED)
            ->addOption(
                'json',
                null,
                InputOption::VALUE_OPTIONAL,
                'Json or not',
                false
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $source = $input->getOption("source");
        $json_check = $input->getOption("json");

        $decoder = new Serializer([new ObjectNormalizer()], [new CsvEncoder()]);
        $data = $decoder->decode(file_get_contents($source), 'csv');

        dd($data);
    }
}