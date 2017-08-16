
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Dst_activity extends Admin_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->library('form_builder');
			$this->load->library('form_validation');
			$this->load->model('mo_dst_activity');
			$this->load->model('mo_dst_main_info','info');
			$this->load->helper('url');
		}

		public function index() {

			$this->mPageTitle = 'กิจกรรม';
			$this->mViewData['original'] = $this->mo_dst_activity->get_all();
			
			$this->mViewData['info'] = $this->info->get_all();
			$this->mViewData['title'] = $this->mViewData['info'][0]->title_tag;
			$this->mViewData['description'] = $this->mViewData['info'][0]->meta_description;
			$this->mViewData['keyword'] = $this->mViewData['info'][0]->meta_keyword;
			$this->mViewData['og_url'] = $this->mViewData['info'][0]->og_url;
			$this->mViewData['og_type'] = $this->mViewData['info'][0]->og_type;
			$this->mViewData['og_title'] = $this->mViewData['info'][0]->og_title;
			$this->mViewData['og_description'] = $this->mViewData['info'][0]->og_description;
			$this->mViewData['og_image'] = base_url('assets/img/') . $this->mViewData['info'][0]->og_image;
			
			$this->render('dst_activity/v_dst_activity');
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

				$this->form_validation->set_rules('ac_topic','Ac_topic', 'required');
				$this->form_validation->set_rules('ac_content','Ac_content', 'required');

				if($id!=NULL || !empty($this->input->post('ac_id'))){
            $this->mPageTitle = 'แก้ไขข้อมูลกิจกรรม';
			if($this->form_validation->run() == FALSE){
				$this->mViewData['dst_activity'] = $this->mo_dst_activity->get_by_key($id);

				$this->mViewData['title'] = $this->mViewData['dst_activity'][0]->title_tag;
				$this->mViewData['description'] = $this->mViewData['dst_activity'][0]->meta_description;
				$this->mViewData['keyword'] = $this->mViewData['dst_activity'][0]->meta_keyword;
				$this->mViewData['og_url'] = $this->mViewData['dst_activity'][0]->og_url;
				$this->mViewData['og_type'] = $this->mViewData['dst_activity'][0]->og_type;
				$this->mViewData['og_title'] = $this->mViewData['dst_activity'][0]->og_title;
				$this->mViewData['og_description'] = $this->mViewData['dst_activity'][0]->og_description;
				$this->mViewData['og_image'] = base_url('assets/uploads/activity/') . $this->mViewData['dst_activity'][0]->og_image;
			}
			else{
				$this->mo_dst_activity->ac_id = $this->input->post('ac_id');
				$this->mo_dst_activity->ac_topic = $this->input->post('ac_topic',true);
				$this->mo_dst_activity->ac_content = $this->input->post('ac_content');
				$this->mo_dst_activity->title_tag = $this->input->post('title_tag',true);
				$this->mo_dst_activity->meta_description = $this->input->post('meta_description',true);
				$this->mo_dst_activity->meta_keyword = $this->input->post('meta_keyword',true);
				$this->mo_dst_activity->og_url = $this->input->post('og_url',true);
				$this->mo_dst_activity->og_type = $this->input->post('og_type',true);
				$this->mo_dst_activity->og_title = $this->input->post('og_title',true);
				$this->mo_dst_activity->og_description = $this->input->post('og_description',true);

				$field_name = "ac_image";
				$path = "./assets/uploads/activity/";
				$allowed_types = "png|jpg|jpeg|gif";
				$img_name = $this->upload_file($field_name, $path, $allowed_types);
				if($img_name)
					$this->mo_dst_activity->ac_image = $img_name;
				else
					$this->mo_dst_activity->ac_image = $this->input->post('img_old');

					//og_image
					$field_name2 = "og_image";
					$path = "./assets/uploads/activity/";
					$allowed_types = "png|jpg|jpeg|gif";
					$img_name2 = $this->upload_file($field_name2, $path, $allowed_types);
					if($img_name2)
						$this->mo_dst_activity->og_image = $img_name2;
					else
						$this->mo_dst_activity->og_image = $this->input->post('og_image_old');

				$this->mo_dst_activity->updates();
				redirect('admin/dst_activity/');
			}
		}
		else{

			$this->mPageTitle = 'สร้างกิจกรรม';
			if($this->form_validation->run() == FALSE){

			}
			else{			
			$this->mo_dst_activity->ac_id = $this->input->post('ac_id');
				$this->mo_dst_activity->ac_topic = $this->input->post('ac_topic',true);
				$this->mo_dst_activity->ac_content = $this->input->post('ac_content');
				$this->mo_dst_activity->title_tag = $this->input->post('title_tag',true);
				$this->mo_dst_activity->meta_description = $this->input->post('meta_description',true);
				$this->mo_dst_activity->meta_keyword = $this->input->post('meta_keyword',true);
				$this->mo_dst_activity->og_url = $this->input->post('og_url',true);
				$this->mo_dst_activity->og_type = $this->input->post('og_type',true);
				$this->mo_dst_activity->og_title = $this->input->post('og_title',true);
				$this->mo_dst_activity->og_description = $this->input->post('og_description',true);
			
				$field_name = "ac_image";
				$path = "./assets/uploads/activity/";
				$allowed_types = "png|jpg|jpeg|gif";
				$img_name = $this->upload_file($field_name, $path, $allowed_types);
				if($img_name)
					$this->mo_dst_activity->ac_image = $img_name;
				else
					$this->mo_dst_activity->ac_image = $this->input->post('img_old');
				
					//og_image
					$field_name2 = "og_image";
					$path = "./assets/uploads/activity/";
					$allowed_types = "png|jpg|jpeg|gif";
					$img_name2 = $this->upload_file($field_name2, $path, $allowed_types);
					if($img_name2)
						$this->mo_dst_activity->og_image = $img_name2;
					else
						$this->mo_dst_activity->og_image = $this->input->post('og_image_old');
				
				$this->mo_dst_activity->inserts();
			
				redirect('admin/dst_activity/');
			}
		}



		$this->render('dst_activity/v_dst_activity_create');
	}

	public function deletes($id=NULL) {
		if($id!=NULL){
			$this->mo_dst_activity->ac_id = $id;
			$this->mo_dst_activity->deletes();
		}
		redirect('admin/dst_activity/');
	}

}
