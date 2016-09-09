<?php
namespace FbPage\View\Helper;

use FbBasic\View\Helper\BasicWidget;
use FbPage\Service\FacebookPage;

class AlbumWidget extends BasicWidget
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

    public function fetchAll(){
        $this->results = $this->facebookPageService->fetchAlbums($this->fields,$this->limit);

        $this->vm->setVariables(array("items"=>$this->results));

        return $this;
    }
}