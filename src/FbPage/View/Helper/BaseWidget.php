<?php
namespace FbPage\View\Helper;

use FbBasic\View\Helper\BasicWidget;
use FbPage\Service\FacebookPage;

class BaseWidget extends BasicWidget
{
    /**
     * @var FacebookPage
     */
    protected $facebookPageService;

    public function __construct(FacebookPage $facebookPageService)
    {
        $this->facebookPageService = $facebookPageService;
        parent::__construct();
    }

    public function __invoke()
    {
        return $this;//
    }

    public function count()
    {
        if($this->results){
            return $this->results->count();
        }
    }
}