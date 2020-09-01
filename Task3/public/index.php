<?php
require __DIR__ . '/../vendor/autoload.php';

use Recruitment\ApiConsumeTask\App;
use Recruitment\ApiConsumeTask\Service\VoidOutput;
use Recruitment\ApiConsumeTask\Service\StaticFileConfig;

$output = new VoidOutput();
$config = new StaticFileConfig('../src/Config/conf.php');
$app    = new App($output, $config);
$app->run();
