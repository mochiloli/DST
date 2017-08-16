<?php class Da_dst_contact extends MY_Model {
	public $contact_id;
	public $contact_topic;
	public $contact_name;
	public $contact_email;
	public $contact_tel;
	public $contact_content;
	public $contact_date;
	public function inserts() {
		$this->db->set('contact_id', $this->contact_id);
		$this->db->set('contact_topic', $this->contact_topic);
		$this->db->set('contact_name', $this->contact_name);
		$this->db->set('contact_email', $this->contact_email);
		$this->db->set('contact_tel', $this->contact_tel);
		$this->db->set('contact_content', $this->contact_content);
		$this->db->set('contact_date', $this->contact_date);
		$this->db->from('duangsettee_dst_contact');
		return $this->db->insert(); }
		public function inserts_array($data=null) {
				$this->db->set($data);
				$this->db->from('duangsettee_dst_contact');
				return $this->db->insert();
			}
			public function updates_array($data=null,$key=null) {
				return $this->db->update('duangsettee_dst_contact', $data, $key);
			}
			public function updates() {
				$this->db->set('contact_id', $this->contact_id);
				$this->db->set('contact_topic', $this->contact_topic);
				$this->db->set('contact_name', $this->contact_name);
				$this->db->set('contact_email', $this->contact_email);
				$this->db->set('contact_tel', $this->contact_tel);
				$this->db->set('contact_content', $this->contact_content);
				$this->db->set('contact_date', $this->contact_date);
				$this->db->from('duangsettee_dst_contact');
		$this->db->where('contact_id', $this->contact_id);
		return $this->db->update(); }

			public function deletes() {
				$this->db->from('duangsettee_dst_contact');
				$this->db->where('contact_id', $this->contact_id);
				$this->db->delete();
			}

			public function get_all() {
				$this->db->from('duangsettee_dst_contact');
				$this->db->order_by('contact_id', 'DESC');
				return $this->db->get()->result();
			}

			public function get_by_key($key) {
				$this->db->select('*');
				$this->db->from('duangsettee_dst_contact');
				$this->db->where('contact_id', $key);
				$query = $this->db->get()->result();
				return $query;
			}

		}
