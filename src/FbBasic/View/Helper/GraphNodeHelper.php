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
        if(is_a($mixed,\Facebook\GraphNodes\GraphCoverPhoto::class)){
            /* @var $mixed \Facebook\GraphNodes\GraphCoverPhoto */
            $string = '<a href="'.$this->view->url("graphnode",array("id"=>$mixed->getField("id"))).'">'.$this->view->graphcoverphoto($mixed).'</a>';
        }
        else if(is_a($mixed,\Facebook\GraphNodes\GraphPicture::class)){
            /* @var $mixed \Facebook\GraphNodes\GraphPicture */
            $string = $this->view->graphpicture($mixed);
        }
        else if(is_a($mixed,\Facebook\GraphNodes\GraphPage::class)){
            /* @var $mixed \Facebook\GraphNodes\GraphPage */
            //$string = $this->view->graphpage($mixed);
            $string = '<a href="'.$this->view->url("graphnode",array("id"=>$mixed->getField("id"))).'">'.$mixed->getField("name").'</a>';
        }
        else if(is_a($mixed,\Facebook\GraphNodes\GraphLocation::class)){
            /* @var $mixed \Facebook\GraphNodes\GraphLocation */
            //$string = $this->view->locationhelper($mixed);
            $string = '<a href="'.$this->view->url("graphnode",array("id"=>$mixed->getField("id"))).'">'.$mixed->getField("name").'</a>';
        }
        else if(is_a($mixed,\Facebook\GraphNodes\GraphNode::class)){
            /* @var $mixed \Facebook\GraphNodes\GraphNode */
            $string = '<a href="'.$this->view->url("graphnode",array("id"=>$mixed->getField("id"))).'">'.$mixed->getField("name").'</a>';
        }
        else if($mixed->getField("picture")<>""){
            $string = '<img src="'.$mixed->getField("picture").'" class="img-responsive">';
        }
        else if($mixed->getField("icon")<>""){
            $string = '<img src="'.$mixed->getField("icon").'" class="img-responsive">';
        }
        else {

            //todo better
            var_dump($mixed);
            echo gettype($mixed);
            $string = $mixed->asJson();
        }

        var_dump($mixed);
        return $string;
    }
}