
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class C_matching extends Admin_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->library('form_builder');
			$this->load->library('form_validation');
			$this->load->model('mo_dst_match_number');
			$this->load->helper('url');
		}

		public function index2() {

			$this->mPageTitle = 'จับคู่ตัวเลข';
			$this->mViewData['original'] = $this->mo_dst_match_number->get_all();
			$this->render('v_matching/v_matching');
		}

		public function index() {
			$amount = $this->input->get('amount');
			$this->mViewData['amount'] = 1;

			$this->mPageTitle = 'จับคู่ตัวเลข';
			$this->render('v_matching/v_matching_create');
		}

		public function process() {
			$amount = $this->input->post('amount');
			$number = $this->input->post('number');
			for($i=0; $i < $amount; $i++)
    	{
				//if($number[$i]<10) $number[$i] = "0".$number[$i];
      	echo $number[$i]."<br>";
    	}

			die();
			$this->mViewData['number'] = $number;
			$this->mPageTitle = 'ผลการทำนาย';
			$this->render('v_matching/v_result');
		}

		public function create($id=NULL) {

				$this->form_validation->set_rules('mn_number','Mn_number', 'required');
				$this->form_validation->set_rules('mn_data','Mn_data', 'required');
				$this->form_validation->set_rules('mn_keyword','Mn_keyword', 'required');
				if($id!=NULL || !empty($this->input->post('mn_id'))){
            $this->mPageTitle = 'แก้ไขข้อมูลคู่ตัวเลข';
			if($this->form_validation->run() == FALSE){
				$this->mViewData['dst_match_number'] = $this->mo_dst_match_number->get_by_key($id);
			}
			else{ $this->mo_dst_match_number->mn_id = $this->input->post('mn_id');
				$this->mo_dst_match_number->mn_number = $this->input->post('mn_number');
				$this->mo_dst_match_number->mn_data = $this->input->post('mn_data');
				$this->mo_dst_match_number->mn_keyword = $this->input->post('mn_keyword');
				$this->mo_dst_match_number->updates();
				redirect('admin/dst_match_number/');
			}
		}
		else{ $this->mPageTitle = 'เพิ่มคู่ตัวเลข';
			if($this->form_validation->run() == FALSE){

			}
			else{
			$this->mo_dst_match_number->mn_id = $this->input->post('mn_id');
				$this->mo_dst_match_number->mn_number = $this->input->post('mn_number');
				$this->mo_dst_match_number->mn_data = $this->input->post('mn_data');
				$this->mo_dst_match_number->mn_keyword = $this->input->post('mn_keyword');

				$this->mo_dst_match_number->inserts();
				redirect('admin/dst_match_number/');
			}
		}



		$this->render('dst_match_number/v_dst_match_number_create');
	}

	public function deletes($id=NULL) {
		if($id!=NULL){
			$this->mo_dst_match_number->mn_id = $id;
			$this->mo_dst_match_number->deletes();
		}
		redirect('admin/dst_match_number/');
	}

}
