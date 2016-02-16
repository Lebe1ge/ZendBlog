<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Application;

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Post',
                        'action'     => 'list',
                    ),
                ),
            ),
            'list_post_page' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/post[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\Post',
                        'action'     => 'list',
                    ),
                ),
            ),
            'list_category_page' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/category/:slug[/page/[:page]]',
                    'constraints' => array(
                        'page'   => '[0-9]+',
                        'slug'   => '[a-zA-Z][a-zA-Z_-]*'
                    ),
                    'defaults' => array(
                        'module'     => 'Application',
                        'controller' => 'Application\Controller\Category',
                        'action'     => 'list',
                        'page'       => 1
                    ),
                ),
            ),
            'add_post' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/add/post[/]',
                    'defaults' => array(
                        'module'     => 'Application',
                        'controller' => 'Application\Controller\Post',
                        'action'     => 'add',
                    ),
                ),
            ),
            'add_category' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/add/category[/]',
                    'defaults' => array(
                        'module'     => 'Application',
                        'controller' => 'Application\Controller\Category',
                        'action'     => 'add',
                    ),
                ),
            ),
//            'zfcuser' => array(
//                'type' => 'Zend\Mvc\Router\Http\Literal',
//                'options' => array(
//                    'route' => '', // the route is void isntead of default 'user'
//                ),
//            ),
//            'zfcuser-login' => array(
//                'type' => 'Literal',
//                'options' => array(
//                    'route' => '/login',
//                    'defaults' => array(
//                        'controller' => 'zfcuser',
//                        'action' => 'login',
//                    ),
//                ),
//            ),
//            'zfcuser-authenticate' => array(
//                'type' => 'Literal',
//                'options' => array(
//                    'route' => '/authenticate',
//                    'defaults' => array(
//                        'controller' => 'zfcuser',
//                        'action' => 'authenticate',
//                    ),
//                ),
//            ),
//            'zfcuser-logout' => array(
//                'type' => 'Literal',
//                'options' => array(
//                    'route' => '/logout',
//                    'defaults' => array(
//                        'controller' => 'zfcuser',
//                        'action'     => 'logout',
//                    ),
//                ),
//            ),
//            'zfcuser-register' => array(
//                'type' => 'Literal',
//                'options' => array(
//                    'route' => '/register',
//                    'defaults' => array(
//                        'controller' => 'zfcuser',
//                        'action'     => 'register',
//                    ),
//                ),
//            ),
//            'zfcuser-changepassword' => array(
//                'type' => 'Literal',
//                'options' => array(
//                    'route' => '/change-password',
//                    'defaults' => array(
//                        'controller' => 'zfcuser',
//                        'action'     => 'changepassword',
//                    ),
//                ),
//            ),
//            'zfcuser-changeemail' => array(
//                'type' => 'Literal',
//                'options' => array(
//                    'route' => '/change-email',
//                    'defaults' => array(
//                        'controller' => 'zfcuser',
//                        'action' => 'changeemail',
//                    ),
//                ),
//            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id'         => '[0-9]+'
                            ),
                            'defaults' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => 'index'
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'Application\Service\PostService' => 'Application\Service\Factory\PostServiceFactory',
            'Application\Service\CategoryService' => 'Application\Service\Factory\CategoryServiceFactory',
            'Application\Service\UserService' => 'Application\Service\Factory\UserServiceFactory',
            'Application\Service\CommentService' => 'Application\Service\Factory\CommentServiceFactory',
            'Application\Service\TagService' => 'Application\Service\Factory\TagServiceFactory'
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Post' => 'Application\Controller\PostController',
            'Application\Controller\Category' => 'Application\Controller\CategoryController',
            'Admin\Controller\User' => 'Admin\Controller\UserController',
            'Admin\Controller\Comment' => 'Admin\Controller\CommentController',
            'Admin\Controller\Tag' => 'Admin\Controller\TagController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/blog.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),
);
