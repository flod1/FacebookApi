<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace FbPage\Controller;

use Facebook;
use Zend\View\Model\ViewModel;

class PostController extends AbstractController
{
    public function indexAction()
    {
        $pageService = $this->getFacebookPageService();

        $posts= $pageService->fetchPosts();

        return new ViewModel(array("items"=>$posts,"detailRoute"=>"fbpage_post"));
    }

    public function detailAction()
    {
        $eventid = $this->plugin('params')->fromRoute('id');

        $pageService = $this->getFacebookPageService();

        $event = $pageService->fetchEvent($eventid);

        return new ViewModel(array("item"=>$event));
    }
}
