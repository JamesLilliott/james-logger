<?php

namespace Jameslilliott\JamesLogger;

require __DIR__ . '/../vendor/autoload.php';

use Psr\Log\LogLevel;

$logger = new JamesLogger(new FileWriter('log.txt'));

$logger->info('I am an info Log');
$logger->warning('I am an warning Log');
$logger->emergency('I am an emergany Log');
$logger->error('I am an error Log');
$logger->alert('I am an alert Log');
$logger->notice('I am an notice Log');
$logger->debug('I am an debug Log');
$logger->log(LogLevel::CRITICAL, 'I am an critical Log');