<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------------
  | CI Bootstrap 3 Configuration
  | -------------------------------------------------------------------------
  | This file lets you define default values to be passed into views
  | when calling MY_Controller's render() function.
  |
  | See example and detailed explanation from:
  | 	/application/config/ci_bootstrap_example.php
 */

$config['ci_bootstrap'] = array(
    // Site name
    'site_name' => 'Install Panel',
    // Default page title prefix
    'page_title_prefix' => '',
    // Default page title
    'page_title' => '',
    // Default meta data
    'meta_data' => array(
        'author' => '',
        'description' => '',
        'keywords' => ''
    ),
    // Default scripts to embed at page head or end
   'scripts' => array(
        'head' => array(
            'assets/dist/frontend/jquery.min.js'
        ),
        'foot' => array(
            'assets/dist/frontend/lib.min.js',
            'assets/dist/frontend/datatables.min.js'
        ),
    ),
    // Default stylesheets to embed at page head
    'stylesheets' => array(
        'screen' => array(
            'assets/css/bootstrap.min.css',
            'assets/css/datatables.min.css',
            "assets/css/install.css?v=". md5(date('ymdhis'))
        )
    ),
    // Default CSS class for <body> tag
    'body_class' => '',
    // Menu items
    'menu' => array(
//        'home' => array(
//            'name' => 'Home',
//            'url' => '',
//            'icon' => 'fa fa-home',
//        ),
//        'user' => array(
//            'name' => 'Users',
//            'url' => 'user',
//            'icon' => 'fa fa-users',
//            'children' => array(
//                'List' => 'user',
//                'Create' => 'user/create',
//                'User Groups' => 'user/group',
//            )
//        ),
//        'panel' => array(
//            'name' => 'Admin Panel',
//            'url' => 'panel',
//            'icon' => 'fa fa-cog',
//            'children' => array(
//                'Admin Users' => 'panel/admin_user',
//                'Create Admin User' => 'panel/admin_user_create',
//                'Admin User Groups' => 'panel/admin_user_group',
//            )
//        ),
//        'upload' => array(
//            'name' => 'Upload Files',
//            'url' => 'upload/index',
//            'icon' => 'fa fa-folder',
//            'children' => array(
//                'Upload Images' => 'upload/images',
//                'Upload Files' => 'upload/files'
//            )
//        ),
//        'page' => array(
//            'name' => 'Content Management',
//            'url' => 'page/index',
//            'icon' => 'fa fa-database',
//        ),
//        'util' => array(
//            'name' => 'Utilities',
//            'url' => 'util',
//            'icon' => 'fa fa-cogs',
//            'children' => array(
//                'Database Versions' => 'util/list_db',
//            )
//        ),
//        'logout' => array(
//            'name' => 'Sign Out',
//            'url' => 'panel/logout',
//            'icon' => 'fa fa-sign-out',
//        )
    ),
    // Login page
    'login_url' => 'install',
    // Useful links to display at bottom of sidemenu
//    'useful_links' => array(
//        array(
//            'auth' => array('webmaster', 'admin', 'manager', 'staff'),
//            'name' => 'Frontend Website',
//            'url' => '',
//            'target' => '_blank',
//            'color' => 'text-aqua'
//        ),
//        array(
//            'auth' => array('webmaster', 'admin'),
//            'name' => 'API Site',
//            'url' => 'api',
//            'target' => '_blank',
//            'color' => 'text-orange'
//        ),
//        array(
//            'auth' => array('webmaster', 'admin', 'manager', 'staff'),
//            'name' => 'Github Repo',
//            'url' => CI_BOOTSTRAP_REPO,
//            'target' => '_blank',
//            'color' => 'text-green'
//        ),
//    ),
    // Debug tools
    'debug' => array(
        'view_data' => FALSE,
        'profiler' => FALSE
    ),
);

/*
  | -------------------------------------------------------------------------
  | Override values from /application/config/config.php
  | -------------------------------------------------------------------------
 */
$config['sess_cookie_name'] = 'ci_session_admin';
