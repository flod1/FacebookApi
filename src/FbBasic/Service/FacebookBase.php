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
    public function fetchEvent($eventid, $fields = null)
    {
        if ($fields == "*") {
            $fields = "id,name,description,attending_count,declined_count,cover,category,owner,place,start_time,ticket_uri,type,end_time";
        }
        $response = $this->fetchGraphNode($eventid, $fields);

        return $response->getGraphEvent();
    }

    /**
     * @param $albumid
     * @param string $fields
     * @return \Facebook\GraphNodes\GraphAlbum
     */
    public function fetchAlbum($albumid, $fields = null)
    {
        if ($fields == "*") {
            $fields = "id,name,description,event,from,location,type,place,count";
        }
        $response = $this->fetchGraphNode($albumid, $fields);

        return $response->getGraphAlbum();
    }

    /**
     * @param int $pageid
     * @return \Facebook\GraphNodes\GraphAlbum
     */
    public function fetchPage($pageid, $fields = null)
    {
        if ($fields == "*") {
            $fields = "id,name,description,description_html,about,fan_count,cover,picture,founded,display_subtext,hours,impressum,parking, personal_info,personal_interests,phone,place_type,press_contact, products,release_date,start_info,store_number,username, website";
        }
        $response = $this->fetchGraphNode($pageid, $fields);

        return $response->getGraphAlbum();
    }

}
