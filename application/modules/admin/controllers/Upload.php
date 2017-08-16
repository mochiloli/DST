<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of upload
 *
 * @author USER-PC05
 */
class upload extends Admin_Controller {

    //put your code here 
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function images() {
//        echo 'upload images';
        $this->render('upload/images');
    }

    public function upload_image($event = null) {
        if (!$this->input->post()) {
            echo "<pre>";
            print_r($_SERVER);
            echo "</pre>";
            echo "<pre>";
            print_r($this->input->post());
            echo "</pre>";
            echo "<pre>";
            print_r($_FILES);
            echo "</pre>";
            $field_name = "files";
            $path = "./assets/uploads/";
            $allowed_types = "png|jpg|jpeg";
            $img_name = $this->upload_file($field_name, $path, $allowed_types);
        }
        exit(0);
    }

    public function upload_images($event = null) {

        for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
            $_FILES['images']['name'] = $_FILES['files']['name'][$i];
            $_FILES['images']['type'] = $_FILES['files']['type'][$i];
            $_FILES['images']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
            $_FILES['images']['error'] = $_FILES['files']['error'][$i];
            $_FILES['images']['size'] = $_FILES['files']['size'][$i];
            $field_name = "images";
            $path = "./assets/uploads/";
            $allowed_types = "png|jpg|jpeg";
            $img_name = $this->upload_file($field_name, $path, $allowed_types);
        }
    }

    public function files() {
//        echo 'upload files';
        $this->render('upload/files');
    }


}
