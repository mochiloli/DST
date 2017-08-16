<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mo_dst_news','news');
		$this->load->model('mo_dst_exp','exp');
		$this->load->model('mo_dst_sacred','sacred');
		$this->load->model('mo_dst_activity','activity');
		$this->load->model('mo_dst_main_info','info');
		
		$this->load->library('pagination');
    }

    public function index($offset = 0) {
		$this->mViewData['info'] = $this->info->get_all();
		$config["base_url"] = base_url() .$this->uri->segment(1);
        $config["total_rows"] = $this->activity->record_count();
        $config["per_page"] = 8;
        $this->pagination->initialize($config); 
        $page =  $this->input->get("p");
        if(!empty($page) && $page!=0)
            $page = ($page-1)*8;
		
		$this->mViewData['data'] = $this->activity->paditionpage($config["per_page"], $page);
		$this->mViewData['sacred'] = $this->sacred->get_limit(4);
		$this->mViewData['title'] = $this->mViewData['info'][0]->title_tag;
		$this->mViewData['description'] = $this->mViewData['info'][0]->meta_description;
		$this->mViewData['keyword'] = $this->mViewData['info'][0]->meta_keyword;
		$this->mViewData['og_url'] = $this->mViewData['info'][0]->og_url;
		$this->mViewData['og_type'] = $this->mViewData['info'][0]->og_type;
		$this->mViewData['og_title'] = $this->mViewData['info'][0]->og_title;
		$this->mViewData['og_description'] = $this->mViewData['info'][0]->og_description;
		$this->mViewData['og_image'] = base_url('assets/img/') . $this->mViewData['info'][0]->og_image;
        
        $this->render('activity');
    }
	
	public function activity_detail($id) {
        $this->mViewData['activity'] = $this->activity->get_by_key($id);
        $this->mViewData['tag'] = $this->activity->get_all();
		$this->mViewData['info'] = $this->info->get_all();
		$this->mViewData['sacred'] = $this->sacred->get_limit(4);
		
		$this->mViewData['title'] = $this->mViewData['activity'][0]->title_tag;
		$this->mViewData['description'] = $this->mViewData['activity'][0]->meta_description;
		$this->mViewData['keyword'] = $this->mViewData['activity'][0]->meta_keyword;
		$this->mViewData['og_url'] = $this->mViewData['activity'][0]->og_url;
		$this->mViewData['og_type'] = $this->mViewData['activity'][0]->og_type;
		$this->mViewData['og_title'] = $this->mViewData['activity'][0]->og_title;
		$this->mViewData['og_description'] = $this->mViewData['activity'][0]->og_description;
		$this->mViewData['og_image'] = base_url('assets/img/') . $this->mViewData['activity'][0]->og_image;
		
        $this->render('activity_detail');
    }


}
