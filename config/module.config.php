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
    //Translation
    'translator' => array(
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'service_manager' => array(
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
        //'factories' => array(
        //    'facebookfactory' => 'FbPage\Factory\Service\FacebookFactory',
        //),
    ),
    'controllers' => array(
        'invokables' => array(
            'dashboard_controller' => 'FbPage\Controller\IndexController',
            'event_controller' => 'FbPage\Controller\EventController',
            'post_controller' => 'FbPage\Controller\PostController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'fb-page' => __DIR__ . '/../view',
        ),
        'template_map' => array(
            'fb-page/event/index' => __DIR__ . '/../view/fb-page/default/table.phtml',
            'fb-page/event/detail' => __DIR__ . '/../view/fb-page/default/detail.phtml',
            'fb-page/post/index' => __DIR__ . '/../view/fb-page/default/table.phtml',
            'fb-page/post/detail' => __DIR__ . '/../view/fb-page/default/detail.phtml',
        ),
    ),
    'view_helpers' => array(
        'invokables'=> array(
            'graphelper' => 'FbBasic\View\Helper\Graphhelper',
            'coverphotohelper' => 'FbBasic\View\Helper\Coverphotohelper'

        )
    ),
    'router' => array(
        'router_class' => 'Zend\Mvc\Router\Http\TranslatorAwareTreeRouteStack',

        'routes' => array(
            'fbpage_dashboard' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/dashboard',
                    'defaults' => array(
                        'controller' => 'dashboard_controller',
                        'action'     => 'index',
                    ),
                ),
            ),
            'fbpage_events' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/{events}',
                    'defaults' => array(
                        'controller' => 'event_controller',
                        'action'     => 'index',
                    ),
                ),
            ),
            'fbpage_event' => array(
                'type' => 'Regex',
                'options' => array(
                    'regex' => '/{event}/(?<id>[A-F0-9]+)',
                    'defaults' => array(
                        'controller' => 'event_controller',
                        'action'     => 'detail',
                    ),
                    'spec' => '/event/%id%',
                ),
            ),
            'fbpage_posts' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/{posts}',
                    'defaults' => array(
                        'controller' => 'post_controller',
                        'action'     => 'index',
                    ),
                ),
            ),
            'fbpage_post' => array(
                'type' => 'Regex',
                'options' => array(
                    'regex' => '/{post}/(?<id>[A-F_0-9]+)',
                    'defaults' => array(
                        'controller' => 'post_controller',
                        'action'     => 'detail',
                    ),
                    'spec' => '/post/%id%',
                ),
            ),
        ),
    ),
);
