
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Dst_contact extends Admin_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->library('form_builder');
			$this->load->library('form_validation');
			$this->load->model('mo_dst_contact');						$this->load->model('mo_dst_main_info','info');
			$this->load->helper('url');
		}
		
		public function index() {
                
			$this->mPageTitle = 'สอบถาม/ข้อเสนอแนะ';
			$this->mViewData['original'] = $this->mo_dst_contact->get_all();						$this->mViewData['info'] = $this->info->get_all();			$this->mViewData['title'] = $this->mViewData['info'][0]->title_tag;			$this->mViewData['description'] = $this->mViewData['info'][0]->meta_description;			$this->mViewData['keyword'] = $this->mViewData['info'][0]->meta_keyword;			$this->mViewData['og_url'] = $this->mViewData['info'][0]->og_url;			$this->mViewData['og_type'] = $this->mViewData['info'][0]->og_type;			$this->mViewData['og_title'] = $this->mViewData['info'][0]->og_title;			$this->mViewData['og_description'] = $this->mViewData['info'][0]->og_description;			$this->mViewData['og_image'] = base_url('assets/img/') . $this->mViewData['info'][0]->og_image;
			$this->render('dst_contact/v_dst_contact');
		}

		public function create($id=NULL) {
			$this->mViewData['info'] = $this->info->get_all();			$this->mViewData['title'] = $this->mViewData['info'][0]->title_tag;			$this->mViewData['description'] = $this->mViewData['info'][0]->meta_description;			$this->mViewData['keyword'] = $this->mViewData['info'][0]->meta_keyword;			$this->mViewData['og_url'] = $this->mViewData['info'][0]->og_url;			$this->mViewData['og_type'] = $this->mViewData['info'][0]->og_type;			$this->mViewData['og_title'] = $this->mViewData['info'][0]->og_title;			$this->mViewData['og_description'] = $this->mViewData['info'][0]->og_description;			$this->mViewData['og_image'] = base_url('assets/img/') . $this->mViewData['info'][0]->og_image;
				$this->form_validation->set_rules('contact_topic','Contact_topic', 'required');				$this->form_validation->set_rules('contact_name','Contact_name', 'required');				$this->form_validation->set_rules('contact_email','Contact_email', 'required');				$this->form_validation->set_rules('contact_tel','Contact_tel', 'required');				$this->form_validation->set_rules('contact_content','Contact_content', 'required'); 				if($id!=NULL || !empty($this->input->post('contact_id'))){
            $this->mPageTitle = 'Update Dst_contact';
			if($this->form_validation->run() == FALSE){
				$this->mViewData['dst_contact'] = $this->mo_dst_contact->get_by_key($id);
			}
			else{ $this->mo_dst_contact->contact_id = $this->input->post('contact_id'); 			$this->mo_dst_contact->contact_topic = $this->input->post('contact_topic',true); 			$this->mo_dst_contact->contact_name = $this->input->post('contact_name',true); 			$this->mo_dst_contact->contact_email = $this->input->post('contact_email',true); 			$this->mo_dst_contact->contact_tel = $this->input->post('contact_tel',true); 			$this->mo_dst_contact->contact_content = $this->input->post('contact_content');  			$this->mo_dst_contact->updates();
				redirect('admin/dst_contact/');
			}
		}
		else{ $this->mPageTitle = 'Create Dst_contact';
			if($this->form_validation->run() == FALSE){
				
			}
			else{
			$this->mo_dst_contact->contact_id = $this->input->post('contact_id');
				$this->mo_dst_contact->contact_topic = $this->input->post('contact_topic',true);
				$this->mo_dst_contact->contact_name = $this->input->post('contact_name',true);
				$this->mo_dst_contact->contact_email = $this->input->post('contact_email',true);
				$this->mo_dst_contact->contact_tel = $this->input->post('contact_tel',true);
				$this->mo_dst_contact->contact_content = $this->input->post('contact_content');
				
				$this->mo_dst_contact->inserts();
				redirect('admin/dst_contact/');
			}
		}

		
		
		$this->render('dst_contact/v_dst_contact_create');
	}
	
	public function deletes($id=NULL) {
		if($id!=NULL){
			$this->mo_dst_contact->contact_id = $id;
			$this->mo_dst_contact->deletes();
		}
		redirect('admin/dst_contact/');
	}

}
						