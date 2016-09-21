<?php
/**
 * Created by IntelliJ IDEA.
 * User: Besitzer
 * Date: 12.09.2016
 * Time: 08:00
 */

namespace FbBasic\GraphNodes;

use Facebook\GraphNodes\GraphNode;

class StoryAttachmentMedia extends GraphNode implements GraphInterface
{

    protected static $graphObjectFields = [
        "image"
    ];

    /**
     * @var array Maps object key names to Graph object types.
     */
    protected static $graphObjectMap = [
        'image' => '\FbBasic\GraphNodes\PlatformImageSource',
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
        if(static::$graphObjectEdgesMap){
            return static::$graphObjectEdgesMap;
        }
        else{
            return array();
        }
    }
}