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

class EventController extends AbstractController
{
    public function indexAction()
    {
        $pageService = $this->getFacebookPageService();

        $events = $pageService->fetchEvents();

        return new ViewModel(array("events"=>$events));
    }
}
