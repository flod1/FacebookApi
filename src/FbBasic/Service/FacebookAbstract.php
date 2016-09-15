<?php

namespace FbBasic\Service;

use FbPage\Options\FacebookOptions;
use Traversable;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventManager;
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

        $this->getEventManager()->trigger(__FUNCTION__, $this, array('message' => $endpoint));
        return $this->fb->get($endpoint,$this->fb->getDefaultAccessToken());
    }

    /**
     * @param $id
     * @param array $parameters
     * @return \Facebook\FacebookResponse
     */
    public function fetchGraphNode($id,$parameters=null)
    {
        $endpoint = "/".$id;

        if(is_array($parameters)){
            $endpoint.="?";
            foreach($parameters AS $key => $value){
                if($value){
                    $endpoint.= $key."=".$value."&";
                }
            }
        }
        $endpoint = trim($endpoint, "&");

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
     * @var EventManagerInterface
     */
    protected $events;

    /**
     * Set the event manager instance used by this context
     *
     * @param  EventManagerInterface $events
     * @return mixed
     */
    public function setEventManager(EventManagerInterface $events)
    {
        $identifiers = array(__CLASS__, get_called_class());
        if (isset($this->eventIdentifier)) {
            if ((is_string($this->eventIdentifier))
                || (is_array($this->eventIdentifier))
                || ($this->eventIdentifier instanceof Traversable)
            ) {
                $identifiers = array_unique(array_merge($identifiers, (array) $this->eventIdentifier));
            } elseif (is_object($this->eventIdentifier)) {
                $identifiers[] = $this->eventIdentifier;
            }
            // silently ignore invalid eventIdentifier types
        }
        $events->setIdentifiers($identifiers);
        $this->events = $events;
        return $this;
    }

    /**
     * Retrieve the event manager
     *
     * Lazy-loads an EventManager instance if none registered.
     *
     * @return EventManagerInterface
     */
    public function getEventManager()
    {
        if (!$this->events instanceof EventManagerInterface) {
            $this->setEventManager(new EventManager());
        }
        return $this->events;
    }
}
