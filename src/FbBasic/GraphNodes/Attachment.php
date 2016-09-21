<?php
/**
 * Created by IntelliJ IDEA.
 * User: Besitzer
 * Date: 12.09.2016
 * Time: 08:00
 */

namespace FbBasic\GraphNodes;

use Facebook\GraphNodes\GraphPicture;

class Attachment extends GraphPicture implements GraphInterface
{

    protected static $graphObjectFields = [
        "description",
        "description_tags",
        "media",
        "target",
        "title",
        "type",
        "url",
    ];

    /**
     * @var array Maps object key names to Graph object types.
     */
    protected static $graphObjectMap = [
        'media' => '\FbBasic\GraphNodes\StoryAttachmentMedia',
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