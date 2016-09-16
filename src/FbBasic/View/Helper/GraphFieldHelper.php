<?php

/**
 * Created by IntelliJ IDEA.
 * User: Besitzer
 * Date: 07.09.2016
 * Time: 15:06
 */
namespace FbBasic\View\Helper;

use Facebook\GraphNodes;
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
        } else if (is_a($mixed, \FbBasic\GraphNodes\Photo::class)) {
            /* @var $mixed \FbBasic\GraphNodes\Photo */
            $string = $this->view->graphphoto($mixed);
        } else if (is_a($mixed, \Facebook\GraphNodes\GraphCoverPhoto::class)) {
            /* @var $mixed \Facebook\GraphNodes\GraphCoverPhoto */
            $string = $this->view->graphcoverphoto($mixed);
            //$string = '<a href="' . $this->view->url("graphnode", array("id" => $mixed->getField("id"))) . '">' . $this->view->graphcoverphoto($mixed) . '</a>';
        } else if (is_a($mixed, \Facebook\GraphNodes\GraphPicture::class)) {
            /* @var $mixed \Facebook\GraphNodes\GraphPicture */
            $string = $this->view->graphpicture($mixed);
        } else if (is_a($mixed, \Facebook\GraphNodes\GraphPage::class)) {
            /* @var $mixed \Facebook\GraphNodes\GraphPage */
            if ($mixed->getField("id")) {
                $string = '<a href="' . $this->view->url("graphnode", array("id" => $mixed->getField("id"))) . '">' . $mixed->getField("name") . '</a>';
            } else {
                $string = $mixed->getName();
            }
            //$string = '<a href="' . $this->view->url("graphnode", array("id" => $mixed->getField("id"))) . '">' . $mixed->getField("name") . '</a>';
        } else if (is_a($mixed, \Facebook\GraphNodes\GraphLocation::class)) {
            /* @var $mixed \Facebook\GraphNodes\GraphLocation */
            $string = $this->view->graphlocation($mixed);
            //$string = '<a href="' . $this->view->url("graphnode", array("id" => $mixed->getField("id"))) . '">' . $mixed->getField("name") . 's</a>';
        } else if (is_a($mixed, \Facebook\GraphNodes\GraphNode::class)) {
            /* @var $mixed \Facebook\GraphNodes\GraphNode */
            $string="";$title = $mixed->getField("id");
            if($mixed->getField("name")){
                $title = $mixed->getField("name");
            }
            else if($mixed->getField("title")){
                $title = $mixed->getField("title");
            }
            if ($fieldname == "shares") {
                //todo
                $title = $mixed->getField("count");
            }

            if(isset($title)){
                if ($mixed->getField("id")) {
                    $string = '<a href="' . $this->view->url("graphnode", array("id" => $mixed->getField("id"))) . '">' . $title . '</a><br>';
                } else{
                    $string = $title;
                }
            }
            else{
                var_dump($mixed);
            }
        } else if (is_a($mixed, \DateTime::class)) {
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
                case "double":
                case "float":
                    $string = $mixed . "";
                    break;
                default:
                    $string = gettype($mixed);
                    var_dump($mixed);
            }
        }

        //var_dump($mixed);
        return $string;
    }
}