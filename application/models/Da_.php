<?php

class Da_ extends MY_Model {

    public function inserts() {

        $this->db->from('');
        return $this->db->insert();
    }

    public function updates() {


        $this->db->from('');
        $this->db->where('');
        return $this->db->update();
    }

    public function deletes() {
        $this->db->from('');
        $this->db->where('');
        $this->db->delete();
    }

    public function get_all() {
        $this->db->from('');
        $this->db->order_by('', 'ASC');
        return $this->db->get()->result();
    }

    public function get_by_key($key) {
        $this->db->select('*');
        $this->db->from('');
        $this->db->where('', $key);
        $query = $this->db->get()->result();
        return $query;
    }

}
