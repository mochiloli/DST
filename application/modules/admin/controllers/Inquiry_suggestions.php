
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inquiry_suggestions extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_builder');
        $this->load->library('form_validation');
        $this->load->model('mo_inquiry_suggestions');
        $this->load->helper('url');
    }

    public function index() {

        $this->mPageTitle = 'สอบถาม / เสนอแนะข้อคิดเห็น';
        $this->mViewData['original'] = $this->mo_inquiry_suggestions->get_all();
        $this->render('inquiry_suggestions/v_inquiry_suggestions');
    }

    public function create($id = NULL) {

        $this->form_validation->set_rules('topic', 'Topic', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('tel', 'Tel', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        if ($id != NULL || !empty($this->input->post('id'))) {
            $this->mPageTitle = 'Update Inquiry_suggestions';
            if ($this->form_validation->run() == FALSE) {
                $this->mViewData['inquiry_suggestions'] = $this->mo_inquiry_suggestions->get_by_key($id);
            } else {
                $this->mo_inquiry_suggestions->id = $this->input->post('id');
                $this->mo_inquiry_suggestions->topic = $this->input->post('topic');
                $this->mo_inquiry_suggestions->name = $this->input->post('name');
                $this->mo_inquiry_suggestions->email = $this->input->post('email');
                $this->mo_inquiry_suggestions->tel = $this->input->post('tel');
                $this->mo_inquiry_suggestions->content = $this->input->post('content');
                $this->mo_inquiry_suggestions->updates();
                redirect('admin/inquiry_suggestions/');
            }
        } else {
            $this->mPageTitle = 'Create Inquiry_suggestions';
            if ($this->form_validation->run() == FALSE) {
                
            } else {
                $this->mo_inquiry_suggestions->topic = $this->input->post('topic');
                $this->mo_inquiry_suggestions->name = $this->input->post('name');
                $this->mo_inquiry_suggestions->email = $this->input->post('email');
                $this->mo_inquiry_suggestions->tel = $this->input->post('tel');
                $this->mo_inquiry_suggestions->content = $this->input->post('content');

                $this->mo_inquiry_suggestions->inserts();
                redirect('admin/inquiry_suggestions/');
            }
        }

        $this->render('inquiry_suggestions/v_inquiry_suggestions_create');
    }

    public function update_status($id = null, $status = null) {
        if ($id && $status) {
                $this->mo_inquiry_suggestions->id = $id;
                $this->mo_inquiry_suggestions->status = urldecode($status);
                $this->mo_inquiry_suggestions->update_status();
                redirect('admin/inquiry_suggestions/');
        }
    }

    public function deletes($id = NULL) {
        if ($id != NULL) {
            $this->mo_inquiry_suggestions->id = $id;
            $this->mo_inquiry_suggestions->deletes();
        }
        redirect('admin/inquiry_suggestions/');
    }

}
