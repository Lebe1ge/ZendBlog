<?php
return array(
    'router' => array(
        'routes' => array(
            'Blog' => array(
                'type'    => 'literal',
                'options' => array(
                    'route'    => '/blog',
                    'defaults' => array(
                        'controller'    => 'Blog-List',
                        'action'        => 'index',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Blog-List' => 'Blog\Controller\IndexController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Blog' => __DIR__ . '/../view',
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
