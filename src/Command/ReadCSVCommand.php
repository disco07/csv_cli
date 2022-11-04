<?php

namespace App\Command;

use App\Entity\ReadCSV;
use DateTime;
use jc21\CliTable;
use Symfony\Component\Console\Command\Command;
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
        $data = $this->csv_to_entity($source);
        dd($data);
    }

    private function csv_to_entity($source)
    {
        $array = [];
        $readCsv = new ReadCSV();
        $context = [
            CsvEncoder::DELIMITER_KEY => ';',
            CsvEncoder::ENCLOSURE_KEY => '"',
            CsvEncoder::ESCAPE_CHAR_KEY => '\\',
            CsvEncoder::KEY_SEPARATOR_KEY => ',',
        ];

        $decoder = new Serializer([new ObjectNormalizer()], [new CsvEncoder()]);
        $results = $decoder->decode(file_get_contents($source), 'csv', $context);
        foreach ($results as $result) {
            $date = DateTime::createFromFormat('Y-m-d H:i:s', $result["created_at"]);
            $slug = explode(" ", str_replace(",", "", strtolower($result["title"])));
            $slug = implode("-", $slug);
            $readCsv->setSku(intval($result["sku"]));
            $readCsv->setTitle($result["title"]);
            $readCsv->setIsEnabled(intval($result["is_enabled"]));
            $readCsv->setPrice(floatval($result["price"]));
            $readCsv->setCurrency($result["currency"]);
            $readCsv->setDescription($result["description"]);
            $readCsv->setCreatedAt($date);
            $readCsv->setSlug($slug);
            $array[] = $readCsv;
        }
        return $array;
    }

    private function display($data) {
        $table = new CliTable;

        $table->addField('Sku', 'sku', false);
        $table->addField('Status', 'sku', false);
        $table->addField('Price', 'sku', false);
        $table->addField('Description', 'sku', false);
        $table->addField('Created At', 'sku', false);
        $table->addField('Slug', 'sku', false);
    }
}