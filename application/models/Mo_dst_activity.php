<?php

		include('Da_dst_activity.php');

		class Mo_dst_activity extends Da_dst_activity {
			public function get_limit($no) {
					$this->db->from('duangsettee_dst_activity');
					$this->db->order_by('ac_id', 'DESC');
					$this->db->limit($no);
					return $this->db->get()->result();
			}

			public function record_count() {
					$this->db->select('*');
					$this->db->from('duangsettee_dst_activity');
					$query = $this->db->get()->num_rows();
					return $query;
			}

			public function paditionpage($limit,$offset){
					$this->db->select('*');
					$this->db->from('duangsettee_dst_activity');
					$this->db->order_by("ac_id","DESC");
					$this->db->limit($limit,$offset);
					$query = $this->db->get()->result();
					return $query;
			}
		}
