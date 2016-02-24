<?php

namespace Library\Factory;

use Library\Repository\StateRepository;

/**
 * Description of StateRepositoryFacory
 *
 * @author pandiaraj
 */
class StateRepositoryFactory extends AbstractFactory {
    public function createObject(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
        $entityManager = $serviceLocator->get('\Doctrine\ORM\EntityManager');
        return new StateRepository($entityManager);
    }
}
