<?php

use FastRoute\RouteCollector;

global $container;
$container = require __DIR__ . '/../app/bootstrap.php';

$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/', 'HoetlTool\Controller\HomeController');
    $r->addRoute('POST', '/', ['HoetlTool\Controller\UploadController', 'upload']);
});

$route = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

switch ($route[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        header("HTTP/1.0 404 Not Found");
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    case FastRoute\Dispatcher::FOUND:
        $container->call($route[1], $route[2]);
        break;
}
