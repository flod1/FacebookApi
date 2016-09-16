<?php
/**
 * Created by IntelliJ IDEA.
 * User: Besitzer
 * Date: 12.09.2016
 * Time: 08:00
 */

namespace FbBasic\GraphNodes;

use Facebook\GraphNodes\GraphGroup;

class Group extends GraphGroup implements GraphInterface
{
    protected static $graphObjectFields = [
        "id",
        "cover",
        "name",
        "description",
        "email",
        "icon",
        "member_request_count",
        "owner",
        "parent",
        "privacy",
    ];

    /**
     * @var array Maps object key names to Graph object types.
     */
    protected static $graphObjectMap = [
        'albums' => '\FbBasic\GraphNodes\Album',
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