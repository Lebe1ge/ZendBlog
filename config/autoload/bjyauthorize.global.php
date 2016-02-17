<?php
/**
 * BjyAuthorize Module (https://github.com/bjyoungblood/BjyAuthorize)
 *
 * @link https://github.com/bjyoungblood/BjyAuthorize for the canonical source repository
 * @license http://framework.zend.com/license/new-bsd New BSD License
 */
return array(
    'bjyauthorize' => array(
        // default role for unauthenticated users
        'default_role' => 'guest',

        // identity provider service name
        'identity_provider' => 'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider',

        // Role providers to be used to load all available roles into Zend\Permissions\Acl\Acl
        // Keys are the provider service names, values are the options to be passed to the provider
        'role_providers' => array(
            'BjyAuthorize\Provider\Role\ObjectRepositoryProvider' => array(
                'table' => 'user_role',
                'role_id_field' => 'role_id',
                'parent_role_field' => 'parent'
            )
        ),

        // Guard listeners to be attached to the application event manager
        'guards' => array(
            'BjyAuthorize\Guard\Route' => array(
                array('route' => 'zfcadmin', 'roles' => array('admin')),
                array('route' => 'zfcadmin/category', 'roles' => array('admin')),
                array('route' => 'zfcadmin/post', 'roles' => array('admin')),
                array('route' => 'zfcadmin/user', 'roles' => array('admin')),
                array('route' => 'zfcadmin/comment', 'roles' => array('admin')),
                array('route' => 'zfcadmin/tag', 'roles' => array('admin')),
                array('route' => 'zfcuser_logout', 'roles' => array('guest','user', 'admin')),
                array('route' => 'login', 'roles' => array('guest', 'user', 'admin')),
                array('route' => 'home', 'roles' => array('guest', 'user', 'admin')),
                array('route' => 'list_post_page', 'roles' => array('guest', 'user', 'admin')),
                array('route' => 'add_comment', 'roles' => array('guest', 'user', 'admin')),
                array('route' => 'add_category', 'roles' => array('guest', 'user', 'admin')),
                array('route' => 'list_category_page', 'roles' => array('guest', 'user', 'admin')),
                array('route' => 'zfcuser_login', 'roles' => array('guest', 'user', 'admin')),
                array('route' => 'zfcuser/register', 'roles' => array('guest', 'user', 'admin')),
                array('route' => 'zfcuser_authenticate', 'roles' => array('guest', 'user', 'admin')),
                array('route' => 'zfcuser_register', 'roles' => array('guest', 'user', 'admin'))
            )
        )
    )
);