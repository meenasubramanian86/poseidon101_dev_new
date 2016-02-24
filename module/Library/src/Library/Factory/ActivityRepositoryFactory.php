<?php

namespace Library\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Library\Repository\ActivityRepository;

/**
 * Description of ActivityRepositoryFactory
 *
 * @author pandiaraj
 */
class ActivityRepositoryFactory extends AbstractFactory {

    public function createObject(ServiceLocatorInterface $serviceLocator) {
        $entityManager = $serviceLocator->get('\Doctrine\ORM\EntityManager');
        return new ActivityRepository($entityManager);
    }
}
