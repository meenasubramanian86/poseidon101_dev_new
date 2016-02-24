<?php
namespace Library;

use Zend\Mvc\MvcEvent;
use Zend\View\Model\JsonModel;

class Module
{

	public function getAutoloaderConfig()
	{
		return array(
			'Zend\Loader\ClassMapAutoloader' => array(
				__DIR__ . '/autoload_classmap.php',
			),
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
				),
			),
		);
	}
	
	public function getConfig()
	{
		return include __DIR__ . '/config/module_config.php'; 
	}
	
	// Add this method:
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Register\Model\RegisterTable' =>  function($sm) {
                    $tableGateway = $sm->get('RegisterTableGateway');
                    $table = new RegisterTable($tableGateway);
                    return $table;
                },
                'RegisterTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Register());
                    return new TableGateway('users', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
	
    /**
    *   User authentication check happens in this method. For each request, checkAuthentication
    *   method will be called. If auth fails, checkAuthentication method will send the failure response.
    *
    *   If any error happened at the ZF level (i.e. service not found, etc), onErrorRender
    *   method will be called. This method will send JSON response.
    */
    public function onBootstrap(MvcEvent $event)
    {
        $eventManager = $event->getApplication()->getEventManager();
        $eventManager->attach(MvcEvent::EVENT_RENDER, array($this, 'onErrorRender'));
        $eventManager->attach(MvcEvent::EVENT_DISPATCH, array($this, 'checkAuthentication'));
    }

    public function onErrorRender(MvcEvent $event)
    {
        if(!$event->isError()) // Not an error, so return
        {
            return;
        }

        $currentModel = $event->getResult();
        if($currentModel instanceof JsonModel)  // Already a JsonModel, so return
        {
            return;
        }
        
        $exception = $event->getParam('exception');
        if ($exception instanceof \Exception) {
            //echo $exception->getTraceAsString();
            $errorCode = $exception->getCode();
            if($errorCode == 0) {
                $errorCode = 500;
            }
            $model = new JsonModel(array('status' => 'FAILURE', 'errorCode' => $errorCode,
                    'errorMessage' => $exception->getMessage()));
        } else {
            $model = new JsonModel(array('status' => 'FAILURE', 'errorCode' => '500', 'errorMessage' => 'Internal server error'));
        }

        $response = $event->getResponse();
        $response->setStatusCode(500);
        $model->setTerminal(true);
        $event->setResult($model);
        $event->setViewModel($model);
    }
    
    /**
    *   This method will get request headers from the MvcEvent and check for the X-AUTH-TOKEN value
    *   against the cached (memcached or redis) value. If it matches, it will return nothing, else,
    *   it will send auth failed response.
    */
    public function checkAuthentication(MvcEvent $event)
    {
        // list of URIs for which authentication check is not required
        $whiteList = array('/admin/login');

        $router = $event->getRouter();
        $uri = $router->getRequestUri()->getPath();
        if(in_array($uri, $whiteList)) // white listed route, no need to check auth
        {
            return;
        }

        // auth check is bypassed temporarily
        // current client code doesnt have X-AUTH-TOKEN header
        return;

        $response = $event->getResponse();
        $request = $event->getRequest();
        $headers = $request->getHeaders();
        $authToken = $headers->get('X-AUTH-TOKEN');
        if($authToken && $this->checkToken($authToken->getFieldValue()))
        {
            return;
        }
        $response->setStatusCode(401);
        $model = new JsonModel(array('status' => 'failure', 'errorCode' => '401', 'errorMessage' => 'Authentication failed'));
        $model->setTerminal(true);
        $event->setResult($model);
        $event->setViewModel($model);
    }

    // TODO: Implement the token validation logic!!!
    private function checkToken($token)
    {
        return true;
    }
}