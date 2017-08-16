
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Dst_info extends Admin_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->library('form_builder');
			$this->load->library('form_validation');
			$this->load->model('mo_dst_info');
			$this->load->helper('url');
		}

		public function index2() {

			$this->mPageTitle = 'เกี่ยวกับเรา';
			$this->mViewData['original'] = $this->mo_dst_info->get_all();
			$this->render('dst_info/v_dst_info');
		}

		public function index($id=1) {

				$this->form_validation->set_rules('info_name','Info_name', 'required');
				$this->form_validation->set_rules('info_topic','Info_topic', 'required');
				$this->form_validation->set_rules('info_content','Info_content', 'required');
				if($id!=NULL || !empty($this->input->post('info_id'))){
            $this->mPageTitle = 'แก้ไขข้อมูล';
			if($this->form_validation->run() == FALSE){
				$this->mViewData['dst_info'] = $this->mo_dst_info->get_by_key($id);
			}
			else{
				$field_name = "info_image";
				$path = "./assets/uploads/info/";
				$allowed_types = "png|jpg|jpeg|gif";
				$img_name = $this->upload_file($field_name, $path, $allowed_types);

				$this->mo_dst_info->info_id = $this->input->post('info_id');
				$this->mo_dst_info->info_name = $this->input->post('info_name');
				$this->mo_dst_info->info_topic = $this->input->post('info_topic');
				$this->mo_dst_info->info_content = $this->input->post('info_content');
				$this->mo_dst_info->info_tel = $this->input->post('info_tel');
				$this->mo_dst_info->info_phone = $this->input->post('info_phone');
				$this->mo_dst_info->info_fax = $this->input->post('info_fax');
				$this->mo_dst_info->info_email = $this->input->post('info_email');
				if($img_name)
					$this->mo_dst_info->info_image = $img_name;
				else
					$this->mo_dst_info->info_image = $this->input->post('img_old');
				$this->mo_dst_info->updates();
				redirect('admin/dst_info/');
			}
		}
		else{ $this->mPageTitle = 'เพิ่มข้อมูล';
			if($this->form_validation->run() == FALSE){

			}
			else{
				$field_name = "info_image";
				$path = "./assets/uploads/info/";
				$allowed_types = "png|jpg|jpeg|gif";
				$img_name = $this->upload_file($field_name, $path, $allowed_types);

				$this->mo_dst_info->info_id = $this->input->post('info_id');
				$this->mo_dst_info->info_name = $this->input->post('info_name');
				$this->mo_dst_info->info_topic = $this->input->post('info_topic');
				$this->mo_dst_info->info_content = $this->input->post('info_content');
				$this->mo_dst_info->info_tel = $this->input->post('info_tel');
				$this->mo_dst_info->info_phone = $this->input->post('info_phone');
				$this->mo_dst_info->info_fax = $this->input->post('info_fax');
				$this->mo_dst_info->info_email = $this->input->post('info_email');
				if($img_name)
					$this->mo_dst_info->info_image = $img_name;
				else
					$this->mo_dst_info->info_image = $this->input->post('img_old');

				$this->mo_dst_info->inserts();
				redirect('admin/dst_info/');
			}
		}



		$this->render('dst_info/v_dst_info_create');
	}

	public function deletes($id=NULL) {
		if($id!=NULL){
			$this->mo_dst_info->info_id = $id;
			$this->mo_dst_info->deletes();
		}
		redirect('admin/dst_info/');
	}

}
