<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Filemanager extends MY_Controller {

    var $lang_web = "en";
    var $path;
    public $object_per_zone = 500;

    public function index() {
        die();
    }

    public function image($module = NULL, $id = NULL) {
        $this->_layout = FALSE;
        $connector_url = site_url('filemanager/connector');
        $data['lang_info'] = $this->lang_web;
        $data = array(
            'assets_url' => base_url('assets'),
            'connector_url' => $connector_url,
            'allowed_mimes' => json_encode(array('image'))
        );
        $this->load->view('image', $data);
    }

    public function video($module = NULL, $id = NULL) {
        $this->_layout = FALSE;
        $connector_url = site_url('filemanager/connector');
        $data = array(
            'assets_url' => base_url('assets'),
            'connector_url' => $connector_url,
            'allowed_mimes' => json_encode(
                    array(
                        'video',
                        'application/x-shockwave-flash',
                        'video/mp4',
                        'video/x-msvideo',
                        'video/mpeg',
                        'video/x-ms-wm',
                        'video/x-ms-wmv',
                        'video/x-ms-wvx',
                        'application/x-msmediaview',
                        'video/vnd.mpegurl',
                        'audio/mp3',
                        'audio/mpeg3',
                        'audio/mpg',
                        'audio/mpeg',
                        'audio/x-wav',
                        'audio/x-ms-wma'
            ))
        );

        $this->load->view('video', $data);
    }

    public function file_attach($module = NULL, $id = NULL) {
        $this->_layout = FALSE;

        $connector_url = site_url('filemanager/connector');

        $data = array(
            'assets_url' => base_url('assets'),
            'connector_url' => $connector_url,
            'allowed_mimes' => json_encode(
                    array(
                        'application/pdf',
                        'application/msword',
                        'application/vnd.ms-powerpoint',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        'application/vnd.ms-excel',
                        'application/x-compressed',
                        'application/x-zip-compressed',
                        'application/zip',
                        'video/mp4',
                        'video/x-msvideo',
                        'audio/mp3',
                        'audio/mpeg3',
                        'audio/mpg',
                        'audio/mpeg',
                        'video/mpeg',
                        'audio/x-wav',
                        'audio/x-ms-wma',
                        'multipart/x-zip',
                        "vnd.ms-word.document.macroEnabled.12",
                        "vnd.ms-word.template.macroEnabled.12",
                        "vnd.ms-powerpoint.template.macroEnabled.12",
                        "vnd.ms-powerpoint.addin.macroEnabled.12",
                        "vnd.ms-powerpoint.slideshow.macroEnabled.12",
                        "vnd.ms-powerpoint.presentation.macroEnabled.12",
                        "vnd.ms-excel.addin.macroEnabled.12",
                        "vnd.ms-excel.sheet.binary.macroEnabled.12",
                        "vnd.ms-excel.sheet.macroEnabled.12",
                        "vnd.ms-excel.template.macroEnabled.12",
                        "image"
                    )
            )
        );

        $this->load->view('file', $data);
    }

    public function document($module = NULL, $id = NULL) {
        $this->_layout = FALSE;

        $connector_url = site_url('filemanager/connector');

        $data = array(
            'assets_url' => $this->theme_path . 'assets',
            'connector_url' => $connector_url,
            'allowed_mimes' => json_encode(
                    array(
                        'application/pdf',
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                        'application/vnd.ms-excel',
                        'application/x-compressed',
                        'application/x-zip-compressed',
                        'application/zip',
                        'multipart/x-zip')
            )
        );

        $this->load->view('document', $data);
    }

    public function connector($module = NULL, $id = NULL) {
        // this is ajax request, not render full page
        $this->_layout = FALSE;

        // default options for all roots
        // merge this config to your settings
        $default = array(
            // extended has override the rename check, never allow php
            'driver' => 'LocalFileSystem',
            'path' => FCPATH . 'assets/uploads/',
            'URL' => base_url('assets/uploads'),
            'alias' => 'uploads',
            'accessControl' => array($this, '_access_control'),
            'mimeDetect' => 'internal',
            // just a basic protection, still leave an attacking hole
            'uploadDeny' => array(
                'text/x-php'
            )
        );
        /* $default = array(
          'driver' => 'ftp',
          'host'   => '203.146.117.197',
          'user'   => '',
          'pass'   => '',
          'alias'  => ' Upload',
          'path'   => 'domains/.co.th/public_html/test_mail'
          ); */
        // roots container
        $roots = array();
        // default always show
        $roots[] = $default;
        $this->load->library('ci_elfinder', array('roots' => $roots), 'elfinder');
    }

    // -------------------------------------------------------------------------

    /**
     * Simple function to demonstrate how to control file access using "accessControl" callback.
     * This method will disable accessing files/folders starting from  '.' (dot)
     *
     * @param  string  $attr  attribute name (read|write|locked|hidden)
     * @param  string  $path  file path relative to volume root directory started with directory separator
     * @return bool|null
     * */
    public function _access_control($attr, $path, $data, $volume) {

        return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
                ? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
                : null;
    }

    // -------------------------------------------------------------------------

    public function _get_upload_dir($module, $object_id) {
        if (!is_scalar($module) OR empty($module) OR ! is_numeric($object_id) OR empty($object_id)) {
            return FALSE;
        }

        $directory = implode(DIRECTORY_SEPARATOR, array($module, $this->get_object_zone($object_id), $object_id));

        if (!is_dir(UPLOADPATH . $directory) AND ! @mkdir(UPLOADPATH . $directory, 0777, TRUE)) {
            return FALSE;
        }

        if (!is_writable(UPLOADPATH . $directory)) {
            return FALSE;
        }

        return $directory;
    }

    protected function get_object_zone($id) {
        return ceil($id / $this->object_per_zone) * $this->object_per_zone;
    }

}

/* End filemanager.php */