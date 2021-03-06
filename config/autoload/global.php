<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

 /* DB settings */
 
 // error_reporting(0);
 

 
 
return array(
    'db' => array(
        'driver'         => 'Pdo',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ),
    ),

    'service_manager' => array(

        'factories' => array(
            'Zend\Db\Adapter\Adapter' => function ($serviceManager) {
                $adapterFactory = new Zend\Db\Adapter\AdapterServiceFactory();
                $adapter = $adapterFactory->createService($serviceManager);
                \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::setStaticAdapter($adapter);
                return $adapter;
            },

            'Zend\Log' => function ($serviceManager) {
                $log = new Zend\Log\Logger();
                $writer = new Zend\Log\Writer\Stream('data/logs/'.date('d_m_Y').'_log.log');
                $filter = new Zend\Log\Filter\Priority(Zend\Log\Logger::INFO);
                $writer->addFilter($filter);
                $log->addWriter($writer);
                return $log;
            },
        ),
    ),	
);