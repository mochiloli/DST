<?php

include('Da_gallery_img.php');

class Mo_gallery_img extends Da_gallery_img {

    public function get_all_to_table() {
        $this->db->select('ach_gallery_img.id,ach_gallery_album.content as gallery_album_content,ach_gallery_img.img,ach_gallery_img.content');
        $this->db->from('ach_gallery_img');
        $this->db->join('ach_gallery_album', 'ach_gallery_img.album_id = ach_gallery_album.id');
        $this->db->order_by('ach_gallery_img.id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_all_key_album($key) {
        $this->db->select('ach_gallery_img.id,ach_gallery_album.content as gallery_album_content,ach_gallery_img.img,ach_gallery_img.content');
        $this->db->from('ach_gallery_img');
        $this->db->join('ach_gallery_album', 'ach_gallery_img.album_id = ach_gallery_album.id');
        $this->db->where('ach_gallery_img.album_id', $key);
        return $this->db->get()->result();
    }

}
