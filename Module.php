<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Facebook for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace FbPage;


use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module implements AutoloaderProviderInterface
{

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    'FbBasic'=> __DIR__ . '/src/FbBasic',
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

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

    public function getServiceConfig()
    {

        return array(
            'factories' => array(
                //Services
                'fbpage_facebook_service'       => 'FbPage\Factory\Service\FacebookFactory',
                'fbpage_facebookpage_service'   => 'FbPage\Factory\Service\FacebookPageFactory',
                //Configurations
                'facebook_module_options'       => 'FbPage\Factory\Options\FacebookOptions',
                'facebook_page_options'         => 'FbPage\Factory\Options\FacebookPageOptions'
            )
        );
    }
}
