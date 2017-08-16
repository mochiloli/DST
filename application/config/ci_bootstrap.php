<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$config['ci_bootstrap'] = array(
    // Site name
    'site_name' => 'CI Bootstrap 3',
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
            'assets/js/jquery.js',
			'assets/js/jquery.dotdotdot.min.js',
			'assets/js/lightGallery/js/lightgallery.min.js',
			'assets/js/lightGallery/js/lg-thumbnail.min.js',
			'assets/js/lightGallery/js/lg-fullscreen.min.js',
			'assets/js/bootstrap.min.js',
			'assets/js/global.js',
			'assets/sweetalert-master/dist/sweetalert.min.js'
        ),
    ),
    // Default stylesheets to embed at page head
    'stylesheets' => array(
        'screen' => array(
			'assets/css/bootstrap.min.css',
			'assets/css/landing-page.css',
			'assets/font-awesome/css/font-awesome.min.css',
			'assets/css/global.css',
			'https://fonts.googleapis.com/css?family=Kanit:300,500|Lato:300,400,700,300italic,400italic,700italic|PT+Serif:400i',
			'assets/sweetalert-master/dist/sweetalert.css',
			'assets/css/style.css'
        )
    ),
    // Default CSS class for <body> tag
    'body_class' => '',
    // Multilingual settings
  
    // Google Analytics User ID
    'ga_id' => '',
    // Menu items
    'menu' => array(
        'home' => array(
            'name' => 'Home',
            'url' => '',
        ),
    ),
    // Login page
    'login_url' => '',
    // Restricted pages
    'page_auth' => array(
    ),
    // Email config
    'email' => array(
        'from_email' => '',
        'from_name' => '',
        'subject_prefix' => '',
        // Mailgun HTTP API
        'mailgun_api' => array(
            'domain' => '',
            'private_api_key' => ''
        ),
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
$config['sess_cookie_name'] = 'ci_session_frontend';
