
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main_info extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_builder');
        $this->load->library('form_validation');
        $this->load->model('mo_main_info');
        $this->load->helper('url');
    }

    public function index($id = 1) {

        $this->mPageTitle = 'ข้อมูลหลัก';

        $this->form_validation->set_rules('url_facebook', 'Url_facebook', 'required');
        $this->form_validation->set_rules('url_twitter', 'Url_twitter', 'required');
        $this->form_validation->set_rules('url_instagram', 'Url_instagram', 'required');
        $this->form_validation->set_rules('url_line', 'Url_line', 'required');
        $this->form_validation->set_rules('url_email', 'Url_email', 'required');
        $this->form_validation->set_rules('condition_course', 'Condition_course', 'required');

        if ($id != NULL || !empty($this->input->post('id'))) {
            $this->mPageTitle = 'แก้ไขข้อมูลหลัก';
            if ($this->form_validation->run() == FALSE) {
                $this->mViewData['main_info'] = $this->mo_main_info->get_by_key($id);
            } else {
                $this->mo_main_info->id = $this->input->post('id');
                if ($_FILES["img_logo"]['name']) {
                    $config['file_name'] = md5($_FILES["img"]['name']) . '.jpg';
                    $config['upload_path'] = 'assets/uploads/main_info/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '0';
                    $img_logo = md5($_FILES["img"]['name']) . '.jpg';
                    $this->load->library("upload", $config);
                    $this->upload->initialize($config);
                    $this->upload->do_upload('img_logo');
                    $this->mo_main_info->img_logo = $img_logo;
                } else {
                    $this->mo_main_info->img_logo = $this->input->post('img_logo_old');
                }
                $this->mo_main_info->content_under_logo = $this->input->post('content_under_logo');
                $this->mo_main_info->url_facebook = $this->input->post('url_facebook');
                $this->mo_main_info->url_twitter = $this->input->post('url_twitter');
                $this->mo_main_info->url_instagram = $this->input->post('url_instagram');
                $this->mo_main_info->url_line = $this->input->post('url_line');
                $this->mo_main_info->url_email = $this->input->post('url_email');
                $this->mo_main_info->condition_course = $this->input->post('condition_course');
                $this->mo_main_info->title_tag = $this->input->post('title_tag');
                $this->mo_main_info->meta_description = $this->input->post('meta_description');
                $this->mo_main_info->meta_keyword = $this->input->post('meta_keyword');
                $this->mo_main_info->meta_keyword = $this->input->post('meta_keyword');

                $this->mo_main_info->og_url = $this->input->post('og_url');
                $this->mo_main_info->og_type = $this->input->post('og_type');
                $this->mo_main_info->og_title = $this->input->post('og_title');
                $this->mo_main_info->og_description = $this->input->post('og_description');
//                $this->mo_main_info->og_image = $this->input->post('og_image');
                 if ($_FILES["og_image"]['name']) {
                    $config['file_name'] = md5($_FILES["og_image"]['name']) . '.jpg';
                    $config['upload_path'] = 'assets/uploads/main_info/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '0';
                    $og_image = md5($_FILES["og_image"]['name']) . '.jpg';
                    $this->load->library("upload", $config);
                    $this->upload->initialize($config);
                    $this->upload->do_upload('og_image');
                    $this->mo_main_info->og_image = $og_image;
                } else {
                    $this->mo_main_info->og_image = $this->input->post('og_image_old');
                }

                $this->mo_main_info->updates();
                redirect('admin/main_info/');
            }
        }

        $this->render('main_info/v_main_info_create');
    }

//    public function create($id = NULL) {
//
//        $this->form_validation->set_rules('img_logo', 'Img_logo', 'required');
//        $this->form_validation->set_rules('content_under_logo', 'Content_under_logo', 'required');
//        $this->form_validation->set_rules('url_facebook', 'Url_facebook', 'required');
//        $this->form_validation->set_rules('url_twitter', 'Url_twitter', 'required');
//        $this->form_validation->set_rules('url_instagram', 'Url_instagram', 'required');
//        $this->form_validation->set_rules('url_line', 'Url_line', 'required');
//        $this->form_validation->set_rules('url_email', 'Url_email', 'required');
//        if ($id != NULL || !empty($this->input->post('id'))) {
//            $this->mPageTitle = 'Update Main_info';
//            if ($this->form_validation->run() == FALSE) {
//                $this->mViewData['main_info'] = $this->mo_main_info->get_by_key($id);
//            } else {
//                $this->mo_main_info->id = $this->input->post('id');
//                $this->mo_main_info->img_logo = $this->input->post('img_logo');
//                $this->mo_main_info->content_under_logo = $this->input->post('content_under_logo');
//                $this->mo_main_info->url_facebook = $this->input->post('url_facebook');
//                $this->mo_main_info->url_twitter = $this->input->post('url_twitter');
//                $this->mo_main_info->url_instagram = $this->input->post('url_instagram');
//                $this->mo_main_info->url_line = $this->input->post('url_line');
//                $this->mo_main_info->url_email = $this->input->post('url_email');
//                $this->mo_main_info->updates();
//                redirect('admin/main_info/');
//            }
//        } else {
//            $this->mPageTitle = 'Create Main_info';
//            if ($this->form_validation->run() == FALSE) {
//                
//            } else {
//                $this->mo_main_info->img_logo = $this->input->post('img_logo');
//                $this->mo_main_info->content_under_logo = $this->input->post('content_under_logo');
//                $this->mo_main_info->url_facebook = $this->input->post('url_facebook');
//                $this->mo_main_info->url_twitter = $this->input->post('url_twitter');
//                $this->mo_main_info->url_instagram = $this->input->post('url_instagram');
//                $this->mo_main_info->url_line = $this->input->post('url_line');
//                $this->mo_main_info->url_email = $this->input->post('url_email');
//
//                $this->mo_main_info->inserts();
//                redirect('admin/main_info/');
//            }
//        }
//
//        $this->render('main_info/v_main_info_create');
//    }

    public function deletes($id = NULL) {
        if ($id != NULL) {
            $this->mo_main_info->id = $id;
            $this->mo_main_info->deletes();
        }
        redirect('admin/main_info/');
    }

}
