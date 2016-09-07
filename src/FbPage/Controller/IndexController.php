<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace FbPage\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Facebook;
use Facebook\FacebookRequest;
use Zend\Debug\Debug;
use Zend\Session\Container;

class IndexController extends AbstractActionController
{


    /**
     * @var \FbPage\Service\Facebook
     */
    protected $facebookService;

    public function indexAction()
    {
        $service = $this->getFacebookService();

        return new ViewModel();
    }

    /**
     * Getters/setters for DI stuff
     */

    /**
     * @return \FbPage\Service\Facebook
     */
    public function getFacebookService()
    {
        if (!$this->facebookService) {
            $this->facebookService = $this->serviceLocator->get('fbpage_facebook_service');
        }
        return $this->facebookService;
    }

    public function setFacebookService(Newsletter $facebookService)
    {
        $this->facebookService = $facebookService;
        return $this;
    }
}
