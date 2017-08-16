
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Dst_match_number extends Admin_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->library('form_builder');
			$this->load->library('form_validation');
			$this->load->model('mo_dst_match_number');						
			$this->load->model('mo_dst_main_info','info');
			$this->load->helper('url');
		}

		public function index() {

			$this->mPageTitle = 'ความหมายของคู่ตัวเลข';
			$this->mViewData['original'] = $this->mo_dst_match_number->get_all();						
			$this->mViewData['info'] = $this->info->get_all();			
			$this->mViewData['title'] = $this->mViewData['info'][0]->title_tag;			
			$this->mViewData['description'] = $this->mViewData['info'][0]->meta_description;			
			$this->mViewData['keyword'] = $this->mViewData['info'][0]->meta_keyword;			
			$this->mViewData['og_url'] = $this->mViewData['info'][0]->og_url;			
			$this->mViewData['og_type'] = $this->mViewData['info'][0]->og_type;			
			$this->mViewData['og_title'] = $this->mViewData['info'][0]->og_title;			
			$this->mViewData['og_description'] = $this->mViewData['info'][0]->og_description;			
			$this->mViewData['og_image'] = base_url('assets/img/') . $this->mViewData['info'][0]->og_image;
			$this->render('dst_match_number/v_dst_match_number');
		}

		public function create($id=NULL) {
			$this->mViewData['info'] = $this->info->get_all();			
			$this->mViewData['title'] = $this->mViewData['info'][0]->title_tag;			
			$this->mViewData['description'] = $this->mViewData['info'][0]->meta_description;			
			$this->mViewData['keyword'] = $this->mViewData['info'][0]->meta_keyword;			
			$this->mViewData['og_url'] = $this->mViewData['info'][0]->og_url;			
			$this->mViewData['og_type'] = $this->mViewData['info'][0]->og_type;			
			$this->mViewData['og_title'] = $this->mViewData['info'][0]->og_title;			
			$this->mViewData['og_description'] = $this->mViewData['info'][0]->og_description;			
			$this->mViewData['og_image'] = base_url('assets/img/') . $this->mViewData['info'][0]->og_image;
				$this->form_validation->set_rules('mn_number','Mn_number', 'required');
				/*$this->form_validation->set_rules('mn_data','Mn_data', 'required');
				$this->form_validation->set_rules('mn_keyword','Mn_keyword', 'required');
				$this->form_validation->set_rules('mn_result','Mn_result', 'required');*/
				if($id!=NULL || !empty($this->input->post('mn_id'))){
            $this->mPageTitle = 'แก้ไขข้อมูลคู่ตัวเลข';
			if($this->form_validation->run() == FALSE){
				$this->mViewData['dst_match_number'] = $this->mo_dst_match_number->get_by_key($id);
			}
			else{ $this->mo_dst_match_number->mn_id = $this->input->post('mn_id');
				$this->mo_dst_match_number->mn_number = $this->input->post('mn_number',true);
				$this->mo_dst_match_number->mn_data = $this->input->post('mn_data');
				$this->mo_dst_match_number->mn_keyword = $this->input->post('mn_keyword');
				$this->mo_dst_match_number->mn_result = $this->input->post('mn_result');
				$this->mo_dst_match_number->updates();
				redirect('admin/dst_match_number/');
			}
		}
		else{ $this->mPageTitle = 'เพิ่มคู่ตัวเลข';
			if($this->form_validation->run() == FALSE){

			}
			else{
			$this->mo_dst_match_number->mn_id = $this->input->post('mn_id');
				$this->mo_dst_match_number->mn_number = $this->input->post('mn_number',true);
				$this->mo_dst_match_number->mn_data = $this->input->post('mn_data');
				$this->mo_dst_match_number->mn_keyword = $this->input->post('mn_keyword');
				$this->mo_dst_match_number->mn_result = $this->input->post('mn_result');

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
