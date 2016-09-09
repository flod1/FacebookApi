<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Facebook for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace FacebookApi;


use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $eventManager->attach('route', array($this, 'onPreRoute'), 100);
        $moduleRouteListener->attach($eventManager);
    }

    // Translaton routing
    public function onPreRoute($e){
        $application    = $e->getApplication();
        $serviceManager = $application->getServiceManager();
        $serviceManager->get('router')->setTranslator($serviceManager->get('translator'));
    }
}
