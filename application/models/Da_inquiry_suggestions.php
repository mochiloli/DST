<?php

class Da_inquiry_suggestions extends MY_Model {

    public $topic;
    public $name;
    public $email;
    public $tel;
    public $content;
    public $status;

    public function inserts() {
        $this->db->set('topic', $this->topic);
        $this->db->set('name', $this->name);
        $this->db->set('email', $this->email);
        $this->db->set('tel', $this->tel);
        $this->db->set('content', $this->content);
        $this->db->set('status', $this->status);
        $this->db->from('ach_inquiry_suggestions');
        return $this->db->insert();
    }

    public function inserts_array($data = null) {
        $this->db->set($data);
        $this->db->from('ach_inquiry_suggestions');
        return $this->db->insert();
    }

    public function updates_array($data = null, $key = null) {
        return $this->db->update('ach_inquiry_suggestions', $data, $key);
    }

    public function updates() {
        $this->db->set('topic', $this->topic);
        $this->db->set('name', $this->name);
        $this->db->set('email', $this->email);
        $this->db->set('tel', $this->tel);
        $this->db->set('content', $this->content);
        $this->db->from('ach_inquiry_suggestions');
        $this->db->where('id', $this->id);
        return $this->db->update();
    }

    public function deletes() {
        $this->db->from('ach_inquiry_suggestions');
        $this->db->where('id', $this->id);
        $this->db->delete();
    }

    public function get_all() {
        $this->db->from('ach_inquiry_suggestions');
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_key($key) {
        $this->db->select('*');
        $this->db->from('ach_inquiry_suggestions');
        $this->db->where('id', $key);
        $query = $this->db->get()->result();
        return $query;
    }

}
