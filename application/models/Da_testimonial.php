<?php

class Da_testimonial extends MY_Model {

    public $pic_person;
    public $name;
    public $job;
    public $content;

    public function inserts() {
        $this->db->set('pic_person', $this->pic_person);
        $this->db->set('name', $this->name);
        $this->db->set('job', $this->job);
        $this->db->set('content', $this->content);
        $this->db->from('ach_testimonial');
        return $this->db->insert();
    }

    public function inserts_array($data = null) {
        $this->db->set($data);
        $this->db->from('ach_testimonial');
        return $this->db->insert();
    }

    public function updates_array($data = null, $key = null) {
        return $this->db->update('ach_testimonial', $data, $key);
    }

    public function updates() {
        $this->db->set('pic_person', $this->pic_person);
        $this->db->set('name', $this->name);
        $this->db->set('job', $this->job);
        $this->db->set('content', $this->content);
        $this->db->from('ach_testimonial');
        $this->db->where('id', $this->id);
        return $this->db->update();
    }

    public function deletes() {
        $this->db->from('ach_testimonial');
        $this->db->where('id', $this->id);
        $this->db->delete();
    }

    public function get_all() {
        $this->db->from('ach_testimonial');
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_key($key) {
        $this->db->select('*');
        $this->db->from('ach_testimonial');
        $this->db->where('id', $key);
        $query = $this->db->get()->result();
        return $query;
    }

}
