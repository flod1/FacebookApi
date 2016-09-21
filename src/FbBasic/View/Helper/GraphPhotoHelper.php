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
        $content = "";
        if (is_a($mixed, GraphNodes\Photo::class)) {
            /* @var $mixed \FbBasic\GraphNodes\Photo */
            if ($mixed->getField("id")) {
                $content = $mixed->getField("id");
            }
            if ($mixed->getField("name")) {
                $content = $mixed->getField("name");
            }
            if ($mixed->getField("picture")) {
                $content = '<img src="' . $mixed->getField('picture') . '" class="img-responsive">';
            }

            if ($mixed->getField("id")) {
                $string = '<a href="' . $this->view->url("graphnode", array("id" => $mixed->getField("id"))) . '">' . $content . '</a>';
            } else {
                $string = $content;
            }
        }
        //var_dump($mixed);
        return $string;
    }
}