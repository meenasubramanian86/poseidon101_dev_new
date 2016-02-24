<?php

namespace Library\Factory;

use Library\Mapper\StateMapper;
use Library\Model\State;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Creates Library\Mapper\StateMapper objects
 *
 * @author pandiaraj
 */
class StateMapperFactory extends AbstractFactory {

    public function createObject(ServiceLocatorInterface $serviceLocator) {
        $dbAdapter = $serviceLocator->get('Zend\Db\Adapter\Adapter');
        return new StateMapper($dbAdapter, new ClassMethods(false), new State());
    }
}
