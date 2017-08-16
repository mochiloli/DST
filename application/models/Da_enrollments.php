<?php

class Da_enrollments extends MY_Model {

    public $course_id;
    public $name_th;
    public $name_en;
    public $address;
    public $tel;
    public $fax;
    public $email;
    public $bank_name;
    public $status;

    public function inserts() {
        $this->db->set('course_id', $this->course_id);
        $this->db->set('name_th', $this->name_th);
        $this->db->set('name_en', $this->name_en);
        $this->db->set('address', $this->address);
        $this->db->set('tel', $this->tel);
        $this->db->set('fax', $this->fax);
        $this->db->set('email', $this->email);
        $this->db->set('bank_name', $this->bank_name);
        $this->db->set('status', $this->status);
        $this->db->from('ach_enrollments');
        return $this->db->insert();
    }

    public function inserts_array($data = null) {
        $this->db->set($data);
        $this->db->from('ach_enrollments');
        return $this->db->insert();
    }

    public function updates_array($data = null, $key = null) {
        return $this->db->update('ach_enrollments', $data, $key);
    }

    public function updates() {
        $this->db->set('course_id', $this->course_id);
        $this->db->set('name_th', $this->name_th);
        $this->db->set('name_en', $this->name_en);
        $this->db->set('address', $this->address);
        $this->db->set('tel', $this->tel);
        $this->db->set('fax', $this->fax);
        $this->db->set('email', $this->email);
        $this->db->set('bank_name', $this->bank_name);
        $this->db->from('ach_enrollments');
        $this->db->where('id', $this->id);
        return $this->db->update();
    }

    public function deletes() {
        $this->db->from('ach_enrollments');
        $this->db->where('id', $this->id);
        $this->db->delete();
    }

    public function get_all() {
        $this->db->from('ach_enrollments');
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_key($key) {
        $this->db->select('*');
        $this->db->from('ach_enrollments');
        $this->db->where('id', $key);
        $query = $this->db->get()->result();
        return $query;
    }

}
