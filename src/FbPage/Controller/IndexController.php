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

class IndexController extends BaseController
{
    public function indexAction()
    {
        //$pageService = $this->getFacebookPageService();

        //$service->
        //$pageService->setPageid(self::PageID);
        //$events = $pageService->fetchEvents();
        //$posts = $pageService->fetchPosts();
        //$albums = $pageService->fetchAlbums();
        //$likes = $pageService->fetchGraphNode($pageService->getPageid(), null, null,array("fields"=>"fan_count"));
        //var_dump($likes);

        //$page = $pageService->fetchPage();

        //$someThink = $pageService->get("126843197387038/?fields=albums.limit(5){name, photos.limit(2){name, picture, tags.limit(2)}},posts.limit(5)")->getGraphNode();


        //return new ViewModel(array("events" => $events, "page" => $page, "posts" => $posts,  "albums" => $albums));
    }

    public function widgetsAction(){

    }
}

