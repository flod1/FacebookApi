<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace FbPage;

return array(
    'service_manager' => array(
        'factories' => array(
            'facebookfactory' => 'FbPage\Factory\Service\FacebookFactory',
        ),
    ),

    'controllers' => array(
        'invokables' => array(
            'dashboard_controller' => 'FbPage\Controller\IndexController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'fb-page' => __DIR__ . '/../view',
        ),
    ),
    'router' => array(
        'routes' => array(
            'fbpage_dashboard' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/dashboard',
                    'defaults' => array(
                        'controller' => 'dashboard_controller',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
);
