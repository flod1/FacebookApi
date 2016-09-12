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
     * @var int
     */
    protected $limit=5;
    /**
     * @var string
     */
    protected $fields=null;
    /**
     * @var mixed
     */
    protected $results=null;
    /**
     * @var mixed
     */
    protected $result=null;

    public function __construct()
    {
        $this->vm = new ViewModel();
    }

    public function setLimit($limit){
        $this->limit = $limit;
        return $this;
    }

    public function setFields($fields){
        $this->fields = $fields;
        return $this;
    }


    public function render($template=null){

        //Have Results
        if($this->results){
            $this->vm->setVariables(array("items"=>$this->results));
            //Default Template
            $this->vm->setTemplate("widget/default/table.phtml");
        }
        elseif($this->result){
            $this->vm->setVariables(array("item"=>$this->result));
            //Default Template
            $this->vm->setTemplate("widget/default/detail.phtml");
        }
        //Overwrite template
        if($template){
            $this->vm->setTemplate($template);
        }
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

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @return string
     */
    public function getFields()
    {
        return $this->fields;
    }


}