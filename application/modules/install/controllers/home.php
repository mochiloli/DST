<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of install
 *
 * @author USER-PC05
 */
class home extends MY_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->helper('file');
    }

    public function index() {
        $this->mPageTitle = "Install Panel.";
        $this->render('home', 'install');
    }

    public function chk_class($class) {
        $dir = './application/modules/admin/controllers';
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    echo "filename:" . $file . "<br>";
                }
                closedir($dh);
            }
        }
    }

}
