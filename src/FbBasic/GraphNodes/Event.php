<?php
/**
 * Created by IntelliJ IDEA.
 * User: Besitzer
 * Date: 12.09.2016
 * Time: 08:00
 */

namespace FbBasic\GraphNodes;

use Facebook\GraphNodes\GraphEvent;

class Event extends GraphEvent implements GraphInterface
{
    protected static $graphObjectFields = array(
        "id",
        "name",
        "description",
        "attending_count",
        "declined_count",
        "interested_count",
        "maybe_count",
        "noreply_count",
        "cover",
        "owner",
        "place",
        "type",
        "start_time",
        "end_time"
    );

    /**
     * @var array Maps object key names to GraphNode types.
     */
    protected static $graphObjectMap = [
        'cover' => '\Facebook\GraphNodes\GraphCoverPhoto',
        'place' => '\Facebook\GraphNodes\GraphPage',
        'picture' => '\Facebook\GraphNodes\GraphPicture',
        'parent_group' => '\Facebook\GraphNodes\GraphGroup',

        'photos' => '\FbBasic\GraphNodes\Photo',
        'attending' => '\FbBasic\GraphNodes\User',
        'declined' => '\FbBasic\GraphNodes\User',
        'interested' => '\FbBasic\GraphNodes\User',
        'maybe' => '\FbBasic\GraphNodes\User',
        'noreply' => '\FbBasic\GraphNodes\User',
        'admins' => '\FbBasic\GraphNodes\User',
    ];

    /**
     * @var array Maps object key names to Graph object types.
     */
    protected static $graphObjectEdgesMap = [
        'photos' => '\FbBasic\GraphNodes\Photo',
        'attending' => '\FbBasic\GraphNodes\User',
        'declined' => '\FbBasic\GraphNodes\User',
        'interested' => '\FbBasic\GraphNodes\User',
        'maybe' => '\FbBasic\GraphNodes\User',
        'noreply' => '\FbBasic\GraphNodes\User',
        'admins' => '\FbBasic\GraphNodes\User',
        //'videos' => '\FbBasic\GraphNodes\Video',
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