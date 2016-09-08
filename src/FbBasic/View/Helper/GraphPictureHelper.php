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

class GraphPictureHelper extends AbstractHelper
{
    public function __invoke($mixed)
    {
        if(is_a($mixed,GraphNodes\GraphPicture::class)){
            /* @var $mixed \Facebook\GraphNodes\GraphPicture */
            $string = '<img src="'.$mixed->getUrl().'" class="img-responsive">';
        }
        return $string;
    }
}