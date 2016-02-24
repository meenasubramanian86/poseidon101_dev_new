<?php

namespace Library\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

abstract class AbstractFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $obj = $this->createObject($serviceLocator);
        $obj->setServiceManager($serviceLocator);

        return $obj;
    }

    abstract public function createObject(ServiceLocatorInterface $serviceLocator);
}
