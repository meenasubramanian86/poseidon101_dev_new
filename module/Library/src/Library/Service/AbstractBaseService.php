<?php

namespace Library\Service;

use Zend\ServiceManager\ServiceLocatorInterface;

abstract class AbstractBaseService
{
    protected $serviceManager;

    public function setServiceManager(ServiceLocatorInterface $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    protected function getLogger()
    {
        if(!isset($this->logger))
        {
            $this->logger = $this->serviceManager->getServiceLocator()->get('Zend\Log');;
        }
        return $this->logger;
    }
}
