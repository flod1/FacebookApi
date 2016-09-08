<?php

/**
 * Created by IntelliJ IDEA.
 * User: Besitzer
 * Date: 07.09.2016
 * Time: 15:06
 */
namespace FbBasic\View\Helper;
use Zend\View\Helper\AbstractHelper;

class Coverphotohelper extends AbstractHelper
{
    public function __invoke($mixed)
    {
        if(is_a($mixed,\Facebook\GraphNodes\GraphCoverPhoto::class)){
            /* @var $mixed \Facebook\GraphNodes\GraphCoverPhoto */
            //var_dump($mixed);die();
            $string = '<img src="'.$mixed->getField("source").'" class="img-responsive">';
        }

        return $string;
    }
}