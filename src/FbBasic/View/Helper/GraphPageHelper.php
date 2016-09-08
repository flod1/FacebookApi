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

class GraphPageHelper extends AbstractHelper
{
    public function __invoke($mixed)
    {
        if(is_a($mixed,GraphNodes\GraphPage::class)){
            /* @var $mixed \Facebook\GraphNodes\GraphPage */

            if($mixed->getLocation()){
                $string = '<address>
                          <strong>'. $mixed->getName().'</strong><br>
                          '. $mixed->getLocation()->getStreet().'<br>
                          '. $mixed->getLocation()->getZip().' '.$mixed->getLocation()->getCity().'<br>
                          '. $mixed->getLocation()->getCountry().'
                        </address>';            }
            else{
                $string = $mixed->getName();
            }

        }

        return $string;
    }
}