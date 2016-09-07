<?php

namespace FbPage\Options;

use Zend\Stdlib\AbstractOptions;

class FacebookOptions extends AbstractOptions
{

    // you can set defaults here
    // can be overriden by config file under /config/autoload

    /**
     * @var string
     */

    protected $app_id = '';
    /**
     * @var string
     */
    protected $app_secret = '';
    /**
     * @var string
     */
    protected $default_graph_version = 'v2.7';
    /**
     * @var string
     */
    protected $default_access_token = '';

    /**
     * @return string
     */
    public function getAppId()
    {
        return $this->app_id;
    }

    /**
     * @param string $app_id
     */
    public function setAppId($app_id)
    {
        $this->app_id = $app_id;
    }

    /**
     * @return string
     */
    public function getAppSecret()
    {
        return $this->app_secret;
    }

    /**
     * @param string $app_secret
     */
    public function setAppSecret($app_secret)
    {
        $this->app_secret = $app_secret;
    }

    /**
     * @return string
     */
    public function getDefaultAccessToken()
    {
        return $this->default_access_token;
    }

    /**
     * @param string $default_access_token
     */
    public function setDefaultAccessToken($default_access_token)
    {
        $this->default_access_token = $default_access_token;
    }

    /**
     * @return string
     */
    public function getDefaultGraphVersion()
    {
        return $this->default_graph_version;
    }

    /**
     * @param string $default_graph_version
     */
    public function setDefaultGraphVersion($default_graph_version)
    {
        $this->default_graph_version = $default_graph_version;
    }




}
