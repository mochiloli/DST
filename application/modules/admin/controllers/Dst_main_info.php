
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Dst_main_info extends Admin_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->library('form_builder');
			$this->load->library('form_validation');
			$this->load->model('mo_dst_main_info');
			$this->load->helper('url');
		}

		public function index2() {

			$this->mPageTitle = 'ข้อมูลหลัก';
			$this->mViewData['original'] = $this->mo_dst_main_info->get_all();
			$this->render('dst_main_info/v_dst_main_info');
		}

		public function index($id=1) {
				$this->form_validation->set_rules('url_facebook','Url_facebook', 'required');
				$this->form_validation->set_rules('condition_content','Condition_content', 'required');
				$this->form_validation->set_rules('title_tag','Title_tag', 'required');
				$this->form_validation->set_rules('meta_description','Meta_description', 'required');
				$this->form_validation->set_rules('meta_keyword','Meta_keyword', 'required');
				$this->form_validation->set_rules('og_url','Og_url', 'required');
				$this->form_validation->set_rules('og_type','Og_type', 'required');
				$this->form_validation->set_rules('og_title','Og_title', 'required');
				$this->form_validation->set_rules('og_description','Og_description', 'required');
				if($id!=NULL || !empty($this->input->post('id'))){
            $this->mPageTitle = 'ข้อมูลหลัก';
			if($this->form_validation->run() == FALSE){
				$this->mViewData['dst_main_info'] = $this->mo_dst_main_info->get_by_key($id);								$this->mViewData['title'] = $this->mViewData['dst_main_info'][0]->title_tag;				$this->mViewData['description'] = $this->mViewData['dst_main_info'][0]->meta_description;				$this->mViewData['keyword'] = $this->mViewData['dst_main_info'][0]->meta_keyword;				$this->mViewData['og_url'] = $this->mViewData['dst_main_info'][0]->og_url;				$this->mViewData['og_type'] = $this->mViewData['dst_main_info'][0]->og_type;				$this->mViewData['og_title'] = $this->mViewData['dst_main_info'][0]->og_title;				$this->mViewData['og_description'] = $this->mViewData['dst_main_info'][0]->og_description;				$this->mViewData['og_image'] = base_url('assets/img/') . $this->mViewData['dst_main_info'][0]->og_image;				
			}
			else{
				$this->mo_dst_main_info->id = $this->input->post('id');
				$this->mo_dst_main_info->content_under_logo = $this->input->post('content_under_logo',true);
				$this->mo_dst_main_info->url_facebook = $this->input->post('url_facebook',true);
				$this->mo_dst_main_info->condition_content = $this->input->post('condition_content',true);
				$this->mo_dst_main_info->title_tag = $this->input->post('title_tag',true);
				$this->mo_dst_main_info->meta_description = $this->input->post('meta_description',true);
				$this->mo_dst_main_info->meta_keyword = $this->input->post('meta_keyword',true);
				$this->mo_dst_main_info->og_url = $this->input->post('og_url',true);
				$this->mo_dst_main_info->og_type = $this->input->post('og_type',true);
				$this->mo_dst_main_info->og_title = $this->input->post('og_title',true);
				$this->mo_dst_main_info->og_description = $this->input->post('og_description',true);

				//img_logo
				$field_name = "img_logo";
				$path = "./assets/img/";
				$allowed_types = "png|jpg|jpeg|gif";
				$img_name = $this->upload_file($field_name, $path, $allowed_types);
				if($img_name)
					$this->mo_dst_main_info->img_logo = $img_name;
				else
					$this->mo_dst_main_info->img_logo = $this->input->post('img_old');

					//og_image
					$field_name2 = "og_image";
					$path = "./assets/img/";
					$allowed_types = "png|jpg|jpeg|gif";
					$img_name2 = $this->upload_file($field_name2, $path, $allowed_types);
					if($img_name2){						$this->mo_dst_main_info->og_image = $img_name2;						}
					else{
						$this->mo_dst_main_info->og_image = $this->input->post('og_image_old');}
				$this->mo_dst_main_info->updates();
				redirect('admin/dst_main_info/');
			}
		}
		$this->render('dst_main_info/v_dst_main_info_create');
	}

	public function deletes($id=NULL) {
		if($id!=NULL){
			$this->mo_dst_main_info->id = $id;
			$this->mo_dst_main_info->deletes();
		}
		redirect('admin/dst_main_info/');
	}

}
