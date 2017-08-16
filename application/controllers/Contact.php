<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mo_dst_news','news');
		$this->load->model('mo_dst_exp','exp');
		$this->load->model('mo_dst_sacred','sacred');
		$this->load->model('mo_dst_activity','activity');
		$this->load->model('mo_dst_contact','contact');
		$this->load->model('mo_dst_main_info','info');
		
		$this->load->library('form_validation');
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
		
        
        $this->render('contact');
    }
	
	public function insert() {
		if(isset($_POST['g-recaptcha-response'])) {
			$captcha = $_POST['g-recaptcha-response'];
			if(!$captcha){

				echo "<script>alert('if กรุณายืนยันตัวตนด้วย captcha');</script>";
			}else{
				//echo "<script>alert('Success1');</script>";
			$this->contact->contact_topic = $this->input->post('topic',true);
			$this->contact->contact_name = $this->input->post('name',true);
			$this->contact->contact_email = $this->input->post('email',true);
			$this->contact->contact_tel = $this->input->post('tel',true);
			$this->contact->contact_content = $this->input->post('content',true);
			$this->contact->contact_date = date("Y-m-d");
		
			$this->contact->inserts();
        
			echo "<script>alert('ขอบคุณ เราได้บันทึกข้อความของคุณไว้แล้ว');</script>";
			//redirect('contact');
			}
		}else{
			echo "<script>alert('กรุณายืนยันตัวตนด้วย captcha');</script>";
		}
		redirect('contact','refresh');
    }

}
