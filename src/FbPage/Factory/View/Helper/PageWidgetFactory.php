<?php
namespace FbPage\Factory\View\Helper;

use FbPage\View\Helper\PageWidget;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PageWidgetFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // $sl is instanceof ViewHelperManager, we need the real SL though
        $rsl = $serviceLocator->getServiceLocator();

        return new PageWidget($rsl->get('fbpage_facebookpage_service'));
    }

}