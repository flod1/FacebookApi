<?php

namespace FbBasic\Service;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\Stdlib\Hydrator;

class FacebookBase extends FacebookAbstract implements ServiceManagerAwareInterface
{
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
     * @param int $albumid
     * @return \Facebook\GraphNodes\GraphAlbum
     */
    public function fetchAlbum($albumid)
    {
        $response = $this->fetchGraphNode($albumid);

        return $response->getGraphAlbum();
    }

    /**
     * @param int $pageid
     * @return \Facebook\GraphNodes\GraphAlbum
     */
    public function fetchPage($pageid,$fields="id,name,about,fan_count,cover,picture")
    {
        $response = $this->fetchGraphNode($pageid,array("fields"=>$fields));

        return $response->getGraphAlbum();
    }

}
