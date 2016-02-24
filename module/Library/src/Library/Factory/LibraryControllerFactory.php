<?php

namespace Library\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Library\Controller\LibraryController;

/**
 * Creates LibraryController object
 *
 * @author pandiaraj
 */
class LibraryControllerFactory extends AbstractFactory {
    public function createObject(ServiceLocatorInterface $serviceLocator) {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        $libraryService = $realServiceLocator->get('Library\Service\LibraryServiceInterface');
        return new LibraryController($libraryService);
    }
}
