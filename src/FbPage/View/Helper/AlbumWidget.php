<?php
namespace FbPage\View\Helper;

class AlbumWidget extends BaseWidget
{
    public function fetchAll(){
        $this->results = $this->facebookPageService->fetchAlbums($this->fields,$this->limit);

        $this->vm->setVariables(array("items"=>$this->results));

        return $this;
    }
}