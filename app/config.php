<?php

return [
    // Configure Twig
    Twig_Environment::class => function () {
        $loader = new Twig_Loader_Filesystem(__DIR__ . '/../resources/views');
        return new Twig_Environment($loader);
    },
];
