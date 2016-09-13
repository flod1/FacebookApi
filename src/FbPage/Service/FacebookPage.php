<?php

namespace FbPage\Service;

use FbBasic\Service\FacebookBase;
use FbPage\Options\FacebookPageOptions;
use Zend\Stdlib\Hydrator;

class FacebookPage extends FacebookBase
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
     * @param string $fields
     * @return \Facebook\GraphNodes\GraphPage
     */
    public function fetchPage($fields="id,name,about,fan_count,cover,picture")
    {
        return parent::fetchPage($this->getPageid(),$fields);
    }

    /**
     * @return mixed
     */
    public function getPageid()
    {
        return $this->getFacebookpageOptions()->getPageId();
    }

}
