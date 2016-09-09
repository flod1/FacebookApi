<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace FbPage\Factory\Controller;


use FbPage\Controller\AlbumController;
use Zend\Mvc\Controller\ControllerManager;

class AlbumControllerFactory extends AbstractControllerFactory
{
    /**
     * @param ControllerManager $controllerManager
     * @return AlbumController
     */
    public function __invoke(ControllerManager $controllerManager)
    {
        // inject it to the constructor of the controller
        return new AlbumController($this->getFacebookService($controllerManager));
    }
}
