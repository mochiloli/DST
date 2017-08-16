
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Picture_slide extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_builder');
        $this->load->library('form_validation');
        $this->load->model('mo_picture_slide');
        $this->load->helper('url');
    }

    public function index() {

        $this->mPageTitle = 'รูปสไลด์';
        $this->mViewData['original'] = $this->mo_picture_slide->get_all();
        $this->render('picture_slide/v_picture_slide');
    }

    public function create($id = NULL) {

        $this->form_validation->set_rules('ka', 'Ka', 'required');
        if ($id != NULL || !empty($this->input->post('id'))) {
            $this->mPageTitle = 'แก้ไขรูปสไลด์';
            if ($this->form_validation->run() == FALSE) {
                $this->mViewData['picture_slide'] = $this->mo_picture_slide->get_by_key($id);
            } else {
                $this->mo_picture_slide->id = $this->input->post('id');
                if ($_FILES["img"]['name']) {
                    $config['file_name'] = md5($_FILES["img"]['name']).'.jpg';
                    $config['upload_path'] = 'assets/uploads/picture_slide/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '0';
                    $img = md5($_FILES["img"]['name']).'.jpg';
                    $this->load->library("upload", $config);
                    $this->upload->initialize($config);
                    $this->upload->do_upload('img');
                    $this->mo_picture_slide->img = $img;
                } else {
                    $this->mo_picture_slide->img = $this->input->post('img_old');
                }
                $this->mo_picture_slide->updates();
                redirect('admin/picture_slide/');
            }
        } else {
            $this->mPageTitle = 'เพิ่มรูปสไลด์';
            if ($this->form_validation->run() == FALSE) {
                
            } else {
                $config['file_name'] = md5($_FILES["img"]['name']).'.jpg';
                $config['upload_path'] = 'assets/uploads/picture_slide/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '0';
                $img = md5($_FILES["img"]['name']).'.jpg';
                $this->load->library("upload", $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('img');
                $this->mo_picture_slide->img = $img;
                $this->mo_picture_slide->ka = $this->input->post('ka');
                $this->mo_picture_slide->inserts();
                redirect('admin/picture_slide/');
            }
        }



        $this->render('picture_slide/v_picture_slide_create');
    }

    public function deletes($id = NULL) {
        if ($id != NULL) {
            $this->mo_picture_slide->id = $id;
            $this->mo_picture_slide->deletes();
        }
        redirect('admin/picture_slide/');
    }

}
