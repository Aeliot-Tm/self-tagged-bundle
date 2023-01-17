<?php

declare(strict_types=1);

use Aeliot\SelfTaggedBundle\Test\Stub\Kernel;

$env = $_SERVER['APP_ENV'] ?? $_ENV['APP_ENV'] ?? 'test';
$debug = $_SERVER['APP_DEBUG'] ?? $_ENV['APP_DEBUG'] ?? true;

return new Kernel($env, (bool) $debug);
