<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mo_dst_news','news');
		$this->load->model('mo_dst_exp','exp');
		$this->load->model('mo_dst_sacred','sacred');
		$this->load->model('mo_dst_activity','activity');
		$this->load->model('mo_dst_main_info','info');
    }

    public function index() {
        $this->mViewData['news'] = $this->news->get_limit(4);
        $this->mViewData['exp'] = $this->exp->get_limit(4);
        $this->mViewData['sacred'] = $this->sacred->get_limit(4);
        $this->mViewData['activity'] = $this->activity->get_limit(4);
        $this->mViewData['info'] = $this->info->get_all();
		
		$this->mViewData['title'] = $this->mViewData['info'][0]->title_tag;
		$this->mViewData['description'] = $this->mViewData['info'][0]->meta_description;
		$this->mViewData['keyword'] = $this->mViewData['info'][0]->meta_keyword;
		$this->mViewData['og_url'] = $this->mViewData['info'][0]->og_url;
		$this->mViewData['og_type'] = $this->mViewData['info'][0]->og_type;
		$this->mViewData['og_title'] = $this->mViewData['info'][0]->og_title;
		$this->mViewData['og_description'] = $this->mViewData['info'][0]->og_description;
		$this->mViewData['og_image'] = base_url('assets/img/') . $this->mViewData['info'][0]->og_image;
		
        
        $this->render('index');
    }

    public function information_detail($id) {
        $this->mViewData['information'] = $this->mo_information->get_by_key($id);
        $this->render('information-detail');
    }

}
