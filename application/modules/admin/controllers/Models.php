<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Models extends Admin_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_builder');
		$this->load->library('form_validation');
		$this->load->model('mo_demo_blog_categories');
		$this->load->helper('url');
    }
	
	public function index() {

		$this->load->library('form_validation');
        $this->mPageTitle = 'Models';
		$this->mViewData['data_cat'] = $this->mo_demo_blog_categories->get_all();
		$form = $this->form_builder->create_form();
        $this->mViewData['form'] = $form;
        $this->render('models/v_models');
    }

    public function create($id=NULL) {

		$this->load->library('form_validation');
		$this->form_validation->set_rules('pos','Pos', 'required');
		$this->form_validation->set_rules('title','Title', 'required');
		$this->mViewData['demo_blog_categories'] = "";
		
		if($id!=NULL || !empty($this->input->post('id'))){
			if($this->form_validation->run() == FALSE){
				$this->mViewData['demo_blog_categories'] = $this->mo_demo_blog_categories->get_by_key($id);
			}
			else{
				$this->mo_demo_blog_categories->pos = $this->input->post('pos');
				$this->mo_demo_blog_categories->title = $this->input->post('title');
				$this->mo_demo_blog_categories->id = $this->input->post('id');
				$this->mo_demo_blog_categories->updates();
				redirect('admin/models/', 'refresh');
			}
		}
		else{
			if($this->form_validation->run() == FALSE){
				
			}
			else{
				$this->mo_demo_blog_categories->pos = $this->input->post('pos');
				$this->mo_demo_blog_categories->title = $this->input->post('title');
				$this->mo_demo_blog_categories->inserts();
				redirect('admin/models/', 'refresh');
			}
		}

        $this->mPageTitle = 'Create Models';
		
		$form = $this->form_builder->create_form();
        $this->mViewData['form'] = $form;
        $this->render('models/v_models_create');
    }
	
	public function deletes($id=NULL) {
		if($id!=NULL){
			$this->mo_demo_blog_categories->id = $id;
			$this->mo_demo_blog_categories->deletes();
		}
		redirect('admin/models/', 'refresh');
	}

}
