<?php
declare(strict_types=1);

$inputFile = $argv[1];
$inputPercent = (float)$argv[2];
$inputFailBuildOnFailure = filter_var($argv[3], FILTER_VALIDATE_BOOLEAN);

$percentage = min(100, max(0, $inputPercent));
$exitCode = $inputFailBuildOnFailure ? 1 : 0;

echo "::debug::input_file is $inputFile" . PHP_EOL;
echo "::debug::percentage is $inputPercent" . PHP_EOL;
echo "::debug::fail_build is $inputFailBuildOnFailure" . PHP_EOL;

if (!file_exists($inputFile)) {
    throw new InvalidArgumentException('Invalid input file provided');
}

if (!$percentage) {
    throw new InvalidArgumentException('An float checked percentage must be given as second parameter');
}

$xml = new SimpleXMLElement(file_get_contents($inputFile));
$metrics = $xml->xpath('//metrics');
$totalElements = 0;
$checkedElements = 0;

foreach ($metrics as $metric) {
    $totalElements += (int)$metric['elements'];
    $checkedElements += (int)$metric['coveredelements'];
}

$coverage = round($checkedElements / $totalElements, 3) * 100;
echo "::set-output name=coverage_percent::$coverage" . PHP_EOL;

if ($coverage < $percentage) {
    echo "::error::Code Coverage is $coverage%, which is below the accepted $percentage%." . PHP_EOL;

    if (!$inputFailBuildOnFailure) {
        echo "However, build will not be marked as failure due to \"fail_build_on_under\" value." . PHP_EOL;
    }
    exit($exitCode);
}

echo "Code coverage is $coverage%, which is at or above the accepted $percentage%." . PHP_EOL;
exit(0);
