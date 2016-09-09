<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace FbPage\Factory\Controller;


use FbPage\Controller\AlbumController;
use Zend\Mvc\Controller\ControllerManager;
use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CommonControllerFactory implements AbstractFactoryInterface
{
    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        if (class_exists($requestedName . 'Controller')) {
            return true;
        }

        return false;
    }

    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        $class = $requestedName . 'Controller';

        // get underlaying service manager
        /* @var \Zend\ServiceManager\ServiceManager $serviceManager */
        $serviceManager = $serviceLocator->getServiceLocator();

        // get some dependency
        $dependencyService = $serviceManager->get('fbpage_facebookpage_service');

        return new $class($dependencyService);
    }

}
