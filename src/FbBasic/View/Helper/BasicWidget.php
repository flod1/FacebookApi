<?php
namespace FbBasic\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;

class BasicWidget extends AbstractHelper
{
    /**
     * @var ViewModel
     */
    protected $vm;
    /**
     * @var \Facebook\GraphNodes\GraphEdge | \Facebook\GraphNodes\GraphNode
     */
    protected $results=null;

    public function __construct()
    {
        $this->vm = new ViewModel();
    }
    
    public function render($template=null){

        //Have Results
        if($this->results){
            //var_dump($this->results);
            if(is_a($this->results,\Facebook\GraphNodes\GraphEdge::class)){
                $this->vm->setVariables(array("items"=>$this->results));
                //Default Template
                $this->vm->setTemplate("widget/default/table.phtml");
            }
            else if(is_subclass_of($this->results,\Facebook\GraphNodes\GraphNode::class) || is_a($this->results,\Facebook\GraphNodes\GraphNode::class)){
                $this->vm->setVariables(array("item"=>$this->results));
                //Default Template
                $this->vm->setTemplate("widget/default/detail.phtml");
            }
        }
        //Overwrite template
        if($template){
            $this->vm->setTemplate($template);
        }
        $this->results = null;
        return $this->getView()->render($this->vm);
    }

    public function setTemplate($template){
        $this->vm->setTemplate($template);

        return $this;
    }

    public function __toString()
    {
        return $this->render();
    }

}