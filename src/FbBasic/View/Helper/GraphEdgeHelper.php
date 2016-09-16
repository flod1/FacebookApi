<?php

/**
 * Created by IntelliJ IDEA.
 * User: Besitzer
 * Date: 07.09.2016
 * Time: 15:06
 */
namespace FbBasic\View\Helper;
use Zend\View\Helper\AbstractHelper;
use Facebook\GraphNodes;

class GraphEdgeHelper extends AbstractHelper
{
    public function __invoke($mixed)
    {
        if(is_a($mixed,GraphNodes\GraphEdge::class)){
            $string = "";
            /* @var $mixed \Facebook\GraphNodes\GraphEdge */
            foreach($mixed AS $item){

                /* @var $item \Facebook\GraphNodes\GraphNode */
                $string .= $this->view->graphfield(null,$item); ?><?

                //$string .= '<a href="' . $this->view->url("graphnode", array("id" => $item->getField("id"))) . '">' . $item->getField("name") . '</a><br>';

            }

        }
        return $string;
    }
}