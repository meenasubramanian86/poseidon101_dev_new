<?php

namespace Library\Repository;

use Zend\ServiceManager\ServiceLocatorInterface;
use Doctrine\ORM\EntityRepository;

/**
 * Base class for all repositories
 *
 * @author pandiaraj
 */
abstract class BaseRepository extends EntityRepository {
    
    protected $serviceManager;
    protected $entityManager;

    public function setServiceManager(ServiceLocatorInterface $serviceManager) {
        $this->serviceManager = $serviceManager;
    }
    
    protected function getLogger() {
        if(!isset($this->logger)) {
            $this->logger = $this->serviceManager->getServiceLocator()->get('Zend\Log');
        }
        return $this->logger;
    }
    
    public function beginTransaction() {
        if(isset($this->entityManager)) {
            $this->entityManager->getConnection()->beginTransaction();
        }
    }

    public function commit() {
        if(isset($this->entityManager)) {
            $this->entityManager->getConnection()->commit();
        }
    }

    public function rollBack() {
        if(isset($this->entityManager)) {
            $this->entityManager->getConnection()->rollBack();
        }
    }
}
