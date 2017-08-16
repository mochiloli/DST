
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_img extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_builder');
        $this->load->library('form_validation');
        $this->load->model('mo_gallery_album');
        $this->load->model('mo_gallery_img');
        $this->load->helper('url');
    }

    public function img_in_album($id = null) {

        $this->mPageTitle = 'รูปบรรยากาศคอร์สอบรม';
        $this->mViewData['original'] = $this->mo_gallery_img->get_all_key_album($id);
        $this->render('gallery_img/v_gallery_img');
    }

    public function img_in_album_create($id_album = null, $id_img = null) {

        date_default_timezone_set("Asia/Bangkok");

        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($id_img != NULL) {
            $this->mPageTitle = 'แก้ไขรูปบรรยากาศคอร์สอบรม';
            if ($this->form_validation->run() == FALSE) {
                $this->mViewData['gallery_img'] = $this->mo_gallery_img->get_by_key($id_img);
            } else {
                $this->mo_gallery_img->id = $this->input->post('id_img');
                $this->mo_gallery_img->album_id = $id_album;

                if ($_FILES["img"]['name']) {
                    $config['file_name'] = date('dmYHsi', time()) . md5($_FILES["img"]['name']) . '.jpg';
                    $config['upload_path'] = 'assets/uploads/gallery-img/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '0';
                    $img = date('dmYHsi', time()) . md5($_FILES["img"]['name']) . '.jpg';
                    $this->load->library("upload", $config);
                    $this->upload->initialize($config);
                    $this->upload->do_upload('img');
                    $this->mo_gallery_img->img = $img;
                } else {
                    $this->mo_gallery_img->img = $this->input->post('img_old');
                }

                $this->mo_gallery_img->content = $this->input->post('content');
                $this->mo_gallery_img->updates();
                redirect('admin/gallery_img/img_in_album/' . $id_album);
            }
        } else {
            $this->mPageTitle = 'เพิ่มรูปบรรยากาศคอร์สอบรม';
            if ($this->form_validation->run() == FALSE) {
                
            } else {

                $this->mo_gallery_img->album_id = $id_album;

                $config['file_name'] = date('dmYHsi', time()) . md5($_FILES["img"]['name']) . '.jpg';
                $config['upload_path'] = 'assets/uploads/gallery-img/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '0';
                $img = date('dmYHsi', time()) . md5($_FILES["img"]['name']) . '.jpg';
                $this->load->library("upload", $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('img');
                $this->mo_gallery_img->img = $img;

                $this->mo_gallery_img->content = $this->input->post('content');

                $this->mo_gallery_img->inserts();
                redirect('admin/gallery_img/img_in_album/' . $id_album);
            }
        }

        $this->render('gallery_img/v_gallery_img_create');
    }

    public function img_in_album_deletes($id_album = null, $id_img = null) {
        if ($id_img != NULL) {
            $this->mo_gallery_img->id = $id_img;
            $this->mo_gallery_img->deletes();
        }
        redirect('admin/gallery_img/img_in_album/' . $id_album);
    }

}
