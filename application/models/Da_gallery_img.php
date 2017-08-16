<?php

class Da_gallery_img extends MY_Model {

    public $img;
    public $content;
    public $album_id;

    public function inserts() {
        $this->db->set('img', $this->img);
        $this->db->set('content', $this->content);
        $this->db->set('album_id', $this->album_id);
        $this->db->from('ach_gallery_img');
        return $this->db->insert();
    }

    public function inserts_array($data = null) {
        $this->db->set($data);
        $this->db->from('ach_gallery_img');
        return $this->db->insert();
    }

    public function updates_array($data = null, $key = null) {
        return $this->db->update('ach_gallery_img', $data, $key);
    }

    public function updates() {
        $this->db->set('img', $this->img);
        $this->db->set('content', $this->content);
        $this->db->set('album_id', $this->album_id);
        $this->db->from('ach_gallery_img');
        $this->db->where('id', $this->id);
        return $this->db->update();
    }

    public function deletes() {
        $this->db->from('ach_gallery_img');
        $this->db->where('id', $this->id);
        $this->db->delete();
    }

    public function get_all() {
        $this->db->from('ach_gallery_img');
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_key($key) {
        $this->db->select('*');
        $this->db->from('ach_gallery_img');
        $this->db->where('id', $key);
        $query = $this->db->get()->result();
        return $query;
    }

}
