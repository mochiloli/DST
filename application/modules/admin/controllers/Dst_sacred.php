
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Dst_sacred extends Admin_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->library('form_builder');
			$this->load->library('form_validation');
			$this->load->model('mo_dst_sacred');						$this->load->model('mo_dst_main_info','info');
			$this->load->helper('url');
		}

		public function index() {

			$this->mPageTitle = 'วัตถุมงคลเสริมดวง';
			$this->mViewData['original'] = $this->mo_dst_sacred->get_all();						$this->mViewData['info'] = $this->info->get_all();			$this->mViewData['title'] = $this->mViewData['info'][0]->title_tag;			$this->mViewData['description'] = $this->mViewData['info'][0]->meta_description;			$this->mViewData['keyword'] = $this->mViewData['info'][0]->meta_keyword;			$this->mViewData['og_url'] = $this->mViewData['info'][0]->og_url;			$this->mViewData['og_type'] = $this->mViewData['info'][0]->og_type;			$this->mViewData['og_title'] = $this->mViewData['info'][0]->og_title;			$this->mViewData['og_description'] = $this->mViewData['info'][0]->og_description;			$this->mViewData['og_image'] = base_url('assets/img/') . $this->mViewData['info'][0]->og_image;
			$this->render('dst_sacred/v_dst_sacred');
		}

		public function create($id=NULL) {
			$this->mViewData['info'] = $this->info->get_all();			$this->mViewData['title'] = $this->mViewData['info'][0]->title_tag;			$this->mViewData['description'] = $this->mViewData['info'][0]->meta_description;			$this->mViewData['keyword'] = $this->mViewData['info'][0]->meta_keyword;			$this->mViewData['og_url'] = $this->mViewData['info'][0]->og_url;			$this->mViewData['og_type'] = $this->mViewData['info'][0]->og_type;			$this->mViewData['og_title'] = $this->mViewData['info'][0]->og_title;			$this->mViewData['og_description'] = $this->mViewData['info'][0]->og_description;			$this->mViewData['og_image'] = base_url('assets/img/') . $this->mViewData['info'][0]->og_image;
				$this->form_validation->set_rules('sacred_topic','หัวข้อ', 'required');
				$this->form_validation->set_rules('sacred_content','เนื้อหา', 'required');
				if($id!=NULL || !empty($this->input->post('sacred_id'))){
            $this->mPageTitle = 'แก้ไขรายละเอียด';
			if($this->form_validation->run() == FALSE){
				$this->mViewData['dst_sacred'] = $this->mo_dst_sacred->get_by_key($id);

				$this->mViewData['title'] = $this->mViewData['dst_sacred'][0]->title_tag;
				$this->mViewData['description'] = $this->mViewData['dst_sacred'][0]->meta_description;
				$this->mViewData['keyword'] = $this->mViewData['dst_sacred'][0]->meta_keyword;
				$this->mViewData['og_url'] = $this->mViewData['dst_sacred'][0]->og_url;
				$this->mViewData['og_type'] = $this->mViewData['dst_sacred'][0]->og_type;
				$this->mViewData['og_title'] = $this->mViewData['dst_sacred'][0]->og_title;
				$this->mViewData['og_description'] = $this->mViewData['dst_sacred'][0]->og_description;
				$this->mViewData['og_image'] = base_url('assets/uploads/news/') . $this->mViewData['dst_sacred'][0]->og_image;
			}
			else{ $this->mo_dst_sacred->sacred_id = $this->input->post('sacred_id');
				$this->mo_dst_sacred->sacred_topic = $this->input->post('sacred_topic',true);
				$this->mo_dst_sacred->sacred_content = $this->input->post('sacred_content');
				$this->mo_dst_sacred->title_tag = $this->input->post('title_tag',true);
				$this->mo_dst_sacred->meta_description = $this->input->post('meta_description',true);
				$this->mo_dst_sacred->meta_keyword = $this->input->post('meta_keyword',true);
				$this->mo_dst_sacred->og_url = $this->input->post('og_url',true);
				$this->mo_dst_sacred->og_type = $this->input->post('og_type',true);
				$this->mo_dst_sacred->og_title = $this->input->post('og_title',true);
				$this->mo_dst_sacred->og_description = $this->input->post('og_description',true);
				$this->mo_dst_sacred->og_image = $this->input->post('og_image');

				$field_name = "sacred_image";
				$path = "./assets/uploads/experience/";
				$allowed_types = "png|jpg|jpeg|gif";
				$img_name = $this->upload_file($field_name, $path, $allowed_types);
				if($img_name)
					$this->mo_dst_sacred->sacred_image = $img_name;
				else
					$this->mo_dst_sacred->sacred_image = $this->input->post('img_old');

					//og_image
					$field_name2 = "og_image";
					$path = "./assets/uploads/sacred/";
					$allowed_types = "png|jpg|jpeg|gif";
					$img_name2 = $this->upload_file($field_name2, $path, $allowed_types);
					if($img_name2)
						$this->mo_dst_sacred->og_image = $img_name2;
					else
						$this->mo_dst_sacred->og_image = $this->input->post('og_image_old');

				$this->mo_dst_sacred->updates();
				redirect('admin/dst_sacred/');
			}
		}
		else{ $this->mPageTitle = 'เพิ่มข้อมูลวัตถุมงคล';
			if($this->form_validation->run() == FALSE){

			}
			else{
				$this->mo_dst_sacred->sacred_id = $this->input->post('sacred_id');
				$this->mo_dst_sacred->sacred_topic = $this->input->post('sacred_topic',true);
				$this->mo_dst_sacred->sacred_content = $this->input->post('sacred_content');
				$this->mo_dst_sacred->title_tag = $this->input->post('title_tag',true);
				$this->mo_dst_sacred->meta_description = $this->input->post('meta_description',true);
				$this->mo_dst_sacred->meta_keyword = $this->input->post('meta_keyword',true);
				$this->mo_dst_sacred->og_url = $this->input->post('og_url',true);
				$this->mo_dst_sacred->og_type = $this->input->post('og_type',true);
				$this->mo_dst_sacred->og_title = $this->input->post('og_title',true);
				$this->mo_dst_sacred->og_description = $this->input->post('og_description',true);
				$this->mo_dst_sacred->og_image = $this->input->post('og_image');
				$field_name = "sacred_image";
				$path = "./assets/uploads/experience/";
				$allowed_types = "png|jpg|jpeg|gif";
				$img_name = $this->upload_file($field_name, $path, $allowed_types);
				if($img_name)
					$this->mo_dst_sacred->sacred_image = $img_name;
				else
					$this->mo_dst_sacred->sacred_image = $this->input->post('img_old');

					//og_image
					$field_name2 = "og_image";
					$path = "./assets/uploads/sacred/";
					$allowed_types = "png|jpg|jpeg|gif";
					$img_name2 = $this->upload_file($field_name2, $path, $allowed_types);
					if($img_name2)
						$this->mo_dst_sacred->og_image = $img_name2;
					else
						$this->mo_dst_sacred->og_image = $this->input->post('og_image_old');

				$this->mo_dst_sacred->inserts();
				redirect('admin/dst_sacred/');
			}
		}



		$this->render('dst_sacred/v_dst_sacred_create');
	}

	public function deletes($id=NULL) {
		if($id!=NULL){
			$this->mo_dst_sacred->sacred_id = $id;
			$this->mo_dst_sacred->deletes();
		}
		redirect('admin/dst_sacred/');
	}

}
