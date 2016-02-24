<?php
return array(

    'service_manager' => array(
        'factories' => array(
           'Vendor\Service\VendorServiceInterface' => 'Vendor\Factory\VendorServiceFactory',
           'Vendor\Mapper\VendorMapperInterface' => 'Vendor\Factory\VendorMapperFactory',
        ),
    ),

    'controllers' => array(
        'factories' => array(
            'Vendor\Controller\Vendor' => 'Vendor\Factory\VendorControllerFactory',
        ),
    ),
	
    'router' => array(
        'routes' => array(
	 
                'createvendor' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/vendor',
                    'defaults' => array(
                        'controller' => 'Vendor\Controller\Vendor',
                        'action' => 'addVendor',
                    ),
                ),
            ),
            
            
            
 			
			
        ),
    ),

    
	'view_manager'	=> array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
	),
	
	
);
