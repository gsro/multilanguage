<?php

use GSRO\Multilanguage\Factory\MultilanguageMiddlewareFactory;
use GSRO\Multilanguage\Factory\RenderMiddlewareFactory;
use GSRO\Multilanguage\Middleware\DemoMultilanguageMiddleware;
use GSRO\Multilanguage\Middleware\LanguageSelectorMiddleware;
use GSRO\Multilanguage\Middleware\MultilanguageMiddleware;
use GSRO\Multilanguage\Service\MultilanguageDemoService;
use GSRO\Multilanguage\Service\MultilanguageServiceInterface;
use Zend\Expressive\Router\FastRouteRouter;
use Zend\Expressive\Router\RouterInterface;

return [
    'dependencies' => [
        'invokables' => [
            MultilanguageDemoService::class =>
                MultilanguageDemoService::class
        ],
        'factories' => [
            MultilanguageMiddleware::class =>
                MultilanguageMiddlewareFactory::class,
            // demo middleware
            DemoMultilanguageMiddleware::class =>
                RenderMiddlewareFactory::class,
        ],
        'aliases' => [
            // demo middleware
            MultilanguageServiceInterface::class => MultilanguageDemoService::class
        ]
    ],
    'twig' => [
        'paths' => [
            'multilanguage' => ['templates']
        ]
    ]
];
