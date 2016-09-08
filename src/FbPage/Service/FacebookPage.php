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
     * @return array
     */
    public function fetchEvents($fields="description,cover,place,name,start_time",$limit=100)
    {
        return $this->fetchGraphEdge($this->getPageid(),'events',"GraphEvent",array("fields"=>$fields,"limit"=>$limit));
    }
    /**
     * @param int $eventid
     * @return \Facebook\GraphNodes\GraphEvent
     */
    public function fetchEvent($eventid)
    {
        $response = $this->fetchGraphNode($eventid);

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
        $response = $this->fetch("/" . $albumid);

        return $response->getGraphAlbum();
    }

    /**
     * @param int $albumid
     * @param string $fields
     * @param int $limit
     * @return array of \Facebook\GraphNodes\GraphNodes
     */
    public function fetchPhotosByAlbum($albumid,$fields="id,picture",$limit=100)
    {
        $response = $this->fetch("/" . $albumid.'/photos',array("fields"=>$fields,"limit"=>$limit));

        return $response->getGraphEdge()->all();
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
     * @param string $fields
     * @return \Facebook\GraphNodes\GraphPage
     */
    public function fetchPage($fields="id,name,fan_count")
    {
        $response = $this->fetchGraphNode($this->getPageid(),array("fields"=>$fields));

        return $response->getGraphPage();
    }

    /**
     * @param $id
     * @param null $parameters
     * @return \Facebook\FacebookResponse
     */
    public function fetchGraphNode($id,$parameters=null)
    {
        $endpoint = "/".$id;

        return $this->fetch($endpoint,$parameters);

    }
    /**
     * @param $id int
     * @param null $action string
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchGraphEdge($id,$action=null,$subclassname=null,$parameters=null)
    {
        $endpoint = "/".$id;
        if(!is_null($action)){
            $endpoint .= "/".$action;
        }
        $response = $this->fetch($endpoint,$parameters);

        return $response->getGraphEdge($subclassname);

    }

    /**
     * @return mixed
     */
    public function getPageid()
    {
        return $this->getFacebookpageOptions()->getPageId();
    }

}
