<?php

namespace FbPage\Options;

use Zend\Stdlib\AbstractOptions;

class FacebookPageOptions extends AbstractOptions
{

    // you can set defaults here
    // can be overriden by config file under /config/autoload

    /**
     * @var string
     */

    protected $page_id = '126843197387038';

    /**
     * @return string
     */
    public function getPageId()
    {
        return $this->page_id;
    }

    /**
     * @param string $page_id
     */
    public function setPageId($page_id)
    {
        $this->page_id = $page_id;
    }


}
