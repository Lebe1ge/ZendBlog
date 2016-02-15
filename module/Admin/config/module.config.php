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
                    ),
                    'user' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/user[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => 'Admin\Controller\User',
                                'action' => 'index'
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'action' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/user/:action[/:id]',
                                    'constraints' => array(
                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'id' => '[0-9]+',
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Admin\Controller\User',
                                        'action' => 'index',
                                    )
                                ),
                                'may_terminate' => true
                            )
                        )
                    ),
                    'comment' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/comment[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => 'Admin\Controller\Comment',
                                'action' => 'index'
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'action' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/comment/:action[/:id]',
                                    'constraints' => array(
                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'id' => '[0-9]+',
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Admin\Controller\Comment',
                                        'action' => 'index',
                                    )
                                ),
                                'may_terminate' => true
                            )
                        )
                    ),
                    'tag' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/tag[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => 'Admin\Controller\Tag',
                                'action' => 'index'
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'action' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/tag/:action[/:id]',
                                    'constraints' => array(
                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'id' => '[0-9]+',
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Admin\Controller\Tag',
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
                            ),
                            'state_category' => array(
                                'label' => 'Edit category',
                                'route' => 'zfcadmin/state/action',
                                'params' => array('action' => 'state')
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
                                'label' => 'Delete post',
                                'route' => 'zfcadmin/post/action',
                                'params' => array('action' => 'delete')
                            ),
                            'state_post' => array(
                                'label' => 'State post',
                                'route' => 'zfcadmin/post/action',
                                'params' => array('action' => 'state')
                            )
                        )
                    ),
                    // Profondeur 1
                    'user' => array(
                        'label' => 'User',
                        'route' => 'zfcadmin/user',
                        'pages' => array(
                            'edit_user' => array(
                                'label' => 'Edit user',
                                'route' => 'zfcadmin/user/action',
                                'params' => array('action' => 'edit')
                            ),
                            'delete_user' => array(
                                'label' => 'Delete user',
                                'route' => 'zfcadmin/user/action',
                                'params' => array('action' => 'delete')
                            ),
                            'state_user' => array(
                                'label' => 'State user',
                                'route' => 'zfcadmin/user/action',
                                'params' => array('action' => 'state')
                            )
                        )
                    ),
                    // Profondeur 1
                    'comment' => array(
                        'label' => 'Comment',
                        'route' => 'zfcadmin/comment',
                        'pages' => array(
                            'delete_category' => array(
                                'label' => 'Edit comment',
                                'route' => 'zfcadmin/comment/action',
                                'params' => array('action' => 'delete')
                            ),
                            'state_comment' => array(
                                'label' => 'State comment',
                                'route' => 'zfcadmin/comment/action',
                                'params' => array('action' => 'state')
                            )
                        )
                    ),
                    // Profondeur 1
                    'tag' => array(
                        'label' => 'Tag',
                        'route' => 'zfcadmin/tag',
                        'pages' => array(
                            'new_tag' => array(
                                'label' => 'New tag',
                                'route' => 'zfcadmin/tag/action',
                                'params' => array('action' => 'add')
                            ),
                            'edit_tag' => array(
                                'label' => 'Edit tag',
                                'route' => 'zfcadmin/tag/action',
                                'params' => array('action' => 'edit')
                            ),
                            'delete_tag' => array(
                                'label' => 'Delete tag',
                                'route' => 'zfcadmin/tag/action',
                                'params' => array('action' => 'delete')
                            ),
                            'state_tag' => array(
                                'label' => 'State tag',
                                'route' => 'zfcadmin/tag/action',
                                'params' => array('action' => 'state')
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
            'Application\Service\CategoryService' => 'Application\Service\Factory\CategoryServiceFactory',
            'Application\Service\UserService' => 'Application\Service\Factory\UserServiceFactory',
            'Application\Service\CommentService' => 'Application\Service\Factory\CommentServiceFactory',
            'Application\Service\TagService' => 'Application\Service\Factory\TagServiceFactory'
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Admin\Controller\Category' => 'Admin\Controller\CategoryController',
            'Admin\Controller\Post' => 'Admin\Controller\PostController',
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