<?php

namespace FbPage\Service;

use Zend\Cache\Storage\Adapter\ZendServerShm;
use Zend\Form\Form;
use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\Stdlib\Hydrator;

class Facebook implements ServiceManagerAwareInterface
{
   /**
     * @var UserServiceOptionsInterface
     */
    protected $options;

    public function getServiceManager()
    {
        return $this->serviceManager;
    }

    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
        return $this;
    }

    /**
     * get service options
     *
     * @return ModuleOptions
     */
    public function getOptions()
    {
        if (!$this->options instanceof ModuleOptions) {
            $this->setOptions($this->getServiceManager()->get('facebook_module_options'));
        }
        return $this->options;
    }

    /**
     * set service options
     *
     * @param UserServiceOptionsInterface $options
     */
    public function setOptions(ModuleOptions $options)
    {
        $this->options = $options;
    }

}
