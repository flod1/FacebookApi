<?php

namespace FbBasic\Service;

use FbPage\Options\FacebookOptions;
use Zend\Log\Logger;
use Zend\Log\LoggerInterface;
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
     * @var \Zend\Log\LoggerInterface
     */
    protected $logger;
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
     * @param $id
     * @param null $fields
     * @return \Facebook\FacebookResponse
     */
    public function fetchGraphNode($id,$fields=null)
    {
        $endpoint = "/".$id;
        $parameters = array("fields"=>$fields);

        if(is_array($parameters)){
            $endpoint.="?";
            foreach($parameters AS $key => $value){
                if($value){
                    $endpoint.= $key."=".$value."&";
                }
            }
        }
        $endpoint = trim($endpoint, "&");

        $this->getLogger()->info($endpoint);
        //$this->getServiceManager()->get('jhu.zdt_logger')->info($endpoint);

        return $this->get($endpoint);

    }

    /**
     * @param $id int
     * @param null $action string
     * @param null $subclassname
     * @param null $parameters
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchGraphEdge($id,$action=null,$subclassname=null,$parameters=null)
    {
        $endpoint = "/".$id;
        if(!is_null($action)){
            $endpoint .= "/".$action;
        }

        if(is_array($parameters)){
            $endpoint.="?";
            foreach($parameters AS $key => $value){
                if($value){
                    $endpoint.= $key."=".$value."&";
                }
            }
        }
        $endpoint = trim($endpoint, "&");

        //$this->getServiceManager()->get('jhu.zdt_logger')->info($endpoint);

        $response = $this->get($endpoint);

        return $response->getGraphEdge($subclassname);

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

    /**
     * @return \Zend\Log\LoggerInterface
     */
    public function getLogger()
    {
        if (!$this->logger instanceof LoggerInterface) {
            $this->setLogger($this->getServiceManager()->get('jhu.zdt_logger'));
        }

        return $this->logger;
    }

    /**
     * @param \Zend\Log\LoggerInterface $logger
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;
    }



}
