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
        'factories' => array(
            //Services
            'fbbasic_graph_service'   => 'FbBasic\Factory\Service\FacebookBaseFactory',
            //'fbpage_facebook_service'       => 'FbPage\Factory\Service\FacebookFactory',
            'fbpage_facebookpage_service'   => 'FbPage\Factory\Service\FacebookPageFactory',
            //Configurations
            'facebook_module_options'       => 'FbPage\Factory\Options\FacebookOptions',
            'facebook_page_options'         => 'FbPage\Factory\Options\FacebookPageOptions'
        )
    ),
    'controllers' => array(
        'abstract_factories' => array(
            'FbPage\Factory\Controller\CommonControllerFactory'
        ),
        'factories' => array(
            'album_controller' => 'FbPage\Factory\Controller\AlbumControllerFactory'
        ),
        'invokables' => array(
            'dashboard_controller' => 'FbPage\Controller\IndexController',
            'event_controller' => 'FbPage\Controller\EventController',
            'post_controller' => 'FbPage\Controller\PostController',
            //'album_controller' => 'FbPage\Controller\AlbumController',
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
            'fb-page/album/index' => __DIR__ . '/../view/fb-page/default/table.phtml',
            //'fb-page/album/detail' => __DIR__ . '/../view/fb-page/default/detail.phtml',
        ),
    ),
    'view_helpers' => array(
        'invokables'=> array(
            'graphcoverphoto' => 'FbBasic\View\Helper\GraphCoverPhotoHelper',
            'graphphoto' => 'FbBasic\View\Helper\GraphPhotoHelper',
            'graphpicture' => 'FbBasic\View\Helper\GraphPictureHelper',
            'graphpage' => 'FbBasic\View\Helper\GraphPageHelper',
            'graphlocation' => 'FbBasic\View\Helper\GraphLocationHelper',
            'graphnode' => 'FbBasic\View\Helper\GraphNodeHelper',
            'graphedge' => 'FbBasic\View\Helper\GraphEdgeHelper',
            'graphdump' => 'FbBasic\View\Helper\GraphDumpHelper',
            'graphattachment' => 'FbBasic\View\Helper\GraphAttachmentHelper',
            'graphimage' => 'FbBasic\View\Helper\GraphImageHelper',
            'graphimages' => 'FbBasic\View\Helper\GraphImagesHelper',
            'graphpagestartinfo' => 'FbBasic\View\Helper\GraphPageStartInfoHelper',
            'graphfield' => 'FbBasic\View\Helper\GraphFieldHelper'

        ),
        'factories' => [
            'graphWidget' => 'FbBasic\Factory\View\Helper\GraphWidgetFactory',
            'pageWidget' => 'FbPage\Factory\View\Helper\PageWidgetFactory',
            //'albumWidget' => 'FbPage\Factory\View\Helper\AlbumWidgetFactory',
            //'eventWidget' => 'FbPage\Factory\View\Helper\EventWidgetFactory'
        ]
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
                'type' => 'Segment',
                'options' => array(
                    'route' => '/{event}/:id',
                    'defaults' => array(
                        'controller' => 'event_controller',
                        'action'     => 'detail',
                    )
                ),
            ),
            'fbpage_posts' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/{posts}',
                    'defaults' => array(
                        'controller' => 'post_controller',
                        'action'     => 'index',
                    ),
                ),
            ),
            'fbpage_post' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/{post}/:id',
                    'defaults' => array(
                        'controller' => 'post_controller',
                        'action'     => 'detail',
                    )
                ),
            ),
            'fbpage_albums' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/{albums}',
                    'defaults' => array(
                        'controller' => 'album_controller',
                        'action'     => 'index',
                    ),
                ),
            ),
            'fbpage_album' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/{album}/:id',
                    'defaults' => array(
                        'controller' => 'album_controller',
                        'action'     => 'detail',
                    )
                ),
            ),
        ),
    ),

);
