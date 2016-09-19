<?php
/**
 * Created by IntelliJ IDEA.
 * User: Besitzer
 * Date: 12.09.2016
 * Time: 08:00
 */

namespace FbBasic\GraphNodes;

use Facebook\GraphNodes\GraphPicture;

class Picture extends GraphPicture implements GraphInterface
{

    protected static $graphObjectFields = [
        "url",
        "height",
        "width",
        "is_silhouette",
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