<?php
/**
 * PHPUnit bootstrap
 */
require __DIR__ . '/../../vendor/autoload.php';
global $container;
$container = require __DIR__ . '/../../app/bootstrap.php';