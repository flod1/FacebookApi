<?php

/**
 * Created by IntelliJ IDEA.
 * User: Besitzer
 * Date: 07.09.2016
 * Time: 15:06
 */
namespace FbBasic\View\Helper;
use Zend\View\Helper\AbstractHelper;

class Locationhelper extends AbstractHelper
{
    public function __invoke($mixed)
    {
        if(is_a($mixed,\Facebook\GraphNodes\GraphLocation::class)){
            /* @var $mixed \Facebook\GraphNodes\GraphLocation */
            //var_dump($mixed);die();
            $string = '<a href="'.$this->view->url().'">'.$mixed->getField("name").'</a>';
        }
        
        return $string;
    }
}