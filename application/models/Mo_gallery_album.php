<?php

include('Da_gallery_album.php');

class Mo_gallery_album extends Da_gallery_album {

    public function update_status() {
        $this->db->set('status', $this->status);
        $this->db->from('ach_gallery_album');
        $this->db->where('id', $this->id);
        return $this->db->update();
    }

    public function get_count() {
        $this->db->select('count(id) as num');
        $this->db->from('ach_gallery_album');
        $this->db->where('status', 'เปิด');
        return $this->db->get()->result();
    }

    public function get_all_to_home() {
        $this->db->from('ach_gallery_album');
        $this->db->where('status', 'เปิด');
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_all_limit($key) {
        $this->db->from('ach_gallery_album');
        $this->db->where('status', 'เปิด');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(9, $key);
        return $this->db->get()->result();
    }

}
