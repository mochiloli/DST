<?php

		include('Da_dst_sacred.php');

		class Mo_dst_sacred extends Da_dst_sacred {
			public function get_limit($no) {
					$this->db->from('duangsettee_dst_sacred');
					$this->db->order_by('sacred_id', 'DESC');
					$this->db->limit($no);
					return $this->db->get()->result();
			}
			
			public function record_count() {
					$this->db->select('*');
					$this->db->from('duangsettee_dst_sacred');
					$query = $this->db->get()->num_rows();
					return $query;
			}

			public function paditionpage($limit,$offset){
					$this->db->select('*');
					$this->db->from('duangsettee_dst_sacred');
					$this->db->order_by("sacred_id","DESC");
					$this->db->limit($limit,$offset);
					$query = $this->db->get()->result();
					return $query;
			}
		}
