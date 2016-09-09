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

class PostController extends BaseController
{
    public function indexAction()
    {
        $pageService = $this->getFacebookPageService();

        $posts= $pageService->fetchPosts();

        return new ViewModel(array("items"=>$posts,"detailRoute"=>"fbpage_post","headline"=>"Posts"));
    }

    public function detailAction()
    {
        $id = $this->plugin('params')->fromRoute('id');

        $pageService = $this->getFacebookPageService();

        $post = $pageService->fetchPost($id);

        return new ViewModel(array("item"=>$post,"headline"=>"Post"));
    }
}
