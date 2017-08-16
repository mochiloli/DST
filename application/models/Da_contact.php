<?php

class Da_contact extends MY_Model {

    public $address;
    public $tel;
    public $mobile;
    public $fax;
    public $email;
    public $time_open;
    public $pic_address;

    public function inserts() {
        $this->db->set('address', $this->address);
        $this->db->set('tel', $this->tel);
        $this->db->set('mobile', $this->mobile);
        $this->db->set('fax', $this->fax);
        $this->db->set('email', $this->email);
        $this->db->set('time_open', $this->time_open);
        $this->db->set('pic_address', $this->pic_address);
        $this->db->from('ach_contact');
        return $this->db->insert();
    }

    public function inserts_array($data = null) {
        $this->db->set($data);
        $this->db->from('ach_contact');
        return $this->db->insert();
    }

    public function updates_array($data = null, $key = null) {
        return $this->db->update('ach_contact', $data, $key);
    }

    public function updates() {
        $this->db->set('address', $this->address);
        $this->db->set('tel', $this->tel);
        $this->db->set('mobile', $this->mobile);
        $this->db->set('fax', $this->fax);
        $this->db->set('email', $this->email);
        $this->db->set('time_open', $this->time_open);
        $this->db->set('pic_address', $this->pic_address);
        $this->db->from('ach_contact');
        $this->db->where('id', $this->id);
        return $this->db->update();
    }

    public function deletes() {
        $this->db->from('ach_contact');
        $this->db->where('id', $this->id);
        $this->db->delete();
    }

    public function get_all() {
        $this->db->from('ach_contact');
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_key($key) {
        $this->db->select('*');
        $this->db->from('ach_contact');
        $this->db->where('id', $key);
        $query = $this->db->get()->result();
        return $query;
    }

}
