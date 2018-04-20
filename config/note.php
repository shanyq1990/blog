<?php
/**
 * Created by PhpStorm.
 * User: shanyq
 * Date: 2017/10/14
 * Time: 20:11
 */

return [
    'permissions'=>[
        'admin_user create',
        'admin_user index',
        'admin_user delete',
        'admin_user permission',
        'admin_user role',

        'admin_role create',
        'admin_role index',
        'admin_role delete',
        'admin_role user',
        'admin_role permission',


        'documentcate create',
        'documentcate edit',
        'documentcate delete',
        'documentcate index',


        'document create',
        'document edit',
        'document delete',
        'document index',

        'user delete',
    ],


    'roles'=>[
        'administrator',
        'writer',
    ]
];