<?php

namespace FbBasic\Factory\Service;

use FbBasic\Service\FacebookBase;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class FacebookBaseFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new FacebookBase();
        $service->setServiceManager($serviceLocator);

        return $service;
    }
}
