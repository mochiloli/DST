
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Knowledge extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_builder');
        $this->load->library('form_validation');
        $this->load->model('mo_knowledge');
        $this->load->helper('url');
        $this->load->helper('editor');
    }

    public function index() {

        $this->mPageTitle = 'เกร็ดความรู้';
        $this->mViewData['original'] = $this->mo_knowledge->get_all();
        $this->render('knowledge/v_knowledge');
    }

    public function create($id = NULL) {

        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('topic', 'Topic', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($id != NULL || !empty($this->input->post('id'))) {
            $this->mPageTitle = 'แก้ไขเกร็ดความรู้';
            if ($this->form_validation->run() == FALSE) {
                $this->mViewData['knowledge'] = $this->mo_knowledge->get_by_key($id);
            } else {
                $this->mo_knowledge->id = $this->input->post('id');
                $this->mo_knowledge->type = $this->input->post('type');

                if ($this->input->post('type') == 'ภาพถ่าย') {
                    if ($_FILES["img"]['name']) {
                        $config['file_name'] = md5($_FILES["img"]['name']) . '.jpg';
                        $config['upload_path'] = 'assets/uploads/knowledge/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = '0';
                        $img = md5($_FILES["img"]['name']) . '.jpg';
                        $this->load->library("upload", $config);
                        $this->upload->initialize($config);
                        $this->upload->do_upload('img');
                        $this->mo_knowledge->img = $img;
                    } else {
                        $this->mo_knowledge->img = $this->input->post('img_old');
                    }
                } else if ($this->input->post('type') == 'วีดีโอyoutube') {
                    $this->mo_knowledge->img = $this->input->post('img');
                }

                $this->mo_knowledge->topic = $this->input->post('topic');
                $this->mo_knowledge->date = $this->input->post('date');
                $this->mo_knowledge->content = $this->input->post('content');
                $this->mo_knowledge->title_tag = $this->input->post('title_tag');
                $this->mo_knowledge->meta_description = $this->input->post('meta_description');
                $this->mo_knowledge->meta_keyword = $this->input->post('meta_keyword');
                $this->mo_knowledge->og_url = $this->input->post('og_url');
                $this->mo_knowledge->og_type = $this->input->post('og_type');
                $this->mo_knowledge->og_title = $this->input->post('og_title');
                $this->mo_knowledge->og_description = $this->input->post('og_description');
//                $this->mo_knowledge->og_image = $this->input->post('og_image');
                
                if ($_FILES["og_image"]['name']) {
                    $config['file_name'] = md5($_FILES["og_image"]['name']) . '.jpg';
                    $config['upload_path'] = 'assets/uploads/knowledge/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '0';
                    $og_image = md5($_FILES["og_image"]['name']) . '.jpg';
                    $this->load->library("upload", $config);
                    $this->upload->initialize($config);
                    $this->upload->do_upload('og_image');
                    $this->mo_knowledge->og_image = $og_image;
                } else {
                    $this->mo_knowledge->og_image = $this->input->post('og_image_old');
                }
                
                $this->mo_knowledge->updates();
                redirect('admin/knowledge/');
            }
        } else {
            $this->mPageTitle = 'เพิ่มเกร็ดความรู้';
            if ($this->form_validation->run() == FALSE) {
                
            } else {

                $this->mo_knowledge->type = $this->input->post('type');

                if ($this->input->post('type') == 'ภาพถ่าย') {
                    $config['file_name'] = md5($_FILES["img"]['name']) . '.jpg';
                    $config['upload_path'] = 'assets/uploads/knowledge/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '0';
                    $img = md5($_FILES["img"]['name']) . '.jpg';
                    $this->load->library("upload", $config);
                    $this->upload->initialize($config);
                    $this->upload->do_upload('img');
                    $this->mo_knowledge->img = $img;
                } else if ($this->input->post('type') == 'วีดีโอyoutube') {
                    $this->mo_knowledge->img = $this->input->post('img');
                }

                $this->mo_knowledge->topic = $this->input->post('topic');
                $this->mo_knowledge->date = $this->input->post('date');
                $this->mo_knowledge->content = $this->input->post('content');
                $this->mo_knowledge->title_tag = $this->input->post('title_tag');
                $this->mo_knowledge->meta_description = $this->input->post('meta_description');
                $this->mo_knowledge->meta_keyword = $this->input->post('meta_keyword');
                $this->mo_knowledge->og_url = $this->input->post('og_url');
                $this->mo_knowledge->og_type = $this->input->post('og_type');
                $this->mo_knowledge->og_title = $this->input->post('og_title');
                $this->mo_knowledge->og_description = $this->input->post('og_description');
//                $this->mo_knowledge->og_image = $this->input->post('og_image');
                $config['file_name'] = md5($_FILES["og_image"]['name']) . '.jpg';
                $config['upload_path'] = 'assets/uploads/knowledge/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '0';
                $og_image = md5($_FILES["og_image"]['name']) . '.jpg';
                $this->load->library("upload", $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('og_image');
                $this->mo_knowledge->og_image = $og_image;
                $this->mo_knowledge->inserts();
                redirect('admin/knowledge/');
            }
        }



        $this->render('knowledge/v_knowledge_create');
    }

    public function deletes($id = NULL) {
        if ($id != NULL) {
            $this->mo_knowledge->id = $id;
            $this->mo_knowledge->deletes();
        }
        redirect('admin/knowledge/');
    }

}
