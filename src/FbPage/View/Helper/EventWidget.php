<?php
namespace FbPage\View\Helper;

class EventWidget extends BaseWidget
{
    public function fetchAll(){
        $this->results = $this->facebookPageService->fetchEvents($this->fields,$this->limit);

        $this->vm->setVariables(array("items"=>$this->results));

        return $this;
    }

    public function fetch($id){
        $item = $this->facebookPageService->fetchEvent($id,$this->fields);

        $this->vm->setVariables(array("item"=>$item));

        return $this;
    }
}