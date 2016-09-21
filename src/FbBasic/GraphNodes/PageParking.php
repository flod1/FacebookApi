<?php
/**
 * Created by IntelliJ IDEA.
 * User: Besitzer
 * Date: 12.09.2016
 * Time: 08:00
 */

namespace FbBasic\GraphNodes;

use Facebook\GraphNodes\GraphNode;

class PageParking extends GraphNode
{

    protected static $graphObjectFields = [
        "lot",
        "street",
        "valet",
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