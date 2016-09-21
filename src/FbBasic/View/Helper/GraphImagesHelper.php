<?php

/**
 * Created by IntelliJ IDEA.
 * User: Besitzer
 * Date: 07.09.2016
 * Time: 15:06
 */
namespace FbBasic\View\Helper;
use Zend\View\Helper\AbstractHelper;
use FbBasic\GraphNodes;

class GraphImagesHelper extends AbstractHelper
{
    public function __invoke($mixed)
    {
        $string = "";
        /* @var $mixed \Facebook\GraphNodes\GraphEdge */
        foreach($mixed AS $item){

            /* @var $item \FbBasic\GraphNodes\PlatformImageSource */
            //$string .= '<img src="'.$item->getField("source").'"><br>';
            $string .= $item->asJson().'<br>';
        }

        return $string;
    }
}