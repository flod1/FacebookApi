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

class GraphAttachmentHelper extends AbstractHelper
{
    public function __invoke($mixed)
    {
        $string = "";
        if(is_a($mixed,GraphNodes\StoryAttachmentMedia::class)){

            /* @var $mixed \FbBasic\GraphNodes\StoryAttachmentMedia */
            foreach($mixed AS $item){

                /* @var $item \FbBasic\GraphNodes\Image */
                $string .= $this->view->graphfield(null,$item); ?><?

            }
        }
        if(is_a($mixed,GraphNodes\Attachment::class)){

            /* @var $mixed \FbBasic\GraphNodes\Attachment */
            foreach($mixed AS $item){

                /* @var $item \FbBasic\GraphNodes\Image */
                $string .= $this->view->graphfield(null,$item); ?><?

            }
        }
        return $string;
    }
}