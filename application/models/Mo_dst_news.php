<?php

		include('Da_dst_news.php');

		class Mo_dst_news extends Da_dst_news {
			public function get_limit($no) {
					$this->db->select('*');
					$this->db->from('duangsettee_dst_news');
					$this->db->order_by('news_id', 'DESC');
					$this->db->limit($no);
					return $this->db->get()->result();
			}

			public function record_count() {
					$this->db->select('*');
					$this->db->from('duangsettee_dst_news');
					$query = $this->db->get()->num_rows();
					return $query;
			}

			public function paditionpage($limit,$offset){
					$this->db->select('*');
					$this->db->from('duangsettee_dst_news');
					$this->db->order_by("news_id","DESC");
					$this->db->limit($limit,$offset);
					$query = $this->db->get()->result();
					return $query;
			}
		}
