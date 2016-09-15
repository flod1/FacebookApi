<?php

/**
 * Created by IntelliJ IDEA.
 * User: Besitzer
 * Date: 07.09.2016
 * Time: 15:06
 */
namespace FbBasic\View\Helper;
use Zend\View\Helper\AbstractHelper;

class GraphDumpHelper extends AbstractHelper
{
    public function __invoke($mixed)
    {
        if(is_null($mixed)){
            $string = "null";
        }
        elseif(is_object($mixed)){
            if(is_subclass_of($mixed,\Facebook\GraphNodes\GraphNode::class) || is_a($mixed,\Facebook\GraphNodes\GraphNode::class)){
                /* @var $mixed \Facebook\GraphNodes\GraphNode */
                //$string =
                if(is_a($mixed,\Facebook\GraphNodes\GraphCoverPhoto::class)){
                    /* @var $mixed \Facebook\GraphNodes\GraphCoverPhoto */
                    $string = $this->view->partial('widget/default/partial/dump.phtml', array("list"=>$mixed->asArray()));
                }
                else if(is_a($mixed,\Facebook\GraphNodes\GraphPicture::class)){
                    /* @var $mixed \Facebook\GraphNodes\GraphPicture */
                    $string = $this->view->partial('widget/default/partial/dump.phtml', array("list"=>$mixed->asArray()));
                }
                else if(is_a($mixed,\Facebook\GraphNodes\GraphPage::class)){
                    /* @var $mixed \Facebook\GraphNodes\GraphPage */
                    $string = $this->view->partial('widget/default/partial/dump.phtml', array("list"=>$mixed->asArray()));
                }
                else if(is_a($mixed,\Facebook\GraphNodes\GraphLocation::class)){
                    /* @var $mixed \Facebook\GraphNodes\GraphLocation */
                    $string = $this->view->partial('widget/default/partial/dump.phtml', array("list"=>$mixed->asArray()));
                }
                else if(is_a($mixed,\Facebook\GraphNodes\GraphNode::class)){
                    /* @var $mixed \Facebook\GraphNodes\GraphNode */
                    $string = $this->view->partial('widget/default/partial/dump.phtml', array("list"=>$mixed->asArray()));
                }
                else{
                    var_dump($mixed);die();
                }

                //var_dump($mixed->asArray());die();



            }
            else if(is_a($mixed,\DateTime::class)){
                /* @var $mixed \DateTime */
                $string = $mixed->format("d.m.y H:i");
            }
            else  {
                //var_dump($mixed);die();

            }
        }
        else{
            switch(gettype ( $mixed)){
                case "boolean":$string = ($mixed) ? 'true' : 'false'; break;
                case "string":$string = $mixed; break;
                case "integer":$string = $mixed; break;
                case "float":$string = $mixed; break;
                default:var_dump($mixed);die();
            }

        }

        return $string;
    }
}

