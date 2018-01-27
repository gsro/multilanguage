<?php

namespace GSRO\Multilanguage\Service;

use Psr\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Sql;

/**
 * Class MultilanguageService
 * @package GSRO\Multilanguage\Service\
 */
class SqlServiceFactory
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
        $adapter = $container->get(AdapterInterface::class);
        $sql = new Sql($adapter);
        return new $requestedName($sql);
    }
}
