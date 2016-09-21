<?php

/**
 * Created by IntelliJ IDEA.
 * User: Besitzer
 * Date: 07.09.2016
 * Time: 15:06
 */
namespace FbBasic\View\Helper;
use Facebook\GraphNodes\GraphNodeFactory;
use Zend\View\Helper\AbstractHelper;

class GraphNodeHelper extends AbstractHelper
{
    /**
     * @param $mixed \Facebook\GraphNodes\GraphNode
     * @return string
     */
    public function __invoke($mixed)
    {
        /* @var $mixed \Facebook\GraphNodes\GraphNode */

        $title = $mixed->getField("id");
        if($mixed->getField("name")){
            $title = $mixed->getField("name");
        }
        else if($mixed->getField("title")){
            $title = $mixed->getField("title");
        }

        if ($mixed->getField("id")) {
            $string = '<a href="' . $this->view->url("graphnode", array("id" => $mixed->getField("id"))) . '">' . $title . '</a><br>';
        } else{
            $string = $title;
        }

        return $string;
    }
}