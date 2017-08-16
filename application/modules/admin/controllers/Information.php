
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_builder');
        $this->load->library('form_validation');
        $this->load->model('mo_information');
        $this->load->helper('url');
    }

    public function index($id = 1) {

        $this->mPageTitle = 'ความประทับใจ';

        $this->form_validation->set_rules('content', 'Content', 'required');
        if ($id != NULL || !empty($this->input->post('id'))) {
            $this->mPageTitle = 'แก้ไขความประทับใจ';
            if ($this->form_validation->run() == FALSE) {
                $this->mViewData['information'] = $this->mo_information->get_by_key($id);
            } else {
                $this->mo_information->id = $this->input->post('id');
                if ($_FILES["img"]['name']) {
                    $config['file_name'] = md5($_FILES["img"]['name']) . '.jpg';
                    $config['upload_path'] = 'assets/uploads/information/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '0';
                    $img = md5($_FILES["img"]['name']) . '.jpg';
                    $this->load->library("upload", $config);
                    $this->upload->initialize($config);
                    $this->upload->do_upload('img');
                    $this->mo_information->img = $img;
                } else {
                    $this->mo_information->img = $this->input->post('img_old');
                }
                $this->mo_information->topic = $this->input->post('topic');
                $this->mo_information->content = $this->input->post('content');
                $this->mo_information->updates();
                redirect('admin/information/');
            }
        }
        $this->render('information/v_information_create');
    }

//    public function create($id = NULL) {
//
//        $this->form_validation->set_rules('img', 'Img', 'required');
//        $this->form_validation->set_rules('content', 'Content', 'required');
//        if ($id != NULL || !empty($this->input->post('id'))) {
//            $this->mPageTitle = 'แก้ไขความประทับใจ';
//            if ($this->form_validation->run() == FALSE) {
//                $this->mViewData['information'] = $this->mo_information->get_by_key($id);
//            } else {
//                $this->mo_information->id = $this->input->post('id');
//                $this->mo_information->img = $this->input->post('img');
//                $this->mo_information->content = $this->input->post('content');
//                $this->mo_information->updates();
//                redirect('admin/information/');
//            }
//        } else {
//            $this->mPageTitle = 'เพิ่มความประทับใจ';
//            if ($this->form_validation->run() == FALSE) {
//                
//            } else {
//                $this->mo_information->img = $this->input->post('img');
//                $this->mo_information->content = $this->input->post('content');
//
//                $this->mo_information->inserts();
//                redirect('admin/information/');
//            }
//        }
//
//
//
//        $this->render('information/v_information_create');
//    }

    public function deletes($id = NULL) {
        if ($id != NULL) {
            $this->mo_information->id = $id;
            $this->mo_information->deletes();
        }
        redirect('admin/information/');
    }

}
