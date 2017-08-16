
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_builder');
        $this->load->library('form_validation');
        $this->load->model('mo_faq');
        $this->load->helper('url');
    }

    public function index() {

        $this->mPageTitle = 'คำถามที่พบบ่อย';
        $this->mViewData['original'] = $this->mo_faq->get_all();
        $this->render('faq/v_faq');
    }

    public function create($id = NULL) {

        $this->form_validation->set_rules('question', 'Question', 'required');
        $this->form_validation->set_rules('answer', 'Answer', 'required');
        
        if ($id != NULL || !empty($this->input->post('id'))) {
            $this->mPageTitle = 'แก้ไขคำถามที่พบบ่อย';
            if ($this->form_validation->run() == FALSE) {
                $this->mViewData['faq'] = $this->mo_faq->get_by_key($id);
            } else {
                $this->mo_faq->id = $this->input->post('id');
                $this->mo_faq->question = $this->input->post('question');
                $this->mo_faq->answer = $this->input->post('answer');
                $this->mo_faq->updates();
                redirect('admin/faq/');
            }
        } else {
            $this->mPageTitle = 'เพิ่มคำถามที่พบบ่อย';
            if ($this->form_validation->run() == FALSE) {
                
            } else {
                $this->mo_faq->question = $this->input->post('question');
                $this->mo_faq->answer = $this->input->post('answer');

                $this->mo_faq->inserts();
                redirect('admin/faq/');
            }
        }



        $this->render('faq/v_faq_create');
    }

    public function deletes($id = NULL) {
        if ($id != NULL) {
            $this->mo_faq->id = $id;
            $this->mo_faq->deletes();
        }
        redirect('admin/faq/');
    }

}
