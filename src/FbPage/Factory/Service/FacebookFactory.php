<?php

namespace FbPage\Factory\Service;

use FbPage\Service\Facebook;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class FacebookFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new Facebook();
        $service->setServiceManager($serviceLocator);

        return $service;
    }
}
