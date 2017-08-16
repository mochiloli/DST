
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Dst_news extends Admin_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->library('form_builder');
			$this->load->library('form_validation');
			$this->load->model('mo_dst_news');
			$this->load->model('mo_dst_main_info','info');
			$this->load->helper('url');
		}

		public function index() {

			$this->mPageTitle = 'ข่าวสาร';
			$this->mViewData['original'] = $this->mo_dst_news->get_all();
			
			$this->mViewData['info'] = $this->info->get_all();
			$this->mViewData['title'] = $this->mViewData['info'][0]->title_tag;
			$this->mViewData['description'] = $this->mViewData['info'][0]->meta_description;
			$this->mViewData['keyword'] = $this->mViewData['info'][0]->meta_keyword;
			$this->mViewData['og_url'] = $this->mViewData['info'][0]->og_url;
			$this->mViewData['og_type'] = $this->mViewData['info'][0]->og_type;
			$this->mViewData['og_title'] = $this->mViewData['info'][0]->og_title;
			$this->mViewData['og_description'] = $this->mViewData['info'][0]->og_description;
			$this->mViewData['og_image'] = base_url('assets/img/') . $this->mViewData['info'][0]->og_image;
			
			$this->render('dst_news/v_dst_news');
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
			
			$this->mPageTitle = 'ข่าวสาร';
			$this->mViewData['original'] = $this->mo_dst_news->get_all();

				$this->form_validation->set_rules('news_topic','News_topic', 'required');
				$this->form_validation->set_rules('news_content','News_content', 'required');

				 if($id!=NULL || !empty($this->input->post('news_id'))){
            $this->mPageTitle = 'แก้ไขข้อมูล';
			if($this->form_validation->run() == FALSE){
				$this->mViewData['dst_news'] = $this->mo_dst_news->get_by_key($id);

				$this->mViewData['title'] = $this->mViewData['dst_news'][0]->title_tag;
				$this->mViewData['description'] = $this->mViewData['dst_news'][0]->meta_description;
				$this->mViewData['keyword'] = $this->mViewData['dst_news'][0]->meta_keyword;
				$this->mViewData['og_url'] = $this->mViewData['dst_news'][0]->og_url;
				$this->mViewData['og_type'] = $this->mViewData['dst_news'][0]->og_type;
				$this->mViewData['og_title'] = $this->mViewData['dst_news'][0]->og_title;
				$this->mViewData['og_description'] = $this->mViewData['dst_news'][0]->og_description;
				$this->mViewData['og_image'] = base_url('assets/uploads/news/') . $this->mViewData['dst_news'][0]->og_image;
			}
			else{

				$field_name = "news_image";
				$path = "./assets/uploads/news/";
				$allowed_types = "png|jpg|jpeg|gif";
				$img_name = $this->upload_file($field_name, $path, $allowed_types);
				$this->mo_dst_news->news_id = $this->input->post('news_id');
				$this->mo_dst_news->news_topic = $this->input->post('news_topic',true);
				$this->mo_dst_news->news_content = $this->input->post('news_content');
				$this->mo_dst_news->title_tag = $this->input->post('title_tag',true);
				$this->mo_dst_news->meta_description = $this->input->post('meta_description',true);
				$this->mo_dst_news->meta_keyword = $this->input->post('meta_keyword',true);
				$this->mo_dst_news->og_url = $this->input->post('og_url',true);
				$this->mo_dst_news->og_type = $this->input->post('og_type',true);
				$this->mo_dst_news->og_title = $this->input->post('og_title',true);
				$this->mo_dst_news->og_description = $this->input->post('og_description',true);
				$this->mo_dst_news->og_image = $this->input->post('og_image');

				//news_image
				$field_name = "news_image";
				$path = "./assets/uploads/news/";
				$allowed_types = "png|jpg|jpeg|gif";
				$img_name = $this->upload_file($field_name, $path, $allowed_types);
				if($img_name)
					$this->mo_dst_news->news_image = $img_name;
				else
					$this->mo_dst_news->news_image = $this->input->post('img_old');

					//og_image
					$field_name2 = "og_image";
					$path = "./assets/uploads/news/";
					$allowed_types = "png|jpg|jpeg|gif";
					$img_name2 = $this->upload_file($field_name2, $path, $allowed_types);
					if($img_name2)
						$this->mo_dst_news->og_image = $img_name2;
					else
						$this->mo_dst_news->og_image = $this->input->post('og_image_old');
				$this->mo_dst_news->updates();
				redirect('admin/dst_news/');
			}
		}
		else{ $this->mPageTitle = 'เพิ่มข่าวสาร';
			if($this->form_validation->run() == FALSE){

			}
			else{
			$this->mo_dst_news->news_id = $this->input->post('news_id');
				$this->mo_dst_news->news_topic = $this->input->post('news_topic',true);
				$this->mo_dst_news->news_content = $this->input->post('news_content');
				$this->mo_dst_news->title_tag = $this->input->post('title_tag');
				$this->mo_dst_news->meta_description = $this->input->post('meta_description',true);
				$this->mo_dst_news->meta_keyword = $this->input->post('meta_keyword',true);
				$this->mo_dst_news->og_url = $this->input->post('og_url',true);
				$this->mo_dst_news->og_type = $this->input->post('og_type',true);
				$this->mo_dst_news->og_title = $this->input->post('og_title',true);
				$this->mo_dst_news->og_description = $this->input->post('og_description',true);
				$this->mo_dst_news->og_image = $this->input->post('og_image');

				//news_image
				$field_name = "news_image";
				$path = "./assets/uploads/news/";
				$allowed_types = "png|jpg|jpeg|gif";
				$img_name = $this->upload_file($field_name, $path, $allowed_types);
				if($img_name)
					$this->mo_dst_news->news_image = $img_name;
				else
					$this->mo_dst_news->news_image = $this->input->post('img_old');

					//og_image
					$field_name2 = "og_image";
					$path = "./assets/uploads/news/";
					$allowed_types = "png|jpg|jpeg|gif";
					$img_name2 = $this->upload_file($field_name2, $path, $allowed_types);
					if($img_name2)
						$this->mo_dst_news->og_image = $img_name2;
					else
						$this->mo_dst_news->og_image = $this->input->post('og_image_old');

				$this->mo_dst_news->inserts();
				redirect('admin/dst_news/');
			}
		}



		$this->render('dst_news/v_dst_news_create');
	}

	public function deletes($id=NULL) {
		if($id!=NULL){
			$this->mo_dst_news->news_id = $id;
			$this->mo_dst_news->deletes();
		}
		redirect('admin/dst_news/');
	}

}
