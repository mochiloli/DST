<?php	defined('BASEPATH') OR exit('No direct script access allowed');	
class Dst_exp extends Admin_Controller {		
public function __construct() {			
parent::__construct();			
$this->load->library('form_builder');			
$this->load->library('form_validation');			
$this->load->model('mo_dst_exp');						
$this->load->model('mo_dst_main_info','info');			
$this->load->helper('url');		
}		

public function index() {			
$this->mPageTitle = 'รายละเอียดประสบการณ์';			
$this->mViewData['original'] = $this->mo_dst_exp->get_all();						
$this->mViewData['info'] = $this->info->get_all();			
$this->mViewData['title'] = $this->mViewData['info'][0]->title_tag;			
$this->mViewData['description'] = $this->mViewData['info'][0]->meta_description;			
$this->mViewData['keyword'] = $this->mViewData['info'][0]->meta_keyword;			
$this->mViewData['og_url'] = $this->mViewData['info'][0]->og_url;			
$this->mViewData['og_type'] = $this->mViewData['info'][0]->og_type;			
$this->mViewData['og_title'] = $this->mViewData['info'][0]->og_title;			
$this->mViewData['og_description'] = $this->mViewData['info'][0]->og_description;			
$this->mViewData['og_image'] = base_url('assets/img/') . $this->mViewData['info'][0]->og_image;			
$this->render('dst_exp/v_dst_exp');		
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
$this->form_validation->set_rules('exp_topic','Exp_topic', 'required');				
$this->form_validation->set_rules('exp_content','Exp_content', 'required');				
if($id!=NULL || !empty($this->input->post('exp_id'))){            
$this->mPageTitle = 'แก้ไขรายละเอียดประสบการณ์';			
if($this->form_validation->run() == FALSE){				
$this->mViewData['dst_exp'] = $this->mo_dst_exp->get_by_key($id);				
$this->mViewData['title'] = $this->mViewData['dst_exp'][0]->title_tag;				
$this->mViewData['description'] = $this->mViewData['dst_exp'][0]->meta_description;				
$this->mViewData['keyword'] = $this->mViewData['dst_exp'][0]->meta_keyword;				
$this->mViewData['og_url'] = $this->mViewData['dst_exp'][0]->og_url;				
$this->mViewData['og_type'] = $this->mViewData['dst_exp'][0]->og_type;				
$this->mViewData['og_title'] = $this->mViewData['dst_exp'][0]->og_title;				
$this->mViewData['og_description'] = $this->mViewData['dst_exp'][0]->og_description;				
$this->mViewData['og_image'] = base_url('assets/uploads/news/') . $this->mViewData['dst_exp'][0]->og_image;			
}			
else{ $this->mo_dst_exp->exp_id = $this->input->post('exp_id',true);				
$this->mo_dst_exp->exp_topic = $this->input->post('exp_topic',true);				
$this->mo_dst_exp->exp_content = $this->input->post('exp_content');				
$this->mo_dst_exp->title_tag = $this->input->post('title_tag',true);				
$this->mo_dst_exp->meta_description = $this->input->post('meta_description',true);				
$this->mo_dst_exp->meta_keyword = $this->input->post('meta_keyword',true);				
$this->mo_dst_exp->og_url = $this->input->post('og_url',true);				
$this->mo_dst_exp->og_type = $this->input->post('og_type',true);				
$this->mo_dst_exp->og_title = $this->input->post('og_title',true);				
$this->mo_dst_exp->og_description = $this->input->post('og_description',true);				
$this->mo_dst_exp->og_image = $this->input->post('og_image');		
//news_image				
$field_name = "exp_image";				
$path = "./assets/uploads/experience/";				
$allowed_types = "png|jpg|jpeg|gif";				
$img_name = $this->upload_file($field_name, $path, $allowed_types);				
if($img_name)					
	$this->mo_dst_exp->exp_image = $img_name;				
else					
	$this->mo_dst_exp->exp_image = $this->input->post('img_old');				
//og_image				
$field_name2 = "og_image";				
$path = "./assets/uploads/experience/";				
$allowed_types = "png|jpg|jpeg|gif";				
$img_name2 = $this->upload_file($field_name2, $path, $allowed_types);				
if($img_name2)					
	$this->mo_dst_exp->og_image = $img_name2;				
else					
	$this->mo_dst_exp->og_image = $this->input->post('og_image_old');				
$this->mo_dst_exp->updates();				
redirect('admin/dst_exp/');			
}		
}		
else{ $this->mPageTitle = 'บอกเล่าประสบการณ์';			
if($this->form_validation->run() == FALSE){			}			
else{			
$this->mo_dst_exp->exp_id = $this->input->post('exp_id');				
$this->mo_dst_exp->exp_topic = $this->input->post('exp_topic',true);				
$this->mo_dst_exp->exp_content = $this->input->post('exp_content');				
$this->mo_dst_exp->title_tag = $this->input->post('title_tag',true);				
$this->mo_dst_exp->meta_description = $this->input->post('meta_description',true);				
$this->mo_dst_exp->meta_keyword = $this->input->post('meta_keyword',true);				
$this->mo_dst_exp->og_url = $this->input->post('og_url',true);				
$this->mo_dst_exp->og_type = $this->input->post('og_type',true);				
$this->mo_dst_exp->og_title = $this->input->post('og_title',true);				
$this->mo_dst_exp->og_description = $this->input->post('og_description',true);				
$this->mo_dst_exp->og_image = $this->input->post('og_image');		
//news_image				
$field_name = "exp_image";				
$path = "./assets/uploads/experience/";				
$allowed_types = "png|jpg|jpeg|gif";				
$img_name = $this->upload_file($field_name, $path, $allowed_types);				
if($img_name)					
	$this->mo_dst_exp->exp_image = $img_name;				
else					
	$this->mo_dst_exp->exp_image = $this->input->post('img_old');				
//og_image				
$field_name2 = "og_image";				
$path = "./assets/uploads/experience/";				
$allowed_types = "png|jpg|jpeg|gif";				
$img_name2 = $this->upload_file($field_name2, $path, $allowed_types);				
if($img_name2)					
	$this->mo_dst_exp->og_image = $img_name2;				
else					
	$this->mo_dst_exp->og_image = $this->input->post('og_image_old');				
$this->mo_dst_exp->inserts();				
redirect('admin/dst_exp/');			
}		
}		
$this->render('dst_exp/v_dst_exp_create');	
}	
public function deletes($id=NULL) {		
if($id!=NULL){			
$this->mo_dst_exp->exp_id = $id;			
$this->mo_dst_exp->deletes();		
}		
redirect('admin/dst_exp/');	
}
}