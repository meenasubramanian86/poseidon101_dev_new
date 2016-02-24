<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'Library\Service\LibraryServiceInterface' => 'Library\Factory\LibraryServiceFactory',
            'Library\Mapper\StateMapperInterface' => 'Library\Factory\StateMapperFactory',
			'Library\Mapper\RecordExistLibraryMapperInterface' => 'Library\Factory\RecordExistLibraryMapperFactory',
            'Library\Repository\CountryRepositoryInterface' => 'Library\Factory\CountryRepositoryFactory',
            'Library\Repository\StateRepositoryInterface' => 'Library\Factory\StateRepositoryFactory',
            'Library\Repository\CityRepositoryInterface' => 'Library\Factory\CityRepositoryFactory',
            'Library\Repository\AreaRepositoryInterface' => 'Library\Factory\AreaRepositoryFactory',
            'Library\Repository\ActivityRepositoryInterface' => 'Library\Factory\ActivityRepositoryFactory'
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Library\Controller\Library' => 'Library\Factory\LibraryControllerFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'statelist' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/country/[:id]/states',
                    'defaults' => array(
                        'controller' => 'Library\Controller\Library',
                        'action' => 'stateList',
                    ),
                ),
            ),
            'allstates' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/states',
                    'defaults' => array(
                        'controller' => 'Library\Controller\Library',
                        'action' => 'getAllStates',
                    ),
                ),
            ),
            'get_state_name' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/states/[:id]',
                    'defaults' => array(
                        'controller' => 'Library\Controller\Library',
                        'action' => 'getState',
                    ),
                ),
            ),
            'citylist' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/state/[:id]/cities',
                    'defaults' => array(
                        'controller' => 'Library\Controller\Library',
                        'action' => 'cityList',
                    ),
                ),
            ),
            'allcities' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/cities',
                    'defaults' => array(
                        'controller' => 'Library\Controller\Library',
                        'action' => 'getAllCities',
                    ),
                ),
            ),
            'get_city_name' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/city/[:id]',
                    'defaults' => array(
                        'controller' => 'Library\Controller\Library',
                        'action' => 'getCity',
                    ),
                ),
            ),
            'arealist' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/city/[:id]/areas',
                    'defaults' => array(
                        'controller' => 'Library\Controller\Library',
                        'action' => 'areaList',
                    ),
                ),
            ),
            'allareas' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/areas',
                    'defaults' => array(
                        'controller' => 'Library\Controller\Library',
                        'action' => 'getAllAreas',
                    ),
                ),
            ),
            'get_area_name' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/areas/[:id]',
                    'defaults' => array(
                        'controller' => 'Library\Controller\Library',
                        'action' => 'getArea',
                    ),
                ),
            ),
            'read_activities' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/user/[:id]/latest/activities', // return latest 10 activities
                    'defaults' => array(
                        'controller' => 'Library\Controller\Library',
                        'action' => 'readActivities',
                    ),
                ),
            ),
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'library_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Library/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Library\Entity' => 'library_entities'
                )
            )
        )
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);
