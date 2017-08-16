
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class C_matching extends MY_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->library('form_builder');
			$this->load->library('form_validation');
			$this->load->model('mo_dst_match_number');
			$this->load->model('mo_dst_base_number','base');
			$this->load->model('mo_dst_news','news');
			$this->load->model('mo_dst_exp','exp');
			$this->load->model('mo_dst_sacred','sacred');
			$this->load->model('mo_dst_activity','activity');
			$this->load->model('mo_dst_user');						$this->load->model('mo_dst_main_info','info');
			
			$this->load->helper('url');
		}

		public function process() {						$this->mViewData['info'] = $this->info->get_all();							$this->mViewData['title'] = $this->mViewData['info'][0]->title_tag;				$this->mViewData['description'] = $this->mViewData['info'][0]->meta_description;				$this->mViewData['keyword'] = $this->mViewData['info'][0]->meta_keyword;				$this->mViewData['og_url'] = $this->mViewData['info'][0]->og_url;				$this->mViewData['og_type'] = $this->mViewData['info'][0]->og_type;				$this->mViewData['og_title'] = $this->mViewData['info'][0]->og_title;				$this->mViewData['og_description'] = $this->mViewData['info'][0]->og_description;				$this->mViewData['og_image'] = base_url('assets/img/') . $this->mViewData['info'][0]->og_image;
			$this->mViewData['prophecy'] = $this->base->get_all();
			$this->mViewData['sacred'] = $this->sacred->get_limit(4);
			$number = $this->input->get('number');
			$length = count($number);
			$this->mViewData['number'] = "";
			for($i=0; $i < 10; $i++)
    	{
      	//echo $i." ".$number[$i]."<br>";
				$this->mViewData['number'] .= $number[$i];
				$this->mViewData['snum'][$i] = $number[$i];
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
				$this->mViewData['digit'][$j] = $strNum;
				$this->mViewData['result'][$j] = $this->mo_dst_match_number->get_by_number($strNum);
				//echo "<br>";
			}

			$name = "";
			$name = $this->input->get('fname')." ".$this->input->get('lname');
			$this->mo_dst_user->user_name = $name;
			$this->mo_dst_user->user_tel = $this->mViewData['number'];

			$this->mo_dst_user->inserts();
			
			$this->mPageTitle = 'ผลการทำนาย';
			$this->render('phone_calculate');
		}


}
