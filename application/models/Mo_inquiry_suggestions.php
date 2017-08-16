<?php

include('Da_inquiry_suggestions.php');

class Mo_inquiry_suggestions extends Da_inquiry_suggestions {

    public function update_status() {
        $this->db->set('status', $this->status);
        $this->db->from('ach_inquiry_suggestions');
        $this->db->where('id', $this->id);
        return $this->db->update();
    }

}
