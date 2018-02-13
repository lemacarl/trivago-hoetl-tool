<?php
/**
 * Load functions necessary to run framework
 */

$setUpDebug = function () {
    ini_set('log_errors', 1);
    ini_set('error_log', __DIR__ . '/logs/debug.log');
};
