<?php

class Da_knowledge extends MY_Model {

    public $type;
    public $img;
    public $topic;
    public $date;
    public $content;
    public $title_tag;
    public $meta_description;
    public $meta_keyword;
    public $og_url;
    public $og_type;
    public $og_title;
    public $og_description;
    public $og_image;

    public function inserts() {
        $this->db->set('type', $this->type);
        $this->db->set('img', $this->img);
        $this->db->set('topic', $this->topic);
        $this->db->set('date', $this->date);
        $this->db->set('content', $this->content);
        $this->db->set('title_tag', $this->title_tag);
        $this->db->set('meta_description', $this->meta_description);
        $this->db->set('meta_keyword', $this->meta_keyword);
        $this->db->set('og_url', $this->og_url);
        $this->db->set('og_type', $this->og_type);
        $this->db->set('og_title', $this->og_title);
        $this->db->set('og_description', $this->og_description);
        $this->db->set('og_image', $this->og_image);
        $this->db->from('ach_knowledge');
        return $this->db->insert();
    }

    public function inserts_array($data = null) {
        $this->db->set($data);
        $this->db->from('ach_knowledge');
        return $this->db->insert();
    }

    public function updates_array($data = null, $key = null) {
        return $this->db->update('ach_knowledge', $data, $key);
    }

    public function updates() {
        $this->db->set('type', $this->type);
        $this->db->set('img', $this->img);
        $this->db->set('topic', $this->topic);
        $this->db->set('date', $this->date);
        $this->db->set('content', $this->content);
        $this->db->set('title_tag', $this->title_tag);
        $this->db->set('meta_description', $this->meta_description);
        $this->db->set('meta_keyword', $this->meta_keyword);
        $this->db->set('og_url', $this->og_url);
        $this->db->set('og_type', $this->og_type);
        $this->db->set('og_title', $this->og_title);
        $this->db->set('og_description', $this->og_description);
        $this->db->set('og_image', $this->og_image);
        $this->db->from('ach_knowledge');
        $this->db->where('id', $this->id);
        return $this->db->update();
    }

    public function deletes() {
        $this->db->from('ach_knowledge');
        $this->db->where('id', $this->id);
        $this->db->delete();
    }

    public function get_all() {
        $this->db->from('ach_knowledge');
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_key($key) {
        $this->db->select('*');
        $this->db->from('ach_knowledge');
        $this->db->where('id', $key);
        $query = $this->db->get()->result();
        return $query;
    }

}
