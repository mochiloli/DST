<?php

include('Da_knowledge.php');

class Mo_knowledge extends Da_knowledge {

    public function get_count() {
        $this->db->select('count(id) as num');
        $this->db->from('ach_knowledge');
        return $this->db->get()->result();
    }

    public function get_all_limit($key) {
        $this->db->from('ach_knowledge');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(8, $key);
        return $this->db->get()->result();
    }

}
