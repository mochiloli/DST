<?php

class Picture_slide extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mo_picture_slide');
    }

    public function data_picture_slide() {
        $get_data_picture_slide = $this->mo_picture_slide->get_all();
        foreach ($get_data_picture_slide as $key => $value) {
            echo '<div class="col-lg-12 item">
                    <div class="intro-message">
                        <img src="' . base_url('assets/uploads/picture_slide/'). $value->img . '" width="100%" height="441px;" alt="">
                    </div>
                </div>';
        }
    }

}
