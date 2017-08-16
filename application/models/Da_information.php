<?php

class Da_information extends MY_Model {

    public $img;
    public $topic;
    public $content;

    public function inserts() {
        $this->db->set('img', $this->img);
        $this->db->set('topic', $this->topic);
        $this->db->set('content', $this->content);
        $this->db->from('ach_information');
        return $this->db->insert();
    }

    public function inserts_array($data = null) {
        $this->db->set($data);
        $this->db->from('ach_information');
        return $this->db->insert();
    }

    public function updates_array($data = null, $key = null) {
        return $this->db->update('ach_information', $data, $key);
    }

    public function updates() {
        $this->db->set('img', $this->img);
        $this->db->set('topic', $this->topic);
        $this->db->set('content', $this->content);
        $this->db->from('ach_information');
        $this->db->where('id', $this->id);
        return $this->db->update();
    }

    public function deletes() {
        $this->db->from('ach_information');
        $this->db->where('id', $this->id);
        $this->db->delete();
    }

    public function get_all() {
        $this->db->from('ach_information');
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_key($key) {
        $this->db->select('*');
        $this->db->from('ach_information');
        $this->db->where('id', $key);
        $query = $this->db->get()->result();
        return $query;
    }

}
