<?php

namespace Library\Factory;

use Library\Mapper\RecordExistLibraryMapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

class RecordExistLibraryMapperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new RecordExistLibraryMapper($serviceLocator->get('Zend\Db\Adapter\Adapter'),
            new ClassMethods(false));
    }
}
