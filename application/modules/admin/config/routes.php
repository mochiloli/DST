<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// default controller for this module
$route['admin'] = 'home';
$route['filemanager/(:any)'] = 'filemanager/$1';