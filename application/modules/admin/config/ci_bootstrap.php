<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$config['ci_bootstrap'] = array(
    // Site name
    'site_name' => 'ดวงเศรษฐี',
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
            'assets/dist/admin/adminlte.min.js',
            'assets/dist/admin/lib.min.js',
            'assets/dist/admin/app.min.js',
            'assets/dist/frontend/datatables.min.js',
            'assets/js/all_head.js',
            'assets/jquery-ui-date/jquery-ui.min.js',
            'assets/ckeditor/ckeditor.js',
			'assets/sweetalert-master/dist/sweetalert.min.js'
        ),
        'foot' => array(
            'assets/js/all_foot.js',
        ),
    ),
    // Default stylesheets to embed at page head
  'stylesheets' => array(
        'screen' => array(
            'assets/dist/admin/adminlte.min.css',
            'assets/dist/admin/lib.min.css',
            'assets/dist/admin/app.min.css',
            'assets/dist/frontend/dataTables.min.css',
            'assets/dist/frontend/bootstrap.min.css',
            'assets/dist/frontend/dataTables.bootstrap.min.css',
            'assets/jquery-ui-date/jquery-ui.min.css',
            'assets/dist/frontend/main.css',
			'assets/sweetalert-master/dist/sweetalert.css',
			'assets/css/style.css'
        ),
      'print' => array(
            'assets/dist/admin/adminlte.min.css',
            'assets/dist/admin/lib.min.css',
            'assets/dist/admin/app.min.css',
            'assets/dist/frontend/dataTables.min.css',
            'assets/dist/frontend/bootstrap.min.css',
            'assets/dist/frontend/dataTables.bootstrap.min.css',
            'assets/jquery-ui-date/jquery-ui.min.css',
            'assets/dist/frontend/main.css',
			'assets/sweetalert-master/dist/sweetalert.css',
			'assets/css/style.css'
        )

    ),
    // Default CSS class for <body> tag
    'body_class' => '',
    // Multilingual settings
    'languages' => array(
    ),
    // Login page
    'login_url' => 'admin/login',
    // Restricted pages
    'page_auth' => array(
        'user/create' => array('webmaster', 'admin', 'manager'),
        'user/group' => array('webmaster', 'admin', 'manager'),
        'panel' => array('webmaster'),
        'panel/admin_user' => array('webmaster'),
        'panel/admin_user_create' => array('webmaster'),
        'panel/admin_user_group' => array('webmaster'),
        'util' => array('webmaster'),
        'util/list_db' => array('webmaster'),
        'util/backup_db' => array('webmaster'),
        'util/restore_db' => array('webmaster'),
        'util/remove_db' => array('webmaster'),
        //Modify
        'upload' => array('webmaster'),
        'upload/images' => array('webmaster'),
        'upload/files' => array('webmaster'),
    ),
    // AdminLTE settings
    'adminlte' => array(
        'body_class' => array(
            'webmaster' => 'skin-green',
            'admin' => 'skin-green', //purple
            'manager' => 'skin-green', //black
            'staff' => 'skin-blue',
        )
    ),
    // Useful links to display at bottom of sidemenu
    'useful_links' => array(
    ),
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
