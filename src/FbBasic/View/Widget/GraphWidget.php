<?php
namespace FbBasic\View\Widget;

use FbBasic\Service\FacebookBase;
use Zend\View\Model\ViewModel;

class GraphWidget extends BasicWidget
{
    /**
     * @var FacebookBase
     */
    protected $facebookBaseService;

    public function __construct(FacebookBase $facebookBaseService)
    {
        $this->facebookBaseService = $facebookBaseService;
        parent::__construct();
    }

    public function __invoke()
    {
        return $this;//
    }

    public function fetchPage($pageid,$fields=null)
    {
        $this->results = $this->facebookBaseService->fetchPage($pageid, $fields);

        return $this;
    }

    public function fetchEvent($eventid,$fields=null)
    {
        $this->results = $this->facebookBaseService->fetchEvent($eventid, $fields);

        return $this;
    }

    public function fetchAlbum($albumid,$fields=null)
    {
        $this->results = $this->facebookBaseService->fetchAlbum($albumid, $fields);

        return $this;
    }

}