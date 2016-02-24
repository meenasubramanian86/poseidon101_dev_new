<?php

namespace Library\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Library\Repository\CountryRepository;

/**
 * Creates Library\Repository\CountryRepository objects
 *
 * @author pandiaraj
 */
class CountryRepositoryFactory extends AbstractFactory {
    public function createObject(ServiceLocatorInterface $serviceLocator) {
        $entityManager = $serviceLocator->get('\Doctrine\ORM\EntityManager');
        return new CountryRepository($entityManager);
    }
}
