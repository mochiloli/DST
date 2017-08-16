<?php

class Da_demo_blog_categories extends MY_Model { 
    
    public $id;
    public $pos;
    public $title;

    public function inserts() {
        $this->db->set('pos', $this->pos);
        $this->db->set('title', $this->title);
		$this->db->from('demo_blog_categories');
        return $this->db->insert();
    }

    public function updates() {
        $this->db->set('pos', $this->pos);
        $this->db->set('title', $this->title);
		$this->db->from('demo_blog_categories');
        $this->db->where('id', $this->id);
        return $this->db->update();
    }

    public function deletes() {
        $this->db->where('id', $this->id);
        $this->db->delete('demo_blog_categories');
    }

    public function get_all() {
        $this->db->order_by('id', 'ASC');
		$this->db->from('demo_blog_categories');
        return $this->db->get()->result();
    }

    public function get_by_key($key) {
        $this->db->select('*');
        $this->db->from('demo_blog_categories');
        $this->db->where('id', $key);
        $query = $this->db->get()->result();
        return $query;
    }

}
