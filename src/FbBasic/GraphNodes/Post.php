<?php
/**
 * Created by IntelliJ IDEA.
 * User: Besitzer
 * Date: 12.09.2016
 * Time: 08:00
 */

namespace FbBasic\GraphNodes;

use Facebook\GraphNodes\GraphNode;

class Post extends GraphNode implements GraphInterface
{
    protected static $graphObjectFields = [
        "id",
        "description",
        "created_time",
        "from",
        "name",
        "picture",
        "type",
        "place",
        "message",
        "actions",
        "link",
        "targeting",
        "feed_targeting",
        "story",
        "attachments"
    ];

    /**
     * @var array Maps object key names to Graph object types.
     */
    protected static $graphObjectMap = [
        'from' => '\FbBasic\GraphNodes\User',
        'place' => '\Facebook\GraphNodes\GraphPage',

        'likes' => '\FbBasic\GraphNodes\User',
        'reactions' => '\FbBasic\GraphNodes\User',
        'comments' => '\FbBasic\GraphNodes\Comment',
        'sharedposts' => '\FbBasic\GraphNodes\Post',
        'attachments' => '\FbBasic\GraphNodes\Attachment',
    ];

    /**
     * @var array Maps object key names to Graph object types.
     */
    protected static $graphObjectEdgesMap = [
        'likes' => '\FbBasic\GraphNodes\User',
        'reactions' => '\FbBasic\GraphNodes\User',
        'comments' => '\FbBasic\GraphNodes\Comment',
        'sharedposts' => '\FbBasic\GraphNodes\Post',
        'attachments' => '\FbBasic\GraphNodes\Attachment',
    ];

    /**
     * Getter for $graphObjectFields.
     *
     * @return array
     */
    public static function getObjectFields()
    {
        return static::$graphObjectFields;
    }
    /**
     * Getter for $graphObjectEdgesMap.
     *
     * @return array
     */
    public static function getObjectEdges()
    {
        return static::$graphObjectEdgesMap;
    }

}