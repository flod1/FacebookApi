<?php
namespace FbPage\Factory\View\Helper;

use FbPage\View\Helper\EventWidget;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class EventWidgetFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // $sl is instanceof ViewHelperManager, we need the real SL though
        $rsl = $serviceLocator->getServiceLocator();

        return new EventWidget($rsl->get('fbpage_facebookpage_service'));
    }

}