<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller {

    public function index() {
        $this->load->model('user_model', 'users');
        $this->mViewData['count'] = array(
            'users' => $this->users->count_all(),
        );
		
		$this->load->model('mo_dst_main_info','info');
		$this->mViewData['info'] = $this->info->get_all();
			$this->mViewData['title'] = $this->mViewData['info'][0]->title_tag;
			$this->mViewData['description'] = $this->mViewData['info'][0]->meta_description;
			$this->mViewData['keyword'] = $this->mViewData['info'][0]->meta_keyword;
			$this->mViewData['og_url'] = $this->mViewData['info'][0]->og_url;
			$this->mViewData['og_type'] = $this->mViewData['info'][0]->og_type;
			$this->mViewData['og_title'] = $this->mViewData['info'][0]->og_title;
			$this->mViewData['og_description'] = $this->mViewData['info'][0]->og_description;
			$this->mViewData['og_image'] = base_url('assets/img/') . $this->mViewData['info'][0]->og_image;
		
		
        $this->render('home');
    }

}
