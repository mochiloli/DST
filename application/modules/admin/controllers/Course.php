
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_builder');
        $this->load->library('form_validation');
        $this->load->model('mo_course');
        $this->load->model('mo_enrollments');
        $this->load->model('mo_gallery_album');
        $this->load->helper('url');
    }

    public function index() {
        $this->mPageTitle = 'คอร์ส';
        $this->mViewData['original'] = $this->mo_course->get_all();
        $this->render('course/v_course');
    }

    public function create($id = NULL) {

//        $this->mViewData['lastidinserted'] = $this->mo_course->getLastIDInserted();

        $this->form_validation->set_rules('topic', 'Topic', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('date_course', 'Date_course', 'required');
        $this->form_validation->set_rules('place_course', 'Place_course', 'required');
        $this->form_validation->set_rules('type_course', 'Type_course', 'required');


        if ($id != NULL || !empty($this->input->post('id'))) {
            $this->mPageTitle = 'แก้ไขคอร์ส';
            if ($this->form_validation->run() == FALSE) {
                $this->mViewData['course'] = $this->mo_course->get_by_key($id);
            } else {
                $this->mo_course->id = $this->input->post('id');
                if ($_FILES["img"]['name']) {
                    $config['file_name'] = md5($_FILES["img"]['name']) . '.jpg';
                    $config['upload_path'] = 'assets/uploads/course/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '0';
                    $img = md5($_FILES["img"]['name']) . '.jpg';
                    $this->load->library("upload", $config);
                    $this->upload->initialize($config);
                    $this->upload->do_upload('img');
                    $this->mo_course->img = $img;
                } else {
                    $this->mo_course->img = $this->input->post('img_old');
                }
                $this->mo_course->topic = $this->input->post('topic');
                $this->mo_course->date = $this->input->post('date');
                $this->mo_course->content = $this->input->post('content');
                $this->mo_course->date_course = $this->input->post('date_course');
                $this->mo_course->place_course = $this->input->post('place_course');
                $this->mo_course->type_course = $this->input->post('type_course');
                $this->mo_course->title_tag = $this->input->post('title_tag');
                $this->mo_course->meta_description = $this->input->post('meta_description');
                $this->mo_course->meta_keyword = $this->input->post('meta_keyword');
                $this->mo_course->og_url = $this->input->post('og_url');
                $this->mo_course->og_type = $this->input->post('og_type');
                $this->mo_course->og_title = $this->input->post('og_title');
                $this->mo_course->og_description = $this->input->post('og_description');
//                $this->mo_course->og_image = $this->input->post('og_image');
                if ($_FILES["og_image"]['name']) {
                    $config['file_name'] = md5($_FILES["og_image"]['name']) . '.jpg';
                    $config['upload_path'] = 'assets/uploads/course/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '0';
                    $og_image = md5($_FILES["og_image"]['name']) . '.jpg';
                    $this->load->library("upload", $config);
                    $this->upload->initialize($config);
                    $this->upload->do_upload('og_image');
                    $this->mo_course->og_image = $og_image;
                } else {
                    $this->mo_course->og_image = $this->input->post('og_image_old');
                }
                $this->mo_course->updates();
                redirect('admin/course/');
            }
        } else {
            $this->mPageTitle = 'เพิ่มคอร์ส';
            if ($this->form_validation->run() == FALSE) {
                
            } else {
                $count = $this->mo_course->get_all_count();
                $config['file_name'] = md5($_FILES["img"]['name']) . '.jpg';
                $config['upload_path'] = 'assets/uploads/course/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '0';
                $img = md5($_FILES["img"]['name']) . '.jpg';
                $this->load->library("upload", $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('img');
                $this->mo_course->img = $img;
                $this->mo_course->topic = $this->input->post('topic');
                $this->mo_course->date = $this->input->post('date');
                $this->mo_course->content = $this->input->post('content');
                $this->mo_course->date_course = $this->input->post('date_course');
                $this->mo_course->place_course = $this->input->post('place_course');
                $this->mo_course->type_course = $this->input->post('type_course');
                $this->mo_course->sort = $count[0]->num + 1;
                $this->mo_course->status = 'เปิด';
                $this->mo_course->title_tag = $this->input->post('title_tag');
                $this->mo_course->meta_description = $this->input->post('meta_description');
                $this->mo_course->meta_keyword = $this->input->post('meta_keyword');
                $this->mo_course->og_url = $this->input->post('og_url');
                $this->mo_course->og_type = $this->input->post('og_type');
                $this->mo_course->og_title = $this->input->post('og_title');
                $this->mo_course->og_description = $this->input->post('og_description');
                $config['file_name'] = md5($_FILES["og_image"]['name']) . '.jpg';
                $config['upload_path'] = 'assets/uploads/course/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '0';
                $og_image = md5($_FILES["og_image"]['name']) . '.jpg';
                $this->load->library("upload", $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('og_image');
                $this->mo_course->og_image = $og_image;
                $this->mo_course->inserts();

//                $course_id = $this->db->insert_id();
//                $this->mo_gallery_album->img = 'nophoto.png';
//                $this->mo_gallery_album->content = $this->input->post('topic');
//                $this->mo_gallery_album->course_id = $course_id;
//                $this->mo_gallery_album->status = 'ปิด';
//                $this->mo_gallery_album->inserts();

                redirect('admin/course/');
            }
        }

        $this->render('course/v_course_create');
    }

    public function deletes($id = NULL) {
        if ($id != NULL) {
            $this->mo_course->id = $id;
            $this->mo_course->deletes();
        }
        redirect('admin/course/');
    }

    public function update_status($id, $status) {
        $this->mo_course->id = $id;
        $this->mo_course->status = urldecode($status);
        $this->mo_course->update_status();
        redirect('admin/course/');
    }

    public function member($id) {
        $this->mViewData['original'] = $this->mo_enrollments->get_all_join_course_by_key($id);
        if (isset($this->mViewData['original'][0]->topic)) {
            $this->mPageTitle = $this->mViewData['original'][0]->topic;
        } else {
            $this->mPageTitle = 'ชื่อคอร์ส';
        }
        $this->render('course/v_member');
    }

    public function update_status_enrollments($id = null, $status = null, $idreturn = null) {
        if ($id && $status) {
            $this->mo_enrollments->id = $id;
            $this->mo_enrollments->status = urldecode($status);
            $this->mo_enrollments->update_status();
            redirect('admin/course/member/' . $idreturn);
        }
    }

    public function enrollments_deletes($id = NULL, $idreturn = null) {
        if ($id != NULL) {
            $this->mo_enrollments->id = $id;
            $this->mo_enrollments->deletes();
        }
        redirect('admin/course/member/' . $idreturn);
    }

    public function update_sort($id = NULL, $sort = NULL) {
        if ($id != NULL && $sort != NULL) {
            $this->mo_course->id = $id;
            $this->mo_course->sort = $sort;
            $this->mo_course->update_sort();
            redirect('admin/course/', 'refresh');
        }
    }

//    public function alternate($idcer, $idsw) {
//
//        $this->db->trans_begin();
//        
//        $this->mViewData['key_sort1'] = $this->mo_course->get_by_sort1($idsw);
//        $this->mViewData['key_sort2'] = $this->mo_course->get_by_sort2($idcer);
////        echo $this->mViewData['key_sort'][0]->id;
////        exit();
//
//        $this->mo_course->id = $idcer;
//        $this->mo_course->sort = $idsw;
//        $this->mo_course->change_id();        
//
//        $this->mo_course->id = $this->mViewData['key_sort1'][0]->id;
//        $this->mo_course->sort = $this->mViewData['key_sort2'][0]->sort;
//        $this->mo_course->change_id();
//
//        if ($this->db->trans_status() === FALSE) {
//            $this->db->trans_rollback();
//            redirect('admin/course/','refresh');
//        } else {
//            $this->db->trans_commit();
//            redirect('admin/course/','refresh');
//        }
//    }
}
