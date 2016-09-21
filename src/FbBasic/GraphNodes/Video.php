<?php
/**
 * Created by IntelliJ IDEA.
 * User: Besitzer
 * Date: 12.09.2016
 * Time: 08:00
 */

namespace FbBasic\GraphNodes;

use Facebook\GraphNodes\GraphNode;

class Video extends GraphNode implements GraphInterface
{
    protected static $graphObjectFields = [
        "id",
        "created_time",
        "description",
        "embed_html",
        "format","from",
        "icon",
        "length",
        "picture",
        "place",
        "source",
        "status"
    ];

    /**
     * @var array Maps object key names to Graph object types.
     */
    protected static $graphObjectMap = [
        'from' => '\FbBasic\GraphNodes\User',
        'likes' => '\FbBasic\GraphNodes\User',
        'reactions' => '\FbBasic\GraphNodes\User',
        'comments' => '\FbBasic\GraphNodes\Comment',
        'sharedposts' => '\FbBasic\GraphNodes\Post'
    ];

    /**
     * @var array Maps object key names to Graph object types.
     */
    protected static $graphObjectEdgesMap = [
        'likes' => '\FbBasic\GraphNodes\User',
        'reactions' => '\FbBasic\GraphNodes\User',
        'comments' => '\FbBasic\GraphNodes\Comment',
        'sharedposts' => '\FbBasic\GraphNodes\Post'
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