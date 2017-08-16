<?php

class Install_model extends MY_Model {

    public $id;
    public $pos;
    public $title;

    public function inserts() {
        //   $this->db->set('pos', $this->pos);
        //   $this->db->set('title', $this->title);
        //   return $this->db->insert('demo_blog_categories');
    }

}
