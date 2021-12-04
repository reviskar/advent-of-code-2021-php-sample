<?php
ob_start();
use App\day01\MassCalculator;

require_once __DIR__ . '/../../vendor/autoload.php';

\App\helpers\Timer::start();

$input = \App\helpers\InputFileReader::readFile(__DIR__ . '/../../data/day01/input.txt');

$total = 0;

foreach ($input as $item) {
    $massCalculator = new MassCalculator();
    $total += $massCalculator->calculateNeededFuelForMass($item);
}

\App\helpers\ResultParser::parseResult($total);

$input = \App\helpers\InputFileReader::readFile(__DIR__ . '/../../data/day01/input.txt');

$total = 0;

foreach ($input as $item) {
    $massCalculator = new MassCalculator();
    $total += $massCalculator->calculateNeededFuelForMassRecursive($item);
}

\App\helpers\ResultParser::parseResult($total);
\App\helpers\Timer::finish();
ob_end_flush();
