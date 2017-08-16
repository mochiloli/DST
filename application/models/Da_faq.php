<?php class Da_faq extends MY_Model { public $question; public $answer;  public function inserts() {  $this->db->set('question', $this->question);  $this->db->set('answer', $this->answer);  $this->db->from('ach_faq'); return $this->db->insert(); } public function inserts_array($data=null) {
				$this->db->set($data);
				$this->db->from('ach_faq');
				return $this->db->insert();
			}
			public function updates_array($data=null,$key=null) {
				return $this->db->update('ach_faq', $data, $key);
			} public function updates() {  $this->db->set('question', $this->question);  $this->db->set('answer', $this->answer);  $this->db->from('ach_faq');
		$this->db->where('id', $this->id);
		return $this->db->update(); }

			public function deletes() {
				$this->db->from('ach_faq');
				$this->db->where('id', $this->id);
				$this->db->delete();
			}

			public function get_all() {
				$this->db->from('ach_faq');
				$this->db->order_by('id', 'DESC');
				return $this->db->get()->result();
			}

			public function get_by_key($key) {
				$this->db->select('*');
				$this->db->from('ach_faq');
				$this->db->where('id', $key);
				$query = $this->db->get()->result();
				return $query;
			}

		}