<?php
namespace Library\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Library\Repository\AreaRepository;

/**
 * Description of AreaRepositoryFactory
 *
 * @author pandiaraj
 */
class AreaRepositoryFactory extends AbstractFactory {

    public function createObject(ServiceLocatorInterface $serviceLocator) {
        $entityManager = $serviceLocator->get('\Doctrine\ORM\EntityManager');
        return new AreaRepository($entityManager);
    }
}
