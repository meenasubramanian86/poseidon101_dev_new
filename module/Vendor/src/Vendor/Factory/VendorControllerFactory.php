<?php

namespace Vendor\Factory;
use Vendor\Controller\VendorController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class VendorControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $vendorService = $realServiceLocator->get('Vendor\Service\VendorServiceInterface');

        return new VendorController($vendorService);
    }
}
