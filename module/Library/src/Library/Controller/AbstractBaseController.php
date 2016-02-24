<?php

namespace Library\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\ServiceLocatorInterface;

abstract class AbstractBaseController extends AbstractActionController
{
    protected $serviceManager;
    private $logger;

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
