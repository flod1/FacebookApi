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

class GraphImageHelper extends AbstractHelper
{
    public function __invoke($mixed)
    {
        if(is_a($mixed,GraphNodes\PlatformImageSource::class)){
            /* @var $mixed \FbBasic\GraphNodes\PlatformImageSource */
            $string  = '<img src="'.$mixed->getField('src').'" class="img-responsive">';

        }
        return $string;
    }
}