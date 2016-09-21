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

class GraphLocationHelper extends AbstractHelper
{
    public function __invoke($mixed)
    {
        $string = "";
        if(is_a($mixed,GraphLocation::class) || is_a($mixed,\FbBasic\GraphNodes\Location::class)){
            /* @var $mixed \Facebook\GraphNodes\GraphLocation */
            //var_dump($mixed);die();

            $string = '<address>';
            if($mixed->getField("name")){
                $string .= '<strong>'. $mixed->getName().'</strong><br>';
            }

            $string .= $mixed->getStreet().'<br>';
            $string .= $mixed->getZip().' '.$mixed->getCity().'<br>';
            $string .= $mixed->getCountry().'<br>';
            //$string .= $mixed->getLatitude().'|'.$mixed->getLongitude();
            $string .= '</address>';
        }
        else{
            var_dump($mixed);
        }
        
        return $string;
    }
}