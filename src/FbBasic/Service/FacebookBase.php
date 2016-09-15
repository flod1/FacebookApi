<?php

namespace FbBasic\Service;

use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\Stdlib\Hydrator;

class FacebookBase extends FacebookAbstract implements ServiceManagerAwareInterface
{
    const ALL_EVENT_FIELDS = "id,name,description,attending_count,declined_count,interested_count,maybe_count,noreply_count,cover,category,owner,place,ticket_uri,type,start_time,end_time,parent_group";
    const ALL_PHOTO_FIELDS = "id,album,event,from,icon, height,width,name,picture,target,created_time,images";
    const ALL_MILESTONE_FIELDS = "id,title,from,description,start_time,end_time";
    const ALL_POST_FIELDS = "id,caption,description,created_time,from,icon,message,name,picture,source,type,to,with_tags,place,story,shares";
    const ALL_ALBUM_FIELDS = "id,name,description,event,from,location,type,place,count";
    const ALL_PAGE_FIELDS = "id,name,description,description_html,about,fan_count,cover,picture,founded,display_subtext,hours,impressum,parking, personal_info,personal_interests,phone,place_type,press_contact, products,release_date,start_info,store_number,username, website";
    const ALL_GROUP_FIELDS = "id,name,cover,description,email,icon,member_request_count,owner";
    const ALL_VIDEO_FIELDS = "id,title,created_time,description,embed_html,event,format,from,icon,length,picture,place,source,status";

    /**
     * @param int $photoid
     * @param string $fields
     * @return \Facebook\GraphNodes\GraphEvent
     */
    public function fetchPhoto($photoid, $fields = null)
    {
        if ($fields == "*") {
            $fields = $this::ALL_PHOTO_FIELDS;
        }

        $parameters = array("fields"=>$fields);
        $response = $this->fetchGraphNode($photoid, $parameters);

        return $response->getGraphEvent();
    }
    /**
     * @param int $videoid
     * @param string $fields
     * @return \Facebook\GraphNodes\GraphNode
     */
    public function fetchVideo($videoid, $fields = null)
    {
        if ($fields == "*") {
            $fields = $this::ALL_VIDEO_FIELDS;
        }

        $parameters = array("fields"=>$fields);
        $response = $this->fetchGraphNode($videoid, $parameters);

        return $response->getGraphNode();
    }
    /**
     * @param int $postid
     * @param string $fields
     * @return \Facebook\GraphNodes\GraphNode
     */
    public function fetchPost($postid, $fields = null)
    {
        if ($fields == "*") {
            $fields = $this::ALL_POST_FIELDS;
        }

        $parameters = array("fields"=>$fields);
        $response = $this->fetchGraphNode($postid, $parameters);

        return $response->getGraphNode();
    }

    /**
     * @param int $milestoneid
     * @param string $fields
     * @return \Facebook\GraphNodes\GraphEvent
     */
    public function fetchMilestone($milestoneid, $fields = null)
    {
        if ($fields == "*") {
            $fields = $this::ALL_MILESTONE_FIELDS;
        }

        $parameters = array("fields"=>$fields);
        $response = $this->fetchGraphNode($milestoneid, $parameters);

        return $response->getGraphNode();
    }

    /**
     * @param int $eventid
     * @param string $fields
     * @return \Facebook\GraphNodes\GraphEvent
     */
    public function fetchEvent($eventid, $fields = null)
    {
        if ($fields == "*") {
            $fields = $this::ALL_EVENT_FIELDS;
        }

        $parameters = array("fields"=>$fields);
        $response = $this->fetchGraphNode($eventid, $parameters);

        return $response->getGraphEvent();
    }

    /**
     * @param int $groupid
     * @param string $fields
     * @return \Facebook\GraphNodes\GraphNode
     */
    public function fetchGroup($groupid, $fields = null)
    {
        if ($fields == "*") {
            $fields = $this::ALL_GROUP_FIELDS;
        }

        $parameters = array("fields"=>$fields);
        $response = $this->fetchGraphNode($groupid, $parameters);

        return $response->getGraphNode();
    }

    /**
     * @param $albumid
     * @param string $fields
     * @return \Facebook\GraphNodes\GraphAlbum
     */
    public function fetchAlbum($albumid, $fields = null)
    {
        if ($fields == "*") {
            $fields = $this::ALL_ALBUM_FIELDS;
        }
        $parameters = array("fields"=>$fields);
        $response = $this->fetchGraphNode($albumid, $parameters);

        return $response->getGraphAlbum();
    }

    /**
     * @param int $nodeid
     * @param string $fields
     * @param int $limit
     * @return array of \Facebook\GraphNodes\GraphAlbum
     */
    public function fetchAlbums($nodeid,$fields=null,$limit=100)
    {
        if ($fields == "*") {
            $fields = $this::ALL_ALBUM_FIELDS;
        }
        return $this->fetchGraphEdge($nodeid,'albums','GraphAlbum',array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param int $nodeid
     * @param string $fields
     * @param int $limit
     * @return array of \Facebook\GraphNodes\GraphNode
     */
    public function fetchVideos($nodeid,$fields=null,$limit=100)
    {
        if ($fields == "*") {
            $fields = $this::ALL_VIDEO_FIELDS;
        }
        return $this->fetchGraphEdge($nodeid,'videos',null,array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param int $nodeid
     * @param string $fields
     * @param int $limit
     * @return array of \Facebook\GraphNodes\GraphNode
     */
    public function fetchLikes($nodeid,$fields=null,$limit=100)
    {
        if ($fields == "*") {
            //$fields = $this::ALL_VIDEO_FIELDS;
        }
        return $this->fetchGraphEdge($nodeid,'likes',null,array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param int $nodeid
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchPosts($nodeid,$fields=null,$limit=100)
    {
        if ($fields == "*") {
            $fields = $this::ALL_POST_FIELDS;
        }
        return $this->fetchGraphEdge($nodeid,'posts',null,array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param int $nodeid
     * @param string $fields
     * @param int $limit
     * @return array of \Facebook\GraphNodes\GraphEvent
     */
    public function fetchEvents($nodeid,$fields=null,$limit=100)
    {
        if ($fields == "*") {
            $fields = $this::ALL_EVENT_FIELDS;
        }
        return $this->fetchGraphEdge($nodeid,'events','GraphEvent',array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param int $pageid
     * @return \Facebook\GraphNodes\GraphAlbum
     */
    public function fetchPage($pageid, $fields = null)
    {
        if ($fields == "*") {
            $fields = $this::ALL_PAGE_FIELDS;
        }
        $parameters = array("fields"=>$fields);
        $response = $this->fetchGraphNode($pageid, $parameters);

        return $response->getGraphPage();
    }

    /**
     * @param int $videoid
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchLikesByVideo($videoid,$fields=null,$limit=100)
    {
        if ($fields == "*") {
            //$fields = $this::ALL_VIDEO_FIELDS;
        }
        return $this->fetchGraphEdge($videoid,'likes',null,array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param int $videoid
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchCommentsByVideo($videoid,$fields=null,$limit=100)
    {
        return $this->fetchComments($videoid,$fields,$limit);
    }

    /**
     * @param int $nodeid
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchComments($nodeid,$fields=null,$limit=100)
    {
        if ($fields == "*") {
            //$fields = $this::ALL_VIDEO_FIELDS;
        }
        return $this->fetchGraphEdge($nodeid,'comments',null,array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param int $albumid
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchPhotosByAlbum($albumid,$fields=null,$limit=100)
    {
        return $this->fetchPhotos($albumid,$fields,$limit);
    }

    /**
     * @param int $nodeid
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchPhotos($nodeid,$fields=null,$limit=100)
    {
        if ($fields == "*") {
            $fields = $this::ALL_PHOTO_FIELDS;
        }
        return $this->fetchGraphEdge($nodeid,'photos',null,array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param int $eventid
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchAttendingsByEvent($eventid,$fields=null,$limit=100)
    {
        return $this->fetchGraphEdge($eventid,'attending',null,array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param int $eventid
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchDeclinedsByEvent($eventid,$fields=null,$limit=100)
    {
        return $this->fetchGraphEdge($eventid,'declined',null,array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param int $eventid
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchInterestedsByEvent($eventid,$fields=null,$limit=100000)
    {
        return $this->fetchGraphEdge($eventid,'interested',null,array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param int $eventid
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchMaybesByEvent($eventid,$fields=null,$limit=100)
    {
        return $this->fetchGraphEdge($eventid,'maybe',null,array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param int $nodeid
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchMilestones($nodeid,$fields=null,$limit=100)
    {
        if ($fields == "*") {
            $fields = $this::ALL_MILESTONE_FIELDS;
        }
        return $this->fetchGraphEdge($nodeid,'milestones',null,array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param int $pageid
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchGlobalBrandChildren($pageid,$fields=null,$limit=100)
    {
        if ($fields == "*") {
            //$fields = $this::ALL_MILESTONE_FIELDS;
        }
        return $this->fetchGraphEdge($pageid,'global_brand_children',null,array("fields"=>$fields,"limit"=>$limit));
    }

}
