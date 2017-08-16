<?php class Da_dst_news extends MY_Model {
	public $news_id;
	public $news_topic;
	public $news_content;
	public $news_image;
	public $title_tag;
	public $meta_description;
	public $meta_keyword;
	public $og_url;
	public $og_type;
	public $og_title;
	public $og_description;
	public $og_image;
	public function inserts() {
		$this->db->set('news_id', $this->news_id);
		$this->db->set('news_topic', $this->news_topic);
		$this->db->set('news_content', $this->news_content);
		$this->db->set('news_image', $this->news_image);
		$this->db->set('title_tag', $this->title_tag);
		$this->db->set('meta_description', $this->meta_description);
		$this->db->set('meta_keyword', $this->meta_keyword);
		$this->db->set('og_url', $this->og_url);
		$this->db->set('og_type', $this->og_type);
		$this->db->set('og_title', $this->og_title);
		$this->db->set('og_description', $this->og_description);
		$this->db->set('og_image', $this->og_image);
		$this->db->from('duangsettee_dst_news');
		return $this->db->insert();
	}
		public function inserts_array($data=null) {
				$this->db->set($data);
				$this->db->from('duangsettee_dst_news');
				return $this->db->insert();
			}
			public function updates_array($data=null,$key=null) {
				return $this->db->update('duangsettee_dst_news', $data, $key);
			}
			public function updates() {
				$this->db->set('news_id', $this->news_id);
				$this->db->set('news_topic', $this->news_topic);
				$this->db->set('news_content', $this->news_content);
				$this->db->set('news_image', $this->news_image);
				$this->db->set('title_tag', $this->title_tag);
				$this->db->set('meta_description', $this->meta_description);
				$this->db->set('meta_keyword', $this->meta_keyword);
				$this->db->set('og_url', $this->og_url);
				$this->db->set('og_type', $this->og_type);
				$this->db->set('og_title', $this->og_title);
				$this->db->set('og_description', $this->og_description);
				$this->db->set('og_image', $this->og_image);
				$this->db->from('duangsettee_dst_news');
		$this->db->where('news_id', $this->news_id);
		return $this->db->update(); }

			public function deletes() {
				$this->db->from('duangsettee_dst_news');
				$this->db->where('news_id', $this->news_id);
				$this->db->delete();
			}

			public function get_all() {
				$this->db->from('duangsettee_dst_news');
				$this->db->order_by('news_id', 'DESC');
				return $this->db->get()->result();
			}

			public function get_by_key($key) {
				$this->db->select('*');
				$this->db->from('duangsettee_dst_news');
				$this->db->where('news_id', $key);
				$query = $this->db->get()->result();
				return $query;
			}

		}
