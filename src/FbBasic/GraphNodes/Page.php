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
    /**
     * @var array Maps object key names to Graph object types.
     */
    protected static $graphObjectMap = [
        'best_page' => '\Facebook\GraphNodes\GraphPage',
        'global_brand_parent_page' => '\Facebook\GraphNodes\GraphPage',
        'location' => '\Facebook\GraphNodes\GraphLocation',
        'cover' => '\Facebook\GraphNodes\GraphCoverPhoto',
        'picture' => '\Facebook\GraphNodes\GraphPicture',
    ];
}