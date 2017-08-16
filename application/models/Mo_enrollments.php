<?php

include('Da_enrollments.php');

class Mo_enrollments extends Da_enrollments {

    public function update_status() {
        $this->db->set('status', $this->status);
        $this->db->from('ach_enrollments');
        $this->db->where('id', $this->id);
        return $this->db->update();
    }

    public function get_all_join_course() {
        $this->db->select('*,ach_enrollments.id as enrollments_id,ach_enrollments.status as enrollments_status');
        $this->db->from('ach_enrollments');
        $this->db->join('ach_course', 'ach_enrollments.course_id = ach_course.id');
        $this->db->order_by('ach_course.id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_all_join_course_by_key($key) {
        $this->db->select('*,ach_enrollments.id as enrollments_id,ach_enrollments.status as enrollments_status');
        $this->db->from('ach_enrollments');
        $this->db->join('ach_course', 'ach_enrollments.course_id = ach_course.id');
        $this->db->where('ach_course.id', $key);
        $this->db->order_by('ach_course.id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_search_By_date($date_start,$date_end,$status) {
        $this->db->select('*,ach_enrollments.status as enrollments_status');
        $this->db->from('ach_enrollments');
        $this->db->join('ach_course', 'ach_enrollments.course_id = ach_course.id');
        $this->db->where('ach_enrollments.status', $status);
        $this->db->where('DATE(enrollments_date) >=', $date_start);
        $this->db->where('DATE(enrollments_date) <=', $date_end);
        $this->db->order_by('ach_course.id', 'DESC');
        $query = $this->db->get()->result();
        return $query;
    }
    
      public function get_search_By_date_no_status($date_start,$date_end) {
        $this->db->select('*,ach_enrollments.status as enrollments_status');
        $this->db->from('ach_enrollments');
        $this->db->join('ach_course', 'ach_enrollments.course_id = ach_course.id');
        $this->db->where('DATE(enrollments_date) >=', $date_start);
        $this->db->where('DATE(enrollments_date) <=', $date_end);
        $this->db->order_by('ach_course.id', 'DESC');
        $query = $this->db->get()->result();
        return $query;
    }

}
