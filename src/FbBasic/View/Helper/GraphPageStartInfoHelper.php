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

class GraphPageStartInfoHelper extends AbstractHelper
{
    public function __invoke($mixed)
    {
        $string = "";
        if(is_a($mixed,\FbBasic\GraphNodes\PageStartInfo::class)){
            /* @var $mixed \FbBasic\GraphNodes\PageStartInfo */
            if($mixed->getField("type")){
                $string .= '<strong>'. $mixed->getField("type").'</strong><br>';
            }
            if($mixed->getField("date")){
                $string .= $mixed->getField("date");
            }

        }
        
        return $string;
    }
}