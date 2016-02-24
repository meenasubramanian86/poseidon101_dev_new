<?php

namespace Library\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Library\Service\LibraryService;
/**
 * Created Library\Service\LibraryService objects
 *
 * @author pandiaraj
 */
class LibraryServiceFactory extends AbstractFactory {
    public function createObject(ServiceLocatorInterface $serviceLocator) {
        $stateMapper = $serviceLocator->get('Library\Mapper\StateMapperInterface');
        $stateRepository = $serviceLocator->get('Library\Repository\StateRepositoryInterface');
        $cityRepository = $serviceLocator->get('Library\Repository\CityRepositoryInterface');
        $areaRepository = $serviceLocator->get('Library\Repository\AreaRepositoryInterface');
        $activityRepository = $serviceLocator->get('Library\Repository\ActivityRepositoryInterface');
        return new LibraryService($stateMapper, $stateRepository, $cityRepository,
                $areaRepository, $activityRepository);
    }
}
