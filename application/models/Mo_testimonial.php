<?php

include('Da_testimonial.php');

class Mo_testimonial extends Da_testimonial {

    public function get_limit_4() {
        $this->db->from('ach_testimonial');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(4);
        return $this->db->get()->result();
    }

}
