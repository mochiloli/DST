
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_album extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_builder');
        $this->load->library('form_validation');
        $this->load->model('mo_gallery_album');
        $this->load->model('mo_gallery_img');
        $this->load->helper('url');
    }

    public function index($id = null) {

        $this->mPageTitle = 'อัลบั้มบรรยากาศคอร์สอบรม';
        $this->mViewData['original'] = $this->mo_gallery_album->get_all();
        $this->render('gallery_album/v_gallery_album');
    }

    public function create($id = NULL) {

        $this->form_validation->set_rules('content', 'Content', 'required');
        if ($id != NULL || !empty($this->input->post('id'))) {
            $this->mPageTitle = 'แก้ไขอัลบั้มบรรยากาศคอร์สอบรม';
            if ($this->form_validation->run() == FALSE) {
                $this->mViewData['gallery_album'] = $this->mo_gallery_album->get_by_key($id);
            } else {
                $this->mo_gallery_album->id = $this->input->post('id');

                if ($_FILES["img"]['name']) {
                    $config['file_name'] = md5($_FILES["img"]['name']).'.jpg';
                    $config['upload_path'] = 'assets/uploads/gallery-album/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '0';
                    $img = md5($_FILES["img"]['name']).'.jpg';
                    $this->load->library("upload", $config);
                    $this->upload->initialize($config);
                    $this->upload->do_upload('img');
                    $this->mo_gallery_album->img = $img;
                } else {
                    $this->mo_gallery_album->img = $this->input->post('img_old');
                }
                $this->mo_gallery_album->content = $this->input->post('content');
                $this->mo_gallery_album->course_id = $this->input->post('course_id');
                $this->mo_gallery_album->updates();
                redirect('admin/gallery_album/');
            }
        } else {
            $this->mPageTitle = 'เพิ่มอัลบั้มบรรยากาศคอร์สอบรม';
            if ($this->form_validation->run() == FALSE) {
                
            } else {

                $config['file_name'] = md5($_FILES["img"]['name']).'.jpg';
                $config['upload_path'] = 'assets/uploads/gallery-album/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '0';
                $img = md5($_FILES["img"]['name']).'.jpg';
                $this->load->library("upload", $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('img');
                $this->mo_gallery_album->img = $img;
                $this->mo_gallery_album->content = $this->input->post('content');
                $this->mo_gallery_album->status = 'เปิด';
                $this->mo_gallery_album->inserts();

                redirect('admin/gallery_album/');
            }
        }
        $this->render('gallery_album/v_gallery_album_create');
    }

    public function deletes($id = NULL) {
        if ($id != NULL) {
            $this->mo_gallery_album->id = $id;
            $this->mo_gallery_album->deletes();
        }
        redirect('admin/gallery_album/');
    }
    
    public function update_status($id, $status) {
        $this->mo_gallery_album->id = $id;
        $this->mo_gallery_album->status = urldecode($status);
        $this->mo_gallery_album->update_status();
        redirect('admin/gallery_album/');
    }

}
