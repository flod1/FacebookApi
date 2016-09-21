<?php

namespace FbBasic\Service;

use Facebook\GraphNodes\GraphNodeFactory;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\Stdlib\Hydrator;

class FacebookBase extends FacebookAbstract implements ServiceManagerAwareInterface
{
    /**
     * @param int $photoid
     * @param string $fields
     * @return \FbBasic\GraphNodes\Photo
     */
    public function fetchPhoto($photoid, $fields = null)
    {
        if ($fields == "*") {
            $fields = $this->getObjectFields(\FbBasic\GraphNodes\Photo::class);
        }

        $parameters = array("fields"=>$fields);
        $response = $this->fetchGraphNode($photoid, $parameters);

        $factory = new GraphNodeFactory($response);
        return $factory->makeGraphNode(\FbBasic\GraphNodes\Photo::class);
    }
    /**
     * @param int $userid
     * @param string $fields
     * @return \FbBasic\GraphNodes\User
     */
    public function fetchUser($userid, $fields = null)
    {
        if ($fields == "*") {
            $fields = $this->getObjectFields(\FbBasic\GraphNodes\User::class);
        }

        $parameters = array("fields"=>$fields);
        $response = $this->fetchGraphNode($userid, $parameters);

        $factory = new GraphNodeFactory($response);
        return $factory->makeGraphNode(\FbBasic\GraphNodes\User::class);
    }
    /**
     * @param int $commentid
     * @param string $fields
     * @return \FbBasic\GraphNodes\Photo
     */
    public function fetchComment($commentid, $fields = null)
    {
        if ($fields == "*") {
            $fields = $this->getObjectFields(\FbBasic\GraphNodes\Comment::class);
        }

        $parameters = array("fields"=>$fields);
        $response = $this->fetchGraphNode($commentid, $parameters);

        $factory = new GraphNodeFactory($response);
        return $factory->makeGraphNode(\FbBasic\GraphNodes\Comment::class);
    }
    /**
     * @param int $videoid
     * @param string $fields
     * @return \FbBasic\GraphNodes\Video
     */
    public function fetchVideo($videoid, $fields = null)
    {
        if ($fields == "*") {
            $fields = $this->getObjectFields(\FbBasic\GraphNodes\Video::class);
        }

        $parameters = array("fields"=>$fields);
        $response = $this->fetchGraphNode($videoid, $parameters);

        $factory = new GraphNodeFactory($response);
        return $factory->makeGraphNode(\FbBasic\GraphNodes\Video::class);
    }
    /**
     * @param int $postid
     * @param string $fields
     * @return \Facebook\GraphNodes\GraphNode
     */
    public function fetchPost($postid, $fields = null)
    {
        if ($fields == "*") {
            $fields = $this->getObjectFields(\FbBasic\GraphNodes\Post::class);
        }

        $parameters = array("fields"=>$fields);
        $response = $this->fetchGraphNode($postid, $parameters);

        $factory = new GraphNodeFactory($response);
        return $factory->makeGraphNode(\FbBasic\GraphNodes\Post::class);
    }

    /**
     * @param int $milestoneid
     * @param string $fields
     * @return \FbBasic\GraphNodes\Milestone
     */
    public function fetchMilestone($milestoneid, $fields = null)
    {
        if ($fields == "*") {
            $fields = $this->getObjectFields(\FbBasic\GraphNodes\Milestone::class);
        }

        $parameters = array("fields"=>$fields);
        $response = $this->fetchGraphNode($milestoneid, $parameters);

        $factory = new GraphNodeFactory($response);
        return $factory->makeGraphNode(\FbBasic\GraphNodes\Milestone::class);
    }

    /**
     * @param int $eventid
     * @param string $fields
     * @return \FbBasic\GraphNodes\Event
     */
    public function fetchEvent($eventid, $fields = null)
    {
        if ($fields == "*") {
            $fields = $this->getObjectFields(\FbBasic\GraphNodes\Event::class);
        }

        $parameters = array("fields"=>$fields);
        $response = $this->fetchGraphNode($eventid, $parameters);

        $factory = new GraphNodeFactory($response);
        return $factory->makeGraphNode(\FbBasic\GraphNodes\Event::class);
    }

    /**
     * @param int $groupid
     * @param string $fields
     * @return \FbBasic\GraphNodes\Group
     */
    public function fetchGroup($groupid, $fields = null)
    {
        if ($fields == "*") {
            $fields = $this->getObjectFields(\FbBasic\GraphNodes\Group::class);
        }

        $parameters = array("fields"=>$fields);
        $response = $this->fetchGraphNode($groupid, $parameters);

        $factory = new GraphNodeFactory($response);
        return $factory->makeGraphNode(\FbBasic\GraphNodes\Group::class);
    }

    /**
     * @param $albumid
     * @param string $fields
     * @return \FbBasic\GraphNodes\GraphAlbum
     */
    public function fetchAlbum($albumid, $fields = null)
    {
        if ($fields == "*") {
            $fields = $this->getObjectFields(\FbBasic\GraphNodes\Album::class);
        }
        $parameters = array("fields"=>$fields);
        $response = $this->fetchGraphNode($albumid, $parameters);

        $factory = new GraphNodeFactory($response);
        return $factory->makeGraphNode(\FbBasic\GraphNodes\Album::class);
        //return $response->getGraphAlbum();
    }

    /**
     * @param int $nodeid
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchAlbums($nodeid,$fields=null,$limit=100)
    {
        if ($fields == "*") {
            $fields = $this->getObjectFields(\FbBasic\GraphNodes\Album::class,false);
        }
        return $this->fetchGraphEdge($nodeid,'albums',\FbBasic\GraphNodes\Album::class,array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param int $nodeid
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchVideos($nodeid,$fields=null,$limit=25)
    {
        if ($fields == "*") {
            $fields = $this->getObjectFields(\FbBasic\GraphNodes\Video::class);
        }
        return $this->fetchGraphEdge($nodeid,'videos',\FbBasic\GraphNodes\Video::class,array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param int $nodeid
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchLikes($nodeid,$fields=null,$limit=100)
    {
        if ($fields == "*") {
            $fields = $this->getObjectFields(\FbBasic\GraphNodes\User::class);
        }
        return $this->fetchGraphEdge($nodeid,'likes',\FbBasic\GraphNodes\User::class,array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param int $nodeid
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchReactions($nodeid,$fields=null,$limit=100)
    {
        if ($fields == "*") {
            $fields = $this->getObjectFields(\FbBasic\GraphNodes\User::class);
        }
        return $this->fetchGraphEdge($nodeid,'likes',\FbBasic\GraphNodes\User::class,array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param int $nodeid
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchAttachments($nodeid,$fields=null,$limit=100)
    {
        if ($fields == "*") {
            $fields = $this->getObjectFields(\FbBasic\GraphNodes\Attachment::class);
        }
        return $this->fetchGraphEdge($nodeid,'attachments',\FbBasic\GraphNodes\Attachment::class,array("fields"=>$fields,"limit"=>$limit));
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
            $fields = $this->getObjectFields(\FbBasic\GraphNodes\Post::class);
        }
        return $this->fetchGraphEdge($nodeid,'posts',\FbBasic\GraphNodes\Post::class,array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param int $nodeid
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchEvents($nodeid,$fields=null,$limit=100)
    {
        if ($fields == "*") {
            $fields = $this->getObjectFields(\FbBasic\GraphNodes\Event::class,false);
        }
        return $this->fetchGraphEdge($nodeid,'events',\FbBasic\GraphNodes\Event::class,array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param int $pageid
     * @param string $fields
     * @return \FbBasic\GraphNodes\Page
     */
    public function fetchPage($pageid, $fields = null)
    {
        if ($fields == "*") {
            $fields = $this->getObjectFields(\FbBasic\GraphNodes\Page::class);
        }
        $parameters = array("fields"=>$fields);
        $response = $this->fetchGraphNode($pageid, $parameters);

        $factory = new GraphNodeFactory($response);
        return $factory->makeGraphNode(\FbBasic\GraphNodes\Page::class);
    }

    /**
     * @param int $videoid
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchLikesByVideo($videoid,$fields=null,$limit=100)
    {
        return $this->fetchLikes($videoid,$fields,$limit);
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
            $fields = $this->getObjectFields(\FbBasic\GraphNodes\Comment::class,false);
        }
        return $this->fetchGraphEdge($nodeid,'comments',\FbBasic\GraphNodes\Comment::class,array("fields"=>$fields,"limit"=>$limit));
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
            $fields = $this->getObjectFields(\FbBasic\GraphNodes\Photo::class);
        }
        return $this->fetchGraphEdge($nodeid,'photos',\FbBasic\GraphNodes\Photo::class,array("fields"=>$fields,"limit"=>$limit));
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
        if ($fields == "*") {
            $fields = $this->getObjectFields(\FbBasic\GraphNodes\User::class);
        }
        return $this->fetchGraphEdge($eventid,'interested',\FbBasic\GraphNodes\User::class,array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param int $eventid
     * @param string $fields
     * @param int $limit
     * @return \Facebook\GraphNodes\GraphEdge
     */
    public function fetchAdminsByEvent($eventid,$fields=null,$limit=100000)
    {
        if ($fields == "*") {
            $fields = $this->getObjectFields(\FbBasic\GraphNodes\User::class);
        }
        return $this->fetchGraphEdge($eventid,'admins',\FbBasic\GraphNodes\User::class,array("fields"=>$fields,"limit"=>$limit));
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
            $fields = $this->getObjectFields(\FbBasic\GraphNodes\Milestone::class);
        }
        return $this->fetchGraphEdge($nodeid,'milestones',\FbBasic\GraphNodes\Milestone::class,array("fields"=>$fields,"limit"=>$limit));
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
            //todo
            //$fields = $this::ALL_MILESTONE_FIELDS;
        }
        return $this->fetchGraphEdge($pageid,'global_brand_children',null,array("fields"=>$fields,"limit"=>$limit));
    }

    /**
     * @param $subclass
     * @param bool $recursive
     * @return string
     */
    public function getObjectFields($subclass,$recursive=true){

        $graphObjectFields = $subclass::getObjectFields();

        if($recursive){
            //Fetch all fields of Object GraphNode
            $graphObjectMap = $subclass::getObjectMap();
            foreach ($graphObjectMap AS $fieldname => $object){

                if(method_exists($object, "getObjectFields")) {
                    $key = array_search($fieldname, $graphObjectFields);
                    $objectFields = $object::getObjectFields();

                    if($key!==false){
                        $graphObjectFields[$key] = $fieldname."{".implode(",",$objectFields)."}";
                    }
                    else{
                        $graphObjectFields[] = $fieldname."{".implode(",",$objectFields)."}";
                    }
                    //var_dump($key);
                }
            }

            /*
            //Fetch all fields of Object Edges
            $graphObjectEdges = $subclass::getObjectEdges();
            foreach ($graphObjectEdges AS $fieldname => $object){

                if(method_exists($object, "getObjectFields")) {
                    $key = array_search($fieldname, $graphObjectFields);
                    $objectFields = $object::getObjectFields();
                    if($key!==false){
                        $graphObjectFields[$key] = $fieldname."{".implode(",",$objectFields)."}";
                    }
                    else{
                        $graphObjectFields[] = $fieldname."{".implode(",",$objectFields)."}";
                    }
                    //var_dump($key);
                }
            }
            */
            //var_dump($graphObjectMap);
            //var_dump($graphObjectEdges);
            //var_dump($graphObjectFields);
        }

        return implode(",",$graphObjectFields);
    }

}
