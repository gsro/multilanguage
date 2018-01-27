<?php

namespace GSRO\Multilanguage\Factory;

use GSRO\Multilanguage\Service\MultilanguageServiceInterface;
use Psr\Container\ContainerInterface;

class MultilanguageMiddlewareFactory
{
    
    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $service = $container->get(MultilanguageServiceInterface::class);
        return new $requestedName($service);
    }
}