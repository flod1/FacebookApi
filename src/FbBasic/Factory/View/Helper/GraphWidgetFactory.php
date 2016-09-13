<?php
namespace FbBasic\Factory\View\Helper;

use FbBasic\View\Helper\GraphWidget;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class GraphWidgetFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // $sl is instanceof ViewHelperManager, we need the real SL though
        $rsl = $serviceLocator->getServiceLocator();

        return new GraphWidget($rsl->get('fbbasic_graph_service'));
    }

}