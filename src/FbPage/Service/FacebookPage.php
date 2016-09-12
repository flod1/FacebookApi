<?php

namespace FbPage\Service;

use Facebook\GraphNodes\GraphAlbum;
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
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchEvents($fields="description,cover,place,name,start_time",$limit=100)
    {
        return $this->fetchGraphEdge($this->getPageid(),'events',"GraphEvent",array("fields"=>$fields,"limit"=>$limit));
    }
    /**
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchMilestones($fields="title,description,start_time",$limit=100)
    {
        return $this->fetchGraphEdge($this->getPageid(),'milestones',null,array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param int $albumid
     * @param string $fields
     * @param int $limit
     * @return array of \Facebook\GraphNodes\GraphNodes
     */
    public function fetchPhotosByAlbum($albumid,$fields="id,picture",$limit=100)
    {
        return $this->fetchGraphEdge($albumid,'photos',null,array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchPosts($fields="",$limit=100)
    {
        return $this->fetchGraphEdge($this->getPageid(),'posts',null,array("fields"=>$fields,"limit"=>$limit));

    }

    /**
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchAlbums($fields="id,name,picture,cover_photo",$limit=100)
    {
        return $this->fetchGraphEdge($this->getPageid(),'albums','GraphAlbum',array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param int $eventid
     * @return \Facebook\GraphNodes\GraphEvent
     */
    public function fetchEvent($eventid,$fields="id,name,description")
    {
        $response = $this->fetchGraphNode($eventid,array("fields"=>$fields));

        return $response->getGraphEvent();
    }
    /**
     * @param int $id
     * @return \Facebook\GraphNodes\GraphNode
     */
    public function fetchPost($id)
    {
        $response = $this->fetchGraphNode($id);

        return $response->getGraphNode();
    }
    /**
     * @param int $albumid
     * @return \Facebook\GraphNodes\GraphAlbum
     */
    public function fetchAlbum($albumid)
    {
        $response = $this->fetchGraphNode($albumid);

        return $response->getGraphAlbum();
    }

    /**
     * @param string $fields
     * @return \Facebook\GraphNodes\GraphPage
     */
    public function fetchPage($fields="id,name,about,fan_count,cover,picture")
    {
        $response = $this->fetchGraphNode($this->getPageid(),array("fields"=>$fields));

        return $response->getGraphPage();
    }

    /**
     * @return mixed
     */
    public function getPageid()
    {
        return $this->getFacebookpageOptions()->getPageId();
    }

}
