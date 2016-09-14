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

class GraphFieldHelper extends AbstractHelper
{
    /**
     * @param $fieldname string
     * @param $mixed \Facebook\GraphNodes\GraphNode
     * @return string
     */
    public function __invoke($fieldname, $mixed)
    {
        if (is_null($mixed)) {
            $string = "null";
        } else if (is_a($mixed, \Facebook\GraphNodes\GraphEdge::class)) {
            /* @var $mixed \Facebook\GraphNodes\GraphEdge */
            $string = $this->view->graphedge($mixed);
        } else if (is_a($mixed, \Facebook\GraphNodes\GraphCoverPhoto::class)) {
            /* @var $mixed \Facebook\GraphNodes\GraphCoverPhoto */
            $string = '<a href="' . $this->view->url("graphnode", array("id" => $mixed->getField("id"))) . '">' . $this->view->graphcoverphoto($mixed) . '</a>';
        } else if (is_a($mixed, \Facebook\GraphNodes\GraphPicture::class)) {
            /* @var $mixed \Facebook\GraphNodes\GraphPicture */
            $string = $this->view->graphpicture($mixed);
            //$string = $this->view->graphpicture($mixed);
        } else if (is_a($mixed, \Facebook\GraphNodes\GraphPage::class)) {
            /* @var $mixed \Facebook\GraphNodes\GraphPage */
            $string = '<a href="' . $this->view->url("graphnode", array("id" => $mixed->getField("id"))) . '">' . $mixed->getField("name") . '</a>';
        } else if (is_a($mixed, \Facebook\GraphNodes\GraphLocation::class)) {
            /* @var $mixed \Facebook\GraphNodes\GraphLocation */
            $string = '<a href="' . $this->view->url("graphnode", array("id" => $mixed->getField("id"))) . '">' . $mixed->getField("name") . '</a>';
        } else if (is_a($mixed, \Facebook\GraphNodes\GraphNode::class)) {
            /* @var $mixed \Facebook\GraphNodes\GraphNode */
            if ($mixed->getField("id")) {
                $string = '<a href="' . $this->view->url("graphnode", array("id" => $mixed->getField("id"))) . '">' . $mixed->getField("name") . '</a>';
            } elseif ($fieldname == "images222222222") {
                //Array if Platform Image Source

                $string = $this->view->graphdump($mixed);
                //var_dump($mixed->asArray());die();
            } else {
                $string = "";//$this->view->graphdump($mixed);
                var_dump($mixed);


            }
        } elseif (is_a($mixed, \DateTime::class)) {
            /* @var $mixed \DateTime */
            $string = $mixed->format("d.m.y H:i");
        } else if ($fieldname == "picture") {
            $string = '<img src="' . $mixed . '" class="img-responsive">';
        } else if ($fieldname == "icon") {
            $string = '<img src="' . $mixed . '" class="img-responsive">';
        } else if ($fieldname == "cover") {
            $string = '<img src="' . $mixed . '" class="img-responsive">';
        } else {

            switch (gettype($mixed)) {
                case "boolean":
                    $string = ($mixed) ? 'true' : 'false';
                    break;
                case "string":
                    $string = $mixed;
                    break;
                case "integer":
                    $string = $mixed;
                    break;
                default:
                    var_dump($mixed);
                    die();
            }
            //todo better
            //var_dump($mixed);
            //echo gettype($mixed);
            //$string = $mixed->asJson();
        }

        //var_dump($mixed);
        return $string;
    }
}