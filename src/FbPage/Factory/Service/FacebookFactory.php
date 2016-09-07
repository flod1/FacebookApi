<?php

namespace FbPage\Factory\Service;

use FbPage\Service\FacebookPage;
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
        $service = new FacebookPage();
        $service->setServiceManager($serviceLocator);
        //$service->setOptions($serviceLocator->get("facebook_module_options"));

        return $service;
    }
}
