<?php
namespace FbPage\Factory\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use FbPage\View\Helper\AlbumWidget;

class AlbumWidgetFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // $sl is instanceof ViewHelperManager, we need the real SL though
        $rsl = $serviceLocator->getServiceLocator();

        return new AlbumWidget($rsl->get('fbpage_facebookpage_service'));
    }

}