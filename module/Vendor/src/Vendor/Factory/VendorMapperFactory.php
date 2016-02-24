<?php

namespace Vendor\Factory;
use Vendor\Mapper\VendorMapper;
use Vendor\Model\Vendor;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

class VendorMapperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
		return new VendorMapper( $serviceLocator->get('Zend\Db\Adapter\Adapter'),
            new ClassMethods(false), new Vendor() );
    }
}
