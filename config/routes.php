<?php

return array(
    'admin/deleteuser/([0-9]+)' => 'admin/deleteuser/$1',
    'admin/edituser/([0-9]+)' => 'admin/edituser/$1',
    'admin/products' => 'admin/products',
    'admin/category' => 'admin/category',
    'admin/users' => 'admin/users',
    'admin' => 'admin/index',
    'news' => 'news/index',
    'cabinet' => 'cabinet/index',
    'logout' => 'user/logout',
    'login' => 'user/login',
    'register' => 'user/register',
    'product/([0-9]+)' => 'site/detail/$1',
    'catalog/([0-9]+)' => 'catalog/index/$1',
    '' => 'site/index',
);