<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace FbBasic\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ExampleController extends AbstractActionController
{
    public function widgetsAction(){

        $examples = array();

        $viewHelperManager = $this->getServiceLocator()->get('ViewHelperManager');
        $pageWidget = $viewHelperManager->get('pageWidget');
        $graphWidget = $viewHelperManager->get('graphWidget');

        /**
         * @var $pageWidget \FbPage\View\Helper\PageWidget
         * @var $graphWidget \FbBasic\View\Helper\GraphWidget
         */

        $pageid = $this->params()->fromQuery('pageid');

        if($pageid){
            $pageWidget->setPageID($pageid);
        }


        $example['title'] = "Event";
        $example['describtion'] = 'a Facebook Event';
        $example['code'] = 'echo $graphWidget->fetchEvent($id,$fields="*")';
        $example['sample'] = $graphWidget->fetchEvent("946012625473779","*")->render();

        $examples[] = $example;

        $example['title'] = "Album";
        $example['describtion'] = 'a Facebook Album';
        $example['code'] = 'echo $graphWidget->fetchAlbum($id,$fields="*")';
        $example['sample'] = $graphWidget->fetchAlbum("971155009622515","*")->render();

        $examples[] = $example;

        $example['title'] = "Page";
        $example['describtion'] = 'a Facebook Page';
        $example['code'] = 'echo $graphWidget->fetchPage($id,$fields="*")';
        $example['sample'] = $graphWidget->fetchPage("301188883412509","*")->render();

        $examples[] = $example;

        $example['title'] = "Posts";
        $example['describtion'] = 'Posts by a Page';
        $example['code'] = 'echo $pageWidget->fetchAllPosts($fields=null,$limit=null)';
        $example['sample'] = $pageWidget->fetchAllPosts()->render();

        $examples[] = $example;

        $example['title'] = "Albums";
        $example['describtion'] = 'Albums by a Page';
        $example['code'] = 'echo $pageWidget->fetchAllAlbums($fields=null,$limit=null)';
        $example['sample'] = $pageWidget->fetchAllAlbums()->render();

        $examples[] = $example;

        $example['title'] = "Events";
        $example['describtion'] = 'Events by a Page';
        $example['code'] = 'echo $pageWidget->fetchAllEvents($fields=null,$limit=null)';
        $example['sample'] = $pageWidget->fetchAlLEvents("*")->render();

        $examples[] = $example;

        $example['title'] = "Milestones";
        $example['describtion'] = 'Milestones by a Page';
        $example['code'] = 'echo $pageWidget->fetchAllMilestones($fields=null,$limit=null)';
        $example['sample'] = $pageWidget->fetchAllMilestones()->render();

        $examples[] = $example;

        //var_dump($examples);
        return new ViewModel(array("examples"=>$examples));
    }
}

