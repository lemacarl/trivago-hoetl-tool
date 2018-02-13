<?php

use function DI\object;
use HoetlTool\File\BasicReader;
use HoetlTool\File\Reader;

return [
    // Bind interface
    Reader::class           => object(CSVReader::class),
    
    // Configure Twig
    Twig_Environment::class => function () {
        $loader = new Twig_Loader_Filesystem(__DIR__ . '/../resources/views');
        return new Twig_Environment($loader);
    },
];
