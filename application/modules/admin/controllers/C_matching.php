
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class C_matching extends Admin_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->library('form_builder');
			$this->load->library('form_validation');
			$this->load->model('mo_dst_match_number');
			$this->load->model('mo_dst_base_number','base');
			$this->load->helper('url');
		}

		public function index2() {

			$this->mPageTitle = 'จับคู่ตัวเลข';
			$this->mViewData['original'] = $this->mo_dst_match_number->get_all();
			$this->render('v_matching/v_matching');
		}

		public function index() {
			$amount = $this->input->get('amount');
			$this->mViewData['amount'] = 1;

			$this->mPageTitle = 'จับคู่ตัวเลข';
			$this->render('v_matching/v_matching_create');
		}

		public function process() {
			$this->mViewData['prophecy'] = $this->base->get_all();
			$number = $this->input->get('number');
			$length = count($number);
			$this->mViewData['number'] = "";
			for($i=0; $i < 10; $i++)
    	{
      	//echo $i." ".$number[$i]."<br>";
				$this->mViewData['number'] .= $number[$i];
    	}
			//echo "num = ".$this->mViewData['number']."<br>";
			foreach($this->mViewData['prophecy'] as $key => $row) {
				//echo $row->base_number."<br>";
				$len = strlen($row->base_number);
				$str = $row->base_number;
				for($i=0;$i<$len;$i++){
					$pos = strpos($str,',');
					if($len == 1) {
						$base[$key][$i] = $str;
					}
					if($i>0 && $pos!=1) {
						//echo "I in if = ".$i."<br>";
						$base[$key][$i] = $str;
						//echo "base[".$key."][".$i."] = ".$base[$key][$i]."<br>";
						break;
					}
					//echo "i = ".$i." pos = ".$pos."<br>";
					$base[$key][$i] = substr($str,0,$pos);
					$str = substr($str,$pos+1);
					//echo "base[".$key."][".$i."] = ".$base[$key][$i]."<br>";
					//echo "str = ".$str."<br>";
				}
				//echo "<br>";
			}
			//echo "-----".$base[6][2]."<br>";
			//echo "key = ".$key." i = ".$i."<br>";
			
			$first = count($base);
			$strNum = '';
			for($j=0;$j<$first;$j++){
			$strNum = '';
				for($k=0;$k<count($base[$j]);$k++){
					//echo "[".$j."] "."[".$k."]".$number[$base[$j][$k]]."<br>";
					//echo $number[$base[$j][$k]];
					$strNum .= $number[$base[$j][$k]];
					//echo $this->mViewData['result'][$j]->mn_number;
					//echo "<br>";
				}
				//echo $strNum."<br>";
				$this->mViewData['result'][$j] = $this->mo_dst_match_number->get_by_number($strNum);
				//echo "<br>";
			}

			
			
			//die();
			//format xxx-abcdefg
			/*
			$ab = $number[3].$number[4];
			$bc = $number[4].$number[5];
			$cd = $number[5].$number[6];
			$de = $number[6].$number[7];
			$ef = $number[7].$number[8];
			$fg = $number[8].$number[9];*/

			/*echo "<br>NUMBER<br>";
			echo $ab;
			echo "<br>".$bc;
			echo "<br>".$cd;
			echo "<br>".$de;
			echo "<br>".$ef;
			echo "<br>".$fg;*/
			/*
			$this->mViewData['result'][0] = $this->mo_dst_match_number->get_by_number($ab);
			$this->mViewData['result'][1] = $this->mo_dst_match_number->get_by_number($bc);
			$this->mViewData['result'][2] = $this->mo_dst_match_number->get_by_number($cd);
			$this->mViewData['result'][3] = $this->mo_dst_match_number->get_by_number($de);
			$this->mViewData['result'][4] = $this->mo_dst_match_number->get_by_number($ef);
			$this->mViewData['result'][5] = $this->mo_dst_match_number->get_by_number($fg);
			*/
			$this->mPageTitle = 'ผลการทำนาย';
			$this->render('v_matching/v_result');
		}

		public function create($id=NULL) {

				$this->form_validation->set_rules('mn_number','Mn_number', 'required');
				$this->form_validation->set_rules('mn_data','Mn_data', 'required');
				$this->form_validation->set_rules('mn_keyword','Mn_keyword', 'required');
				if($id!=NULL || !empty($this->input->post('mn_id'))){
            $this->mPageTitle = 'แก้ไขข้อมูลคู่ตัวเลข';
			if($this->form_validation->run() == FALSE){
				$this->mViewData['dst_match_number'] = $this->mo_dst_match_number->get_by_key($id);
			}
			else{ $this->mo_dst_match_number->mn_id = $this->input->post('mn_id');
				$this->mo_dst_match_number->mn_number = $this->input->post('mn_number');
				$this->mo_dst_match_number->mn_data = $this->input->post('mn_data');
				$this->mo_dst_match_number->mn_keyword = $this->input->post('mn_keyword');
				$this->mo_dst_match_number->updates();
				redirect('admin/dst_match_number/');
			}
		}
		else{ $this->mPageTitle = 'เพิ่มคู่ตัวเลข';
			if($this->form_validation->run() == FALSE){

			}
			else{
			$this->mo_dst_match_number->mn_id = $this->input->post('mn_id');
				$this->mo_dst_match_number->mn_number = $this->input->post('mn_number');
				$this->mo_dst_match_number->mn_data = $this->input->post('mn_data');
				$this->mo_dst_match_number->mn_keyword = $this->input->post('mn_keyword');

				$this->mo_dst_match_number->inserts();
				redirect('admin/dst_match_number/');
			}
		}



		$this->render('dst_match_number/v_dst_match_number_create');
	}

	public function deletes($id=NULL) {
		if($id!=NULL){
			$this->mo_dst_match_number->mn_id = $id;
			$this->mo_dst_match_number->deletes();
		}
		redirect('admin/dst_match_number/');
	}

}
