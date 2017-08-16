<?php

include('Da_demo_blog_categories.php');

class Mo_demo_blog_categories extends Da_demo_blog_categories {

    //put your code here
    public function get_demo_blog_categories() {
        return $this->db->get('demo_blog_categories')->result();
    }

}
