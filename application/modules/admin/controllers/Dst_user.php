
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Dst_user extends Admin_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->library('form_builder');
			$this->load->library('form_validation');
			$this->load->model('mo_dst_user');						$this->load->model('mo_dst_main_info','info');
			$this->load->helper('url');
		}

		public function index() {

			$this->mPageTitle = 'ข้อมูลผู้ใช้';
			$this->mViewData['original'] = $this->mo_dst_user->get_all();						$this->mViewData['info'] = $this->info->get_all();			$this->mViewData['title'] = $this->mViewData['info'][0]->title_tag;			$this->mViewData['description'] = $this->mViewData['info'][0]->meta_description;			$this->mViewData['keyword'] = $this->mViewData['info'][0]->meta_keyword;			$this->mViewData['og_url'] = $this->mViewData['info'][0]->og_url;			$this->mViewData['og_type'] = $this->mViewData['info'][0]->og_type;			$this->mViewData['og_title'] = $this->mViewData['info'][0]->og_title;			$this->mViewData['og_description'] = $this->mViewData['info'][0]->og_description;			$this->mViewData['og_image'] = base_url('assets/img/') . $this->mViewData['info'][0]->og_image;
			$this->render('dst_user/v_dst_user');
		}

		public function create($id=NULL) {
			$this->mViewData['info'] = $this->info->get_all();			$this->mViewData['title'] = $this->mViewData['info'][0]->title_tag;			$this->mViewData['description'] = $this->mViewData['info'][0]->meta_description;			$this->mViewData['keyword'] = $this->mViewData['info'][0]->meta_keyword;			$this->mViewData['og_url'] = $this->mViewData['info'][0]->og_url;			$this->mViewData['og_type'] = $this->mViewData['info'][0]->og_type;			$this->mViewData['og_title'] = $this->mViewData['info'][0]->og_title;			$this->mViewData['og_description'] = $this->mViewData['info'][0]->og_description;			$this->mViewData['og_image'] = base_url('assets/img/') . $this->mViewData['info'][0]->og_image;
				$this->form_validation->set_rules('user_name','User_name', 'required');				$this->form_validation->set_rules('user_tel','User_tel', 'required'); 				if($id!=NULL || !empty($this->input->post('user_id'))){
            $this->mPageTitle = 'แก้ไขข้อมูลผู้ใช้';
			if($this->form_validation->run() == FALSE){
				$this->mViewData['dst_user'] = $this->mo_dst_user->get_by_key($id);
			}
			else{ $this->mo_dst_user->user_id = $this->input->post('user_id'); 			$this->mo_dst_user->user_name = $this->input->post('user_name',true); 			$this->mo_dst_user->user_tel = $this->input->post('user_tel',true);  			$this->mo_dst_user->updates();
				redirect('admin/dst_user/');
			}
		}
		else{ $this->mPageTitle = 'เพิ่มผู้ใช้';
			if($this->form_validation->run() == FALSE){

			}
			else{
			$this->mo_dst_user->user_id = $this->input->post('user_id');
				$this->mo_dst_user->user_name = $this->input->post('user_name',true);
				$this->mo_dst_user->user_tel = $this->input->post('user_tel',true);

				$this->mo_dst_user->inserts();
				redirect('admin/dst_user/');
			}
		}



		$this->render('dst_user/v_dst_user_create');
	}

	public function deletes($id=NULL) {
		if($id!=NULL){
			$this->mo_dst_user->user_id = $id;
			$this->mo_dst_user->deletes();
		}
		redirect('admin/dst_user/');
	}

}
