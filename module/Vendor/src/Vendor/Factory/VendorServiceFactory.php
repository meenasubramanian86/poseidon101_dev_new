<?php

namespace Vendor\Factory;
use Vendor\Service\VendorService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class VendorServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new VendorService($serviceLocator->get('Vendor\Mapper\VendorMapperInterface'));
    }
}