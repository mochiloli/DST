<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_builder');
        $this->load->library('form_validation');
        $this->load->model('mo_enrollments');
        $this->load->helper('url');
    }

    public function index() {
        $this->mPageTitle = 'รายงาน';
        if ($this->input->post('date_start') && $this->input->post('date_end') && $this->input->post('enrollments_status')) {
            $date_start = date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('date_start'))));
            $date_end = date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('date_end'))));
            $this->mViewData['enrollments'] = $this->mo_enrollments->get_search_By_date($date_start, $date_end,$this->input->post('enrollments_status'));
            $this->render('report/v_report');
        } else {
            $this->mViewData['enrollments'] = $this->mo_enrollments->get_search_By_date_no_status('2010/01/01', date('Y-m-d', time()));
            $this->render('report/v_report');
        }
    }

}
