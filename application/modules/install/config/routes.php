<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// default controller for this module
$route['install'] = 'home';
$rount['install/(:any)/(:any)'] = 'home/$1/$2';
