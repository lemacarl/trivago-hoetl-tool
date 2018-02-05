<?php
/**
 * PHPUnit bootstrap
 */
define('WEB_ROOT', __DIR__ . '/../../web');

require __DIR__ . '/../../vendor/autoload.php';

global $container;
$container = require __DIR__ . '/../../app/bootstrap.php';
