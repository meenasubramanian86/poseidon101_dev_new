<?php

namespace Library\Factory;

use Library\Repository\CityRepository;
use Zend\ServiceManager\ServiceLocatorInterface;
/**
 * Creates CityRepository objects
 *
 * @author pandiaraj
 */
class CityRepositoryFactory extends AbstractFactory {
    public function createObject(ServiceLocatorInterface $serviceLocator) {
        $entityManager = $serviceLocator->get('\Doctrine\ORM\EntityManager');
        return new CityRepository($entityManager);
    }
}
