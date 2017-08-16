<?php

include('Da_course.php');

class Mo_course extends Da_course {

    public function __construct() {
        parent::__construct();
        $this->_table = "ach_course";
    }

    public function update_status() {
        $this->db->set('status', $this->status);
        $this->db->from('ach_course');
        $this->db->where('id', $this->id);
        return $this->db->update();
    }

    public function update_sort() {
        $this->db->set('sort', $this->sort);
        $this->db->from('ach_course');
        $this->db->where('id', $this->id);
        return $this->db->update();
    }
    
     public function get_all_count() {
        $this->db->select('count(id) as num');
        $this->db->from('ach_course');
        return $this->db->get()->result();
    }

    public function get_count() {
        $this->db->select('count(id) as num');
        $this->db->from('ach_course');
        $this->db->where('status', 'เปิด');
        return $this->db->get()->result();
    }

    public function get_all_limit($key) {
        $this->db->from('ach_course');
        $this->db->where('status', 'เปิด');
        $this->db->order_by('sort', 'DESC');
        $this->db->limit(8, $key);
        return $this->db->get()->result();
    }

    public function get_limit_4() {
        $this->db->from('ach_course');
        $this->db->where('status', 'เปิด');
        $this->db->order_by('sort', 'DESC');
        $this->db->limit(4);
        return $this->db->get()->result();
    }

    public function get_search($keyword) {
        $this->db->from('ach_course');
        $this->db->where('status', 'เปิด');
        $this->db->like('topic', $keyword);
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

}
