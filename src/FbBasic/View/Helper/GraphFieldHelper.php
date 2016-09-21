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
     * @param $mixed \Facebook\GraphNodes\GraphNode | \Facebook\GraphNodes\GraphEdge
     * @return string
     */
    public function __invoke($fieldname, $mixed)
    {
        $string="";
        if(is_object($mixed)){
            switch(get_class($mixed)){
                //case \Facebook\GraphNodes\GraphNode::class: $string = $this->view->graphnode($mixed);break;
                case \Facebook\GraphNodes\GraphEdge::class: $string = $this->view->graphedge($mixed);break;
                case \Facebook\GraphNodes\GraphCoverPhoto::class: $string = $this->view->graphcoverphoto($mixed);break;
                case \FbBasic\GraphNodes\PageStartInfo::class: $string = $this->view->graphpagestartinfo($mixed);break;
                case \FbBasic\GraphNodes\Picture::class: $string = $this->view->graphpicture($mixed);break;
                case \FbBasic\GraphNodes\Location::class: $string = $this->view->graphlocation($mixed);break;
                case \FbBasic\GraphNodes\Album::class: $string = $this->view->graphnode($mixed);break;
                case \FbBasic\GraphNodes\Event::class: $string = $this->view->graphnode($mixed);break;
                case \FbBasic\GraphNodes\Video::class: $string = $this->view->graphnode($mixed);break;
                case \FbBasic\GraphNodes\Photo::class: $string = $this->view->graphnode($mixed);break;
                case \FbBasic\GraphNodes\Post::class: $string = $this->view->graphnode($mixed);break;
                case \FbBasic\GraphNodes\User::class: $string = $this->view->graphnode($mixed);break;
                case \FbBasic\GraphNodes\Comment::class: $string = $this->view->graphnode($mixed);break;
                case \FbBasic\GraphNodes\Attachment::class: $string = $this->view->graphattachment($mixed);break;
                case \FbBasic\GraphList\PlatformImageSources::class: $string = $this->view->graphimages($mixed);break;
                case \DateTime::class: $string = $mixed->format("d.m.y H:i");break;
                default : var_dump(get_class($mixed));var_dump($mixed);
            }
        } else if ($fieldname == "picture") {
            $string = '<img src="' . $mixed . '" class="img-responsive">';
        } else if ($fieldname == "icon") {
            $string = '<img src="' . $mixed . '" class="img-responsive">';
        } else if ($fieldname == "cover") {
            $string = '<img src="' . $mixed . '" class="img-responsive">';
        } else if (is_null($mixed)) {
                $string = "null";
        }else{
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