<?php class Da_bank extends MY_Model { public $name;  public function inserts() {  $this->db->set('name', $this->name);  $this->db->from('ach_bank'); return $this->db->insert(); } public function inserts_array($data=null) {
				$this->db->set($data);
				$this->db->from('ach_bank');
				return $this->db->insert();
			}
			public function updates_array($data=null,$key=null) {
				return $this->db->update('ach_bank', $data, $key);
			} public function updates() {  $this->db->set('name', $this->name);  $this->db->from('ach_bank');
		$this->db->where('id', $this->id);
		return $this->db->update(); }

			public function deletes() {
				$this->db->from('ach_bank');
				$this->db->where('id', $this->id);
				$this->db->delete();
			}

			public function get_all() {
				$this->db->from('ach_bank');
				$this->db->order_by('id', 'DESC');
				return $this->db->get()->result();
			}

			public function get_by_key($key) {
				$this->db->select('*');
				$this->db->from('ach_bank');
				$this->db->where('id', $key);
				$query = $this->db->get()->result();
				return $query;
			}

		}