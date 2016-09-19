<?php
/**
 * Created by IntelliJ IDEA.
 * User: Besitzer
 * Date: 12.09.2016
 * Time: 08:00
 */

namespace FbBasic\GraphNodes;

use Facebook\GraphNodes\GraphPage;

class Page extends GraphPage
{

    protected static $graphObjectFields = [
        "id",
        "name",
        "about",
        "fan_count",
        "cover",
        "picture",
        "display_subtext",
        "impressum",
        "parking",
        "phone",
        "place_type",
        "start_info",
        "username",
        "website",
        "current_location",
    ];

    /**
     * @var array Maps object key names to Graph object types.
     */
    protected static $graphObjectMap = [
        'best_page' => '\Facebook\GraphNodes\GraphPage',
        'global_brand_parent_page' => '\Facebook\GraphNodes\GraphPage',
        'location' => '\FbBasic\GraphNodes\Location',
        'cover' => '\Facebook\GraphNodes\GraphCoverPhoto',
        'picture' => '\FbBasic\GraphNodes\Picture',

        'albums' => '\FbBasic\GraphNodes\Album',
        'events' => '\FbBasic\GraphNodes\Event',
        'milestones' => '\FbBasic\GraphNodes\Milestone',
        'videos' => '\FbBasic\GraphNodes\Video',
        'photos' => '\FbBasic\GraphNodes\Photo',
        'feed' => '\FbBasic\GraphNodes\Post',
    ];

    /**
     * @var array Maps object key names to Graph object types.
     */
    protected static $graphObjectEdgesMap = [
        'albums' => '\FbBasic\GraphNodes\Album',
        'events' => '\FbBasic\GraphNodes\Event',
        'milestones' => '\FbBasic\GraphNodes\Milestone',
        'videos' => '\FbBasic\GraphNodes\Video',
        'photos' => '\FbBasic\GraphNodes\Photo',
        'feed' => '\FbBasic\GraphNodes\Post',
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