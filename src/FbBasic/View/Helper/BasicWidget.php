<?php
namespace FbBasic\View\Helper;

use FbPage\Service\FacebookPage;
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
    protected $limit = 5;
    /**
     * @var string
     */
    protected $fields;
    /**
     * @var mixed
     */
    protected $results;

    public function __construct()
    {
        $this->vm = new ViewModel();
    }

    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function setFields($fields)
    {
        $this->fields = $fields;
        return $this;
    }

    public function render()
    {

        return $this->getView()->render($this->vm);
    }

    public function setTemplate($template)
    {
        $this->vm->setTemplate($template);

        return $this;
    }

    public function __toString()
    {
        return $this->render();
    }
}