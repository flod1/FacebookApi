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
use FbPage\Service\FacebookPage;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AlbumController extends AbstractActionController
{
    /**
     * @var FacebookPage
     */
    protected $facebookPageService;


    public function __construct(FacebookPage $facebookPageService)
    {
        $this->facebookPageService = $facebookPageService;
    }

    public function indexAction()
    {
        //$pageService = $this->getFacebookPageService();

        $albums = $this->facebookPageService->fetchAlbums();

        return new ViewModel(array("items"=>$albums,"detailRoute"=>"fbpage_album","headline"=>"Albums"));
    }

    public function detailAction()
    {
        $albumid = $this->plugin('params')->fromRoute('id');

        $album = $this->facebookPageService->fetchAlbum($albumid);
        $photos = $this->facebookPageService->fetchPhotosByAlbum($albumid);

        return new ViewModel(array("item"=>$album,'items'=>$photos,"headline"=>"Album | ".$album->getName()));
    }
}
