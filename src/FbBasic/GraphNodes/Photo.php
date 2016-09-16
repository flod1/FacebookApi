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
        //'images' => '\FbBasic\GraphNodes\PlatformImageSource',
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

}