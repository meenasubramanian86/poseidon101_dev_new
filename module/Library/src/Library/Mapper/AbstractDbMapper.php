<?php

namespace Library\Mapper;

use Zend\Db\Adapter\AdapterInterface;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
*   This abstract class provides database transaction operations.
*   DB mapper classes which need transaction support can extend this class to avoid rewritting these methods.
*/
abstract class AbstractDbMapper
{

    protected $adapterInterface;
    protected $serviceManager;
    private $logger;
	
    public function __construct(AdapterInterface $adapterInterface)
    {
        $this->adapterInterface = $adapterInterface;
    }

    public function setServiceManager(ServiceLocatorInterface $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    public function beginTransaction()    
    {
        $this->adapterInterface->getDriver()->getConnection()->beginTransaction();
    }

    public function commit()
    {
        $this->adapterInterface->getDriver()->getConnection()->commit();
    }

    public function rollBack()
    {
        $this->adapterInterface->getDriver()->getConnection()->rollBack();
    }

    public function getLogger()
    {
        if(!isset($this->logger))
        {
            $this->logger = $this->serviceManager->getServiceLocator()->get('Zend\Log');;
        }
        return $this->logger;
    }
}
