
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_builder');
        $this->load->library('form_validation');
        $this->load->model('mo_testimonial');
        $this->load->helper('url');
    }

    public function index() {

        $this->mPageTitle = 'ความประทับใจ';
        $this->mViewData['original'] = $this->mo_testimonial->get_all();
        $this->render('Testimonial/v_Testimonial');
    }

    public function create($id = NULL) {

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('job', 'Job', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($id != NULL || !empty($this->input->post('id'))) {
            $this->mPageTitle = 'แก้ไขความประทับใจ';
            if ($this->form_validation->run() == FALSE) {
                $this->mViewData['Testimonial'] = $this->mo_testimonial->get_by_key($id);
            } else {
                $this->mo_testimonial->id = $this->input->post('id');

                if ($_FILES["pic_person"]['name']) {
                $config['file_name'] = md5($_FILES["pic_person"]['name']).'.jpg';
                $config['upload_path'] = 'assets/uploads/testimonial/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '0';
                $pic_person = md5($_FILES["pic_person"]['name']).'.jpg';
                $this->load->library("upload", $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('pic_person');
                $this->mo_testimonial->pic_person = $pic_person;
                }else{
                    $this->mo_testimonial->pic_person = $this->input->post('pic_person_old');
                }

                $this->mo_testimonial->name = $this->input->post('name');
                $this->mo_testimonial->job = $this->input->post('job');
                $this->mo_testimonial->content = $this->input->post('content');
                $this->mo_testimonial->updates();
                redirect('admin/Testimonial/');
            }
        } else {
            $this->mPageTitle = 'เพิ่มความประทับใจ';
            if ($this->form_validation->run() == FALSE) {
                
            } else {

                $config['file_name'] = md5($_FILES["pic_person"]['name']).'.jpg';
                $config['upload_path'] = 'assets/uploads/testimonial/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '0';
                $pic_person = md5($_FILES["pic_person"]['name']).'.jpg';
                $this->load->library("upload", $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('pic_person');
                $this->mo_testimonial->pic_person = $pic_person;

                $this->mo_testimonial->name = $this->input->post('name');
                $this->mo_testimonial->job = $this->input->post('job');
                $this->mo_testimonial->content = $this->input->post('content');

                $this->mo_testimonial->inserts();
                redirect('admin/Testimonial/');
            }
        }



        $this->render('Testimonial/v_Testimonial_create');
    }

    public function deletes($id = NULL) {
        if ($id != NULL) {
            $this->mo_testimonial->id = $id;
            $this->mo_testimonial->deletes();
        }
        redirect('admin/Testimonial/');
    }

}
