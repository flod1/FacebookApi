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
use Zend\Mvc\Controller\AbstractController;
use Zend\View\Model\ViewModel;
use Facebook;
use Facebook\FacebookRequest;
use Zend\Debug\Debug;
use Zend\Session\Container;

class IndexController extends \FbPage\Controller\AbstractController
{
    public function indexAction()
    {
        $pageService = $this->getFacebookPageService();

        //$service->
        //$pageService->setPageid(self::PageID);
        $events = $pageService->fetchEvents();
        $posts = $pageService->fetchPosts();

        $page = $pageService->fetch();

        return new ViewModel(array("events" => $events, "page" => $page, "posts" => $posts));
    }
}

