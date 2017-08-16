
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_builder');
        $this->load->library('form_validation');
        $this->load->model('mo_contact');
        $this->load->helper('url');
    }

    public function index($id = 1) {

        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('tel', 'Tel', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('fax', 'Fax', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('time_open', 'Time_open', 'required');

        if ($id != NULL || !empty($this->input->post('id'))) {
            $this->mPageTitle = 'แก้ไขติดต่อเรา';
            if ($this->form_validation->run() == FALSE) {
                $this->mViewData['contact'] = $this->mo_contact->get_by_key($id);
            } else {
                $this->mo_contact->id = $this->input->post('id');
                $this->mo_contact->address = $this->input->post('address');
                $this->mo_contact->tel = $this->input->post('tel');
                $this->mo_contact->mobile = $this->input->post('mobile');
                $this->mo_contact->fax = $this->input->post('fax');
                $this->mo_contact->email = $this->input->post('email');
                $this->mo_contact->time_open = $this->input->post('time_open');

                if ($_FILES["pic_address"]['name']) {
                    $config['file_name'] = md5($_FILES["img"]['name']).'.jpg';
                    $config['upload_path'] = 'assets/uploads/contact/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '0';
                    $pic_address = md5($_FILES["img"]['name']).'.jpg';
                    $this->load->library("upload", $config);
                    $this->upload->initialize($config);
                    $this->upload->do_upload('pic_address');
                    $this->mo_contact->pic_address = $pic_address;
                }else{
                    $this->mo_contact->pic_address = $this->input->post('pic_address_old');
                }

                $this->mo_contact->updates();
                redirect('admin/contact/');
            }
        }

        $this->render('contact/v_contact_create');
    }

}
