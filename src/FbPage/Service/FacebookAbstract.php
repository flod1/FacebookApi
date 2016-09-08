<?php

namespace FbPage\Service;

use FbPage\Options\FacebookOptions;
use Zend\Cache\Storage\Adapter\ZendServerShm;
use Zend\Captcha\Dumb;
use Zend\Debug\Debug;
use Zend\Form\Form;
use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\Stdlib\Hydrator;

class FacebookAbstract implements ServiceManagerAwareInterface
{
   /**
     * @var FacebookOptions
     */
    protected $options;
   /**
     * @var ServiceManager
     */
    protected $serviceManager;
   /**
     * @var \Facebook\Facebook
     */
    protected $fb;


    private function initFb()
    {
        # The v5 new-hotness way
        $this->fb = new \Facebook\Facebook([
            'app_id'     => $this->getOptions()->getAppId(),
            'app_secret' => $this->getOptions()->getAppSecret(),
            'default_graph_version' => $this->getOptions()->getDefaultGraphVersion(),
            'default_access_token' => $this->getOptions()->getDefaultAccessToken(),
        ]);
        return $this;
    }

    public function get($endpoint){

        return $this->fb->get($endpoint,$this->fb->getDefaultAccessToken());
    }

    /**
     * @param $endpoint
     * @param $parameters array
     * @return \Facebook\FacebookResponse
     */
    public function fetch($endpoint,$parameters=null){

        if(is_array($parameters)){
            $endpoint.="?";
            foreach($parameters AS $key => $value){
                $endpoint.= $key."=".$value."&";
            }
        }
        $endpoint = trim($endpoint, "&");

        return $this->get($endpoint);
    }


    public function getServiceManager()
    {
        return $this->serviceManager;
    }

    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
        $this->initFb();
        return $this;
    }

    /**
     * get service options
     *
     * @return FacebookOptions
     */
    public function getOptions()
    {
        if (!$this->options instanceof FacebookOptions) {
            $this->setOptions($this->getServiceManager()->get('facebook_module_options'));
        }
        return $this->options;
    }

    /**
     * set service options
     *
     * @param FacebookOptions $options
     */
    public function setOptions(FacebookOptions $options)
    {
        $this->options = $options;
    }

}
