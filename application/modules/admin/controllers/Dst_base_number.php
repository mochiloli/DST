
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Dst_base_number extends Admin_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->library('form_builder');
			$this->load->library('form_validation');
			$this->load->model('mo_dst_base_number');						
			$this->load->model('mo_dst_main_info','info');
			$this->load->helper('url');
		}

		public function index() {

			$this->mPageTitle = 'จับหลักตัวเลข';
			$this->mViewData['original'] = $this->mo_dst_base_number->get_all();						
			$this->mViewData['info'] = $this->info->get_all();			
			$this->mViewData['title'] = $this->mViewData['info'][0]->title_tag;			
			$this->mViewData['description'] = $this->mViewData['info'][0]->meta_description;			
			$this->mViewData['keyword'] = $this->mViewData['info'][0]->meta_keyword;			
			$this->mViewData['og_url'] = $this->mViewData['info'][0]->og_url;			
			$this->mViewData['og_type'] = $this->mViewData['info'][0]->og_type;			
			$this->mViewData['og_title'] = $this->mViewData['info'][0]->og_title;			
			$this->mViewData['og_description'] = $this->mViewData['info'][0]->og_description;			
			$this->mViewData['og_image'] = base_url('assets/img/') . $this->mViewData['info'][0]->og_image;
			$this->render('dst_base_number/v_dst_base_number');
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
				$this->form_validation->set_rules('base_number','Base_number', 'required'); 
				if($id!=NULL || !empty($this->input->post('base_id'))){
            $this->mPageTitle = 'แก้ไขข้อมูลหลักตัวเลข';
			if($this->form_validation->run() == FALSE){
				$this->mViewData['dst_base_number'] = $this->mo_dst_base_number->get_by_key($id);
			}
			else{ $this->mo_dst_base_number->base_id = $this->input->post('base_id'); 			
			$this->mo_dst_base_number->base_number = $this->input->post('base_number',true);  			
			$this->mo_dst_base_number->updates();
				redirect('admin/dst_base_number/');
			}
		}
		else{ $this->mPageTitle = 'สร้างข้อมูลหลักตัวเลข';
			if($this->form_validation->run() == FALSE){

			}
			else{
			$this->mo_dst_base_number->base_id = $this->input->post('base_id');
				$this->mo_dst_base_number->base_number = $this->input->post('base_number');

				$this->mo_dst_base_number->inserts();
				redirect('admin/dst_base_number/');
			}
		}



		$this->render('dst_base_number/v_dst_base_number_create');
	}

	public function deletes($id=NULL) {
		if($id!=NULL){
			$this->mo_dst_base_number->base_id = $id;
			$this->mo_dst_base_number->deletes();
		}
		redirect('admin/dst_base_number/');
	}

}
