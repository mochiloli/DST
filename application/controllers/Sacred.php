<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sacred extends MY_Controller {

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
        $config["total_rows"] = $this->sacred->record_count();
        $config["per_page"] = 8;
        $this->pagination->initialize($config); 
        $page =  $this->input->get("p");
        if(!empty($page) && $page!=0)
            $page = ($page-1)*8;
		
		$this->mViewData['data'] = $this->sacred->paditionpage($config["per_page"], $page);
		$this->mViewData['sacred'] = $this->sacred->get_limit(4);
		
		$this->mViewData['title'] = $this->mViewData['info'][0]->title_tag;
		$this->mViewData['description'] = $this->mViewData['info'][0]->meta_description;
		$this->mViewData['keyword'] = $this->mViewData['info'][0]->meta_keyword;
		$this->mViewData['og_url'] = $this->mViewData['info'][0]->og_url;
		$this->mViewData['og_type'] = $this->mViewData['info'][0]->og_type;
		$this->mViewData['og_title'] = $this->mViewData['info'][0]->og_title;
		$this->mViewData['og_description'] = $this->mViewData['info'][0]->og_description;
		$this->mViewData['og_image'] = base_url('assets/img/') . $this->mViewData['info'][0]->og_image;
        
        $this->render('amulet');
    }
	
	public function amulet_detail($id) {
        $this->mViewData['sacred'] = $this->sacred->get_by_key($id);
		$this->mViewData['tag'] = $this->sacred->get_all();
		$this->mViewData['info'] = $this->info->get_all();
		//$this->mViewData['sacred'] = $this->sacred->get_limit(4);
		
		$this->mViewData['title'] = $this->mViewData['sacred'][0]->title_tag;
		$this->mViewData['description'] = $this->mViewData['sacred'][0]->meta_description;
		$this->mViewData['keyword'] = $this->mViewData['sacred'][0]->meta_keyword;
		$this->mViewData['og_url'] = $this->mViewData['sacred'][0]->og_url;
		$this->mViewData['og_type'] = $this->mViewData['sacred'][0]->og_type;
		$this->mViewData['og_title'] = $this->mViewData['sacred'][0]->og_title;
		$this->mViewData['og_description'] = $this->mViewData['sacred'][0]->og_description;
		$this->mViewData['og_image'] = base_url('assets/img/') . $this->mViewData['sacred'][0]->og_image;
		
        $this->render('amulet_detail');
    }


}
