<?php

/**
 * Created by IntelliJ IDEA.
 * User: Besitzer
 * Date: 07.09.2016
 * Time: 15:06
 */
namespace FbBasic\View\Helper;
use Zend\View\Helper\AbstractHelper;

class Graphhelper extends AbstractHelper
{
    public function __invoke($mixed)
    {
        if(is_null($mixed)){
            $string = "";
        }
        elseif(is_object($mixed)){
            if(is_subclass_of($mixed,\Facebook\GraphNodes\GraphNode::class) || is_a($mixed,\Facebook\GraphNodes\GraphNode::class)){
                /* @var $mixed \Facebook\GraphNodes\GraphNode */
                $string = $this->view->graphnode($mixed);
                //var_dump($mixed);
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
                default:var_dump($mixed);die();
            }

        }

        return $string;
    }
}

