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
     * @var int
     */
    protected $pageid;

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
    public function fetchEvents($fields=null,$limit=100)
    {
        return parent::fetchEvents($this->getPageid(),$fields,$limit);
    }
    /**
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchMilestones($fields=null,$limit=100)
    {
        return parent::fetchMilestones($this->getPageid(),$fields,$limit);
    }

    /**
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchPosts($fields=null,$limit=100)
    {
        return parent::fetchPosts($this->getPageid(),$fields,$limit);

    }

    /**
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchAlbums($fields=null,$limit=100)
    {
        return parent::fetchAlbums($this->getPageid(),$fields,$limit);
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
     * @return int
     */
    public function getPageid()
    {
        return $this->pageid;
    }

    /**
     * @param int $pageid
     */
    public function setPageid($pageid)
    {
        $this->pageid = $pageid;
    }



}
