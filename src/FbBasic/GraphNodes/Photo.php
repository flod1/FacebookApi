<?php
/**
 * Created by IntelliJ IDEA.
 * User: Besitzer
 * Date: 12.09.2016
 * Time: 08:00
 */

namespace FbBasic\GraphNodes;

use Facebook\GraphNodes\GraphNode;

class Photo extends GraphNode implements GraphInterface
{
    protected static $graphObjectFields = [
        "id",
        "album",
        "event",
        "from",
        "icon",
        "height",
        "width",
        "name",
        "picture",
        "target",
        "created_time",
        "images"
    ];

    /**
     * @var array Maps object key names to Graph object types.
     */
    protected static $graphObjectMap = [
        'images' => '\FbBasic\GraphList\PlatformImageSources',

        'likes' => '\FbBasic\GraphNodes\User',
        'reactions' => '\FbBasic\GraphNodes\User',
        'tags' => '\FbBasic\GraphNodes\User',
        'comments' => '\FbBasic\GraphNodes\Comment',
    ];


    /**
     * @var array Maps object key names to Graph object types.
     */
    protected static $graphObjectEdgesMap = [
        'likes' => '\FbBasic\GraphNodes\User',
        'reactions' => '\FbBasic\GraphNodes\User',
        'tags' => '\FbBasic\GraphNodes\User',
        'comments' => '\FbBasic\GraphNodes\Comment',
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