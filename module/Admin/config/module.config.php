<?php
namespace Admin;

return array(
    'router' => array(
        'routes' => array(
            'zfcadmin' => array(
                'child_routes' => array(
                    'category' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/category[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => 'Admin\Controller\Category',
                                'action' => 'index'
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'action' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/category/:action[/:id]',
                                    'constraints' => array(
                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'id' => '[0-9]+',
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Admin\Controller\Category',
                                        'action' => 'index',
                                    )
                                ),
                                'may_terminate' => true
                            )
                        )
                    ),
                    'post' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/post[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => 'Admin\Controller\Post',
                                'action' => 'index'
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'action' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/post/:action[/:id]',
                                    'constraints' => array(
                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'id' => '[0-9]+',
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Admin\Controller\Post',
                                        'action' => 'index',
                                    )
                                ),
                                'may_terminate' => true
                            )
                        )
                    )
                )
            )
        )
    ),
    'navigation' => array(
        'admin' => array(
            // Profondeur 0
            'index' => array(
                'label' => 'Admin',
                'route' => 'zfcadmin',
                'pages' => array(
                    // Profondeur 1
                    'category' => array(
                        'label' => 'Category',
                        'route' => 'zfcadmin/category',
                        'pages' => array(
                            'new_category' => array(
                                'label' => 'New category',
                                'route' => 'zfcadmin/category/action',
                                'params' => array('action' => 'add')
                            ),
                            'edit_category' => array(
                                'label' => 'Edit category',
                                'route' => 'zfcadmin/category/action',
                                'params' => array('action' => 'edit')
                            ),
                            'delete_category' => array(
                                'label' => 'Edit category',
                                'route' => 'zfcadmin/category/action',
                                'params' => array('action' => 'delete')
                            )
                        )
                    ),
                    // Profondeur 1
                    'post' => array(
                        'label' => 'Job',
                        'route' => 'zfcadmin/post',
                        'pages' => array(
                            'new_post' => array(
                                'label' => 'New post',
                                'route' => 'zfcadmin/post/action',
                                'params' => array('action' => 'add')
                            ),
                            'edit_post' => array(
                                'label' => 'Edit post',
                                'route' => 'zfcadmin/post/action',
                                'params' => array('action' => 'edit')
                            ),
                            'delete_post' => array(
                                'label' => 'Edit post',
                                'route' => 'zfcadmin/post/action',
                                'params' => array('action' => 'delete')
                            )
                        )
                    ),
                )
            )
        )
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'Application\Service\PostService' => 'Application\Service\Factory\PostServiceFactory',
            'Application\Service\CategoryService' => 'Application\Service\Factory\CategoryServiceFactory'
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Admin\Controller\Category' => 'Admin\Controller\CategoryController',
            'Admin\Controller\Post' => 'Admin\Controller\PostController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/admin'           => __DIR__ . '/../view/layout/admin.phtml',
            'admin/index/index' => __DIR__ . '/../view/admin/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
            'paginator' => __DIR__ . '/../view/layout/adminPagination.phtml'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'Application_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../../Application/src/Application/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Application\Entity' =>'Application_driver'
                )
            )
        )
    ),
);