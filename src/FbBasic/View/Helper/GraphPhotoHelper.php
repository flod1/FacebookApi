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

class GraphPhotoHelper extends AbstractHelper
{
    public function __invoke($mixed)
    {
        if(is_a($mixed,GraphNodes\Photo::class)){
            /* @var $mixed \FbBasic\GraphNodes\Photo */
            $image = '<img src="'.$mixed->getField('picture').'" class="img-responsive">';
            if ($mixed->getField("id")) {
                $string = '<a href="' . $this->view->url("graphnode", array("id" => $mixed->getField("id"))) . '">' . $image . '</a>';
            } else {
                $string = $image;
            }
        }
        return $string;
    }
}