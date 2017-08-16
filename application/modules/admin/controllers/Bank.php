
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_builder');
        $this->load->library('form_validation');
        $this->load->model('mo_bank');
        $this->load->helper('url');
    }

    public function index() {

        $this->mPageTitle = 'ธนาคาร';
        $this->mViewData['original'] = $this->mo_bank->get_all();
        $this->render('bank/v_bank');
    }

    public function create($id = NULL) {

        $this->form_validation->set_rules('name', 'Name', 'required');
        if ($id != NULL || !empty($this->input->post('id'))) {
            $this->mPageTitle = 'แก้ไขธนาคาร';
            if ($this->form_validation->run() == FALSE) {
                $this->mViewData['bank'] = $this->mo_bank->get_by_key($id);
            } else {
                $this->mo_bank->id = $this->input->post('id');
                $this->mo_bank->name = $this->input->post('name');
                $this->mo_bank->updates();
                redirect('admin/bank/');
            }
        } else {
            $this->mPageTitle = 'เพิ่มธนาคาร';
            if ($this->form_validation->run() == FALSE) {
                
            } else {
                $this->mo_bank->name = $this->input->post('name');

                $this->mo_bank->inserts();
                redirect('admin/bank/');
            }
        }



        $this->render('bank/v_bank_create');
    }

    public function deletes($id = NULL) {
        if ($id != NULL) {
            $this->mo_bank->id = $id;
            $this->mo_bank->deletes();
        }
        redirect('admin/bank/');
    }

}
