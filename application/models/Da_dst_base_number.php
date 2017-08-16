<?php class Da_dst_base_number extends MY_Model {
	public $base_id;
	public $base_number;
	public function inserts() {
		$this->db->set('base_id', $this->base_id);
		$this->db->set('base_number', $this->base_number);
		$this->db->from('duangsettee_dst_base_number');
		return $this->db->insert();
	}
		public function inserts_array($data=null) {
				$this->db->set($data);
				$this->db->from('duangsettee_dst_base_number');
				return $this->db->insert();
			}
			public function updates_array($data=null,$key=null) {
				return $this->db->update('duangsettee_dst_base_number', $data, $key);
			} public function updates() {
				$this->db->set('base_id', $this->base_id);
				$this->db->set('base_number', $this->base_number);
				$this->db->from('duangsettee_dst_base_number');
		$this->db->where('base_id', $this->base_id);
		return $this->db->update(); }

			public function deletes() {
				$this->db->from('duangsettee_dst_base_number');
				$this->db->where('base_id', $this->base_id);
				$this->db->delete();
			}

			public function get_all() {
				$this->db->from('duangsettee_dst_base_number');
				//$this->db->order_by('base_id', 'DESC');
				return $this->db->get()->result();
			}

			public function get_by_key($key) {
				$this->db->select('*');
				$this->db->from('duangsettee_dst_base_number');
				$this->db->where('base_id', $key);
				$query = $this->db->get()->result();
				return $query;
			}

		}
