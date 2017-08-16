<?php class Da_dst_user extends MY_Model {
	public $user_id;
	public $user_name;
	public $user_tel;
	public $user_date;
	public function inserts() {
		$this->db->set('user_id', $this->user_id);
		$this->db->set('user_name', $this->user_name);
		$this->db->set('user_tel', $this->user_tel);
		$this->db->set('user_date', $this->user_date);
		$this->db->from('duangsettee_dst_user');
		return $this->db->insert(); }
	public function inserts_array($data=null) {
				$this->db->set($data);
				$this->db->from('duangsettee_dst_user');
				return $this->db->insert();
			}
			public function updates_array($data=null,$key=null) {
				return $this->db->update('duangsettee_dst_user', $data, $key);
			}
			public function updates() {
				$this->db->set('user_id', $this->user_id);
				$this->db->set('user_name', $this->user_name);
				$this->db->set('user_tel', $this->user_tel);
				$this->db->set('user_date', $this->user_date);
				$this->db->from('duangsettee_dst_user');
		$this->db->where('user_id', $this->user_id);
		return $this->db->update(); }

			public function deletes() {
				$this->db->from('duangsettee_dst_user');
				$this->db->where('user_id', $this->user_id);
				$this->db->delete();
			}

			public function get_all() {
				$this->db->from('duangsettee_dst_user');
				$this->db->order_by('user_id', 'DESC');
				return $this->db->get()->result();
			}

			public function get_by_key($key) {
				$this->db->select('*');
				$this->db->from('duangsettee_dst_user');
				$this->db->where('user_id', $key);
				$query = $this->db->get()->result();
				return $query;
			}

		}
