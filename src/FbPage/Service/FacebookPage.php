<?php

namespace FbPage\Service;

use FbPage\Options\FacebookPageOptions;
use Zend\Cache\Storage\Adapter\ZendServerShm;
use Zend\Captcha\Dumb;
use Zend\Debug\Debug;
use Zend\Form\Form;
use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\Stdlib\Hydrator;

class FacebookPage extends FacebookAbstract implements ServiceManagerAwareInterface
{
    /**
     * @var FacebookPageOptions
     */
    protected $facebookpageoptions;

    /**
     * get service options
     *
     * @return FacebookPageOptions
     */
    public function getFacebookpageOptions()
    {
        if (!$this->facebookpageoptions instanceof FacebookPageOptions) {
            $this->setFacebookpageOptions($this->getServiceManager()->get('facebook_page_options'));
        }

        return $this->facebookpageoptions;
    }

    /**
     * set service options
     *
     * @param FacebookPageOptions $facebookpageoptions
     */
    public function setFacebookpageOptions(FacebookPageOptions $facebookpageoptions)
    {
        $this->facebookpageoptions = $facebookpageoptions;
    }

    /**
     * @param string $fields
     * @param int $limit
     * @return array
     */
    public function fetchEvents($fields="description,cover,place,name,start_time",$limit=100)
    {
        $response = $this->fetch("/" . $this->getPageid() . '/events',array("fields"=>$fields,"limit"=>$limit));

        $graphEvents = $response->getGraphEdge("GraphEvent")->all();

        return $graphEvents;
    }
    /**
     * @param string $fields
     * @param int $limit
     * @return array
     */
    public function fetchEvent($eventid)
    {
        $response = $this->fetch("/" . $eventid);

        $graphEvent = $response->getGraphEvent();

        //Debug::dump($graphEvent);die();

        return $graphEvent;
    }

    public function fetchPosts()
    {
        $response = $this->get("/" . $this->getPageid() . '/posts');

        $graphPosts = $response->getGraphEdge()->all();

        return $graphPosts;
    }

    /**
     * @return \Facebook\GraphNodes\GraphPage
     */
    public function fetchPageInfo()
    {

        $response = $this->get("/" . $this->getPageid());

        //$response = $request->execute();
        $graphPage = $response->getGraphPage();
        //Debug::dump($graphPage);die();

        return $graphPage;
        //Debug::dump($this->getOptions());die();
    }

    /**
     * @return mixed
     */
    public function getPageid()
    {
        return $this->getFacebookpageOptions()->getPageId();
    }

}
