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

class EventController extends AbstractController
{
    public function indexAction()
    {
        $pageService = $this->getFacebookPageService();

        $events = $pageService->fetchEvents();

        return new ViewModel(array("items"=>$events,"detailRoute"=>"fbpage_event"));
    }

    public function detailAction()
    {
        $eventid = $this->plugin('params')->fromRoute('id');

        $pageService = $this->getFacebookPageService();

        $event = $pageService->fetchEvent($eventid);

        return new ViewModel(array("item"=>$event));
    }
}
