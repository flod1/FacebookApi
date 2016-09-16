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
        if(is_a($mixed,GraphLocation::class)){
            /* @var $mixed \Facebook\GraphNodes\GraphLocation */
            //var_dump($mixed);die();

            $string = '<address>
                          <strong>'. $mixed->getName().'</strong><br>
                          '. $mixed->getLocation()->getStreet().'<br>
                          '. $mixed->getLocation()->getZip().' '.$mixed->getLocation()->getCity().'<br>
                          '. $mixed->getLocation()->getCountry().'
                        </address>';
            //$string = '<a href="'.$this->view->url().'">'.$mixed->getField("name").'</a>';
        }
        else{
            var_dump($mixed);
        }
        
        return $string;
    }
}