<?php class Da_dst_main_info extends MY_Model { public $img_logo; public $content_under_logo; public $url_facebook; public $condition_content; public $title_tag; public $meta_description; public $meta_keyword; public $og_url; public $og_type; public $og_title; public $og_description; public $og_image;  public function inserts() {  $this->db->set('img_logo', $this->img_logo);  $this->db->set('content_under_logo', $this->content_under_logo);  $this->db->set('url_facebook', $this->url_facebook);  $this->db->set('condition_content', $this->condition_content);  $this->db->set('title_tag', $this->title_tag);  $this->db->set('meta_description', $this->meta_description);  $this->db->set('meta_keyword', $this->meta_keyword);  $this->db->set('og_url', $this->og_url);  $this->db->set('og_type', $this->og_type);  $this->db->set('og_title', $this->og_title);  $this->db->set('og_description', $this->og_description);  $this->db->set('og_image', $this->og_image);  $this->db->from('duangsettee_dst_main_info'); return $this->db->insert(); } public function inserts_array($data=null) {
				$this->db->set($data);
				$this->db->from('duangsettee_dst_main_info');
				return $this->db->insert();
			}
			public function updates_array($data=null,$key=null) {
				return $this->db->update('duangsettee_dst_main_info', $data, $key);
			} 			public function updates() {  			$this->db->set('img_logo', $this->img_logo);  			$this->db->set('content_under_logo', $this->content_under_logo);  			$this->db->set('url_facebook', $this->url_facebook);  			$this->db->set('condition_content', $this->condition_content);  			$this->db->set('title_tag', $this->title_tag);  			$this->db->set('meta_description', $this->meta_description);  			$this->db->set('meta_keyword', $this->meta_keyword);  			$this->db->set('og_url', $this->og_url);  			$this->db->set('og_type', $this->og_type);  			$this->db->set('og_title', $this->og_title);  			$this->db->set('og_description', $this->og_description);  			$this->db->set('og_image', $this->og_image);  			$this->db->from('duangsettee_dst_main_info');
		$this->db->where('id', $this->id);
		return $this->db->update(); }

			public function deletes() {
				$this->db->from('duangsettee_dst_main_info');
				$this->db->where('id', $this->id);
				$this->db->delete();
			}

			public function get_all() {
				$this->db->from('duangsettee_dst_main_info');
				$this->db->order_by('id', 'DESC');
				return $this->db->get()->result();
			}

			public function get_by_key($key) {
				$this->db->select('*');
				$this->db->from('duangsettee_dst_main_info');
				$this->db->where('id', $key);
				$query = $this->db->get()->result();
				return $query;
			}

		}