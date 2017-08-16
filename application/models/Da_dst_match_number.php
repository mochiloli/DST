<?php class Da_dst_match_number extends MY_Model {
	public $mn_id;
	public $mn_number;
	public $mn_data;
	public $mn_keyword;
	public $mn_result;
	public function inserts() {  $this->db->set('mn_id', $this->mn_id);
		$this->db->set('mn_number', $this->mn_number);
		$this->db->set('mn_data', $this->mn_data);
		$this->db->set('mn_keyword', $this->mn_keyword);
		$this->db->set('mn_result', $this->mn_result);
		$this->db->from('duangsettee_dst_match_number'); return $this->db->insert(); }
	public function inserts_array($data=null) {
				$this->db->set($data);
				$this->db->from('duangsettee_dst_match_number');
				return $this->db->insert();
			}
			public function updates_array($data=null,$key=null) {
				return $this->db->update('duangsettee_dst_match_number', $data, $key);
			} public function updates() {
				$this->db->set('mn_id', $this->mn_id);
				$this->db->set('mn_number', $this->mn_number);
				$this->db->set('mn_data', $this->mn_data);
				$this->db->set('mn_keyword', $this->mn_keyword);
				$this->db->set('mn_result', $this->mn_result);
				$this->db->from('duangsettee_dst_match_number');
				$this->db->where('mn_id', $this->mn_id);
		return $this->db->update(); }

			public function deletes() {
				$this->db->from('duangsettee_dst_match_number');
				$this->db->where('mn_id', $this->mn_id);
				$this->db->delete();
			}

			public function get_all() {
				$this->db->from('duangsettee_dst_match_number');
				$this->db->order_by('mn_id', 'DESC');
				return $this->db->get()->result();
			}

			public function get_by_key($key) {
				$this->db->select('*');
				$this->db->from('duangsettee_dst_match_number');
				$this->db->where('mn_id', $key);
				$query = $this->db->get()->result();
				return $query;
			}

			public function get_by_number($key) {
				$this->db->select('*');
				$this->db->from('duangsettee_dst_match_number');
				$this->db->where('mn_number', $key);
				$query = $this->db->get()->result();
				return $query;
			}

		}
