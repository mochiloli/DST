
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Enrollments extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_builder');
        $this->load->library('form_validation');
        $this->load->model('mo_enrollments');
        $this->load->helper('url');
    }

    public function index() {

        $this->mPageTitle = 'ลงทะเบียน';
        $this->mViewData['original'] = $this->mo_enrollments->get_all_join_course();
//        echo "<pre>";
//        print_r($this->mViewData['original']);
//        echo "</pre>";
//        exit();
        $this->render('enrollments/v_enrollments');
    }

    public function create($id = NULL) {

        $this->form_validation->set_rules('course_name', 'Course_name', 'required');
        $this->form_validation->set_rules('firstname', 'Firstname', 'required');
        $this->form_validation->set_rules('lastname', 'Lastname', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('tel', 'Tel', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('fax', 'Fax', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('bank_name', 'Bank_name', 'required');
        if ($id != NULL || !empty($this->input->post('id'))) {
            $this->mPageTitle = 'Update Enrollments';
            if ($this->form_validation->run() == FALSE) {
                $this->mViewData['enrollments'] = $this->mo_enrollments->get_by_key($id);
            } else {
                $this->mo_enrollments->id = $this->input->post('id');
                $this->mo_enrollments->course_name = $this->input->post('course_name');
                $this->mo_enrollments->firstname = $this->input->post('firstname');
                $this->mo_enrollments->lastname = $this->input->post('lastname');
                $this->mo_enrollments->address = $this->input->post('address');
                $this->mo_enrollments->tel = $this->input->post('tel');
                $this->mo_enrollments->mobile = $this->input->post('mobile');
                $this->mo_enrollments->fax = $this->input->post('fax');
                $this->mo_enrollments->email = $this->input->post('email');
                $this->mo_enrollments->bank_name = $this->input->post('bank_name');
                $this->mo_enrollments->updates();
                redirect('admin/enrollments/');
            }
        } else {
            $this->mPageTitle = 'Create Enrollments';
            if ($this->form_validation->run() == FALSE) {
                
            } else {
                $this->mo_enrollments->course_name = $this->input->post('course_name');
                $this->mo_enrollments->firstname = $this->input->post('firstname');
                $this->mo_enrollments->lastname = $this->input->post('lastname');
                $this->mo_enrollments->address = $this->input->post('address');
                $this->mo_enrollments->tel = $this->input->post('tel');
                $this->mo_enrollments->mobile = $this->input->post('mobile');
                $this->mo_enrollments->fax = $this->input->post('fax');
                $this->mo_enrollments->email = $this->input->post('email');
                $this->mo_enrollments->bank_name = $this->input->post('bank_name');

                $this->mo_enrollments->inserts();
                redirect('admin/enrollments/');
            }
        }

        $this->render('enrollments/v_enrollments_create');
    }

    public function update_status($id = null, $status = null) {
        if ($id && $status) {
            $this->mo_enrollments->id = $id;
            $this->mo_enrollments->status = urldecode($status);
            $this->mo_enrollments->update_status();
            redirect('admin/enrollments/');
        }
    }

    public function deletes($id = NULL) {
        if ($id != NULL) {
            $this->mo_enrollments->id = $id;
            $this->mo_enrollments->deletes();
        }
        redirect('admin/enrollments/');
    }

}
