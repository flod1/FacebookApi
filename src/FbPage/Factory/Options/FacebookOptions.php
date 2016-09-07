<?php
/**
 * Created by PhpStorm.
 * User: Clayton Daley
 * Date: 5/6/2015
 * Time: 6:39 PM
 */

namespace FbPage\Factory\Options;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use FbPage\Options;

class FacebookOptions implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        return new Options\FacebookOptions(isset($config['facebook']) ? $config['facebook'] : array());
    }
}
