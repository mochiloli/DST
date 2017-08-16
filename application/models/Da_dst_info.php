<?php class Da_dst_info extends MY_Model {
	public $info_id;
	public $info_name;
	public $info_topic;
	public $info_content;
	public $info_tel;
	public $info_phone;
	public $info_fax;
	public $info_email;
	public $info_image;
	public function inserts() {
		$this->db->set('info_id', $this->info_id);
		$this->db->set('info_name', $this->info_name);
		$this->db->set('info_topic', $this->info_topic);
		$this->db->set('info_content', $this->info_content);
		$this->db->set('info_tel', $this->info_tel);
		$this->db->set('info_phone', $this->info_phone);
		$this->db->set('info_fax', $this->info_fax);
		$this->db->set('info_email', $this->info_email);
		$this->db->set('info_image', $this->info_image);
		$this->db->from('duangsettee_dst_info'); return $this->db->insert(); }
		public function inserts_array($data=null) {
				$this->db->set($data);
				$this->db->from('duangsettee_dst_info');
				return $this->db->insert();
			}
			public function updates_array($data=null,$key=null) {
				return $this->db->update('duangsettee_dst_info', $data, $key);
			} public function updates() {  $this->db->set('info_id', $this->info_id);
				$this->db->set('info_name', $this->info_name);
				$this->db->set('info_topic', $this->info_topic);
				$this->db->set('info_content', $this->info_content);
				$this->db->set('info_tel', $this->info_tel);
				$this->db->set('info_phone', $this->info_phone);
				$this->db->set('info_fax', $this->info_fax);
				$this->db->set('info_email', $this->info_email);
				$this->db->set('info_image', $this->info_image);
				$this->db->from('duangsettee_dst_info');
		$this->db->where('info_id', $this->info_id);
		return $this->db->update(); }

			public function deletes() {
				$this->db->from('duangsettee_dst_info');
				$this->db->where('info_id', $this->info_id);
				$this->db->delete();
			}

			public function get_all() {
				$this->db->from('duangsettee_dst_info');
				$this->db->order_by('info_id', 'DESC');
				return $this->db->get()->result();
			}

			public function get_by_key($key) {
				$this->db->select('*');
				$this->db->from('duangsettee_dst_info');
				$this->db->where('info_id', $key);
				$query = $this->db->get()->result();
				return $query;
			}

		}
