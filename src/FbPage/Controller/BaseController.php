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
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BaseController extends AbstractActionController
{
    /**
     * @var \FbPage\Service\FacebookPage
     */
    protected $facebookpageService;

    /**
     * Getters/setters for DI stuff
     */

    /**
     * @return \FbPage\Service\FacebookPage
     */
    public function getFacebookPageService()
    {
        if (!$this->facebookpageService) {
            $this->facebookpageService = $this->serviceLocator->get('fbpage_facebookpage_service');
        }
        return $this->facebookpageService;
    }

    public function setFacebookPageService(\FbPage\Service\FacebookPage $facebookpageService)
    {
        $this->facebookpageService = $facebookpageService;
        return $this;
    }
}
