<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$config['ci_bootstrap_menu'] = array(
    'menu' => array(
        'home' => array(
            'name' => 'หน้าแรก',
            'url' => '',
            'icon' => 'fa fa-home',
        )
    )
);
				$config['ci_bootstrap_menu']['menu']['dst_main_info'] = array(
					'name' => 'ข้อมูลหลัก',
					'url' => 'dst_main_info',
					'icon' => 'fa fa-cog',
				);
				$config['ci_bootstrap_menu']['menu']['dst_news'] = array(
					'name' => 'ข่าวสาร',
					'url' => 'dst_news',
					'icon' => 'fa fa-info-circle',
				);
				$config['ci_bootstrap_menu']['menu']['dst_activity'] = array(
					'name' => 'กิจกรรม',
					'url' => 'dst_activity',
					'icon' => 'fa fa-child',
				);
				$config['ci_bootstrap_menu']['menu']['dst_exp'] = array(
					'name' => 'ประสบการณ์',
					'url' => 'dst_exp',
					'icon' => 'fa fa-gamepad',
				);
				$config['ci_bootstrap_menu']['menu']['dst_sacred'] = array(
					'name' => 'วัตถุมงคลเสริมดวง',
					'url' => 'dst_sacred',
					'icon' => 'fa fa-cube',
				);
				/*
				$config['ci_bootstrap_menu']['menu']['dst_info'] = array(
					'name' => 'เกี่ยวกับเรา',
					'url' => 'dst_info',
					'icon' => 'fa fa-address-card-o',
				);
				*/
				$config['ci_bootstrap_menu']['menu']['dst_user'] = array(
					'name' => 'ข้อมูลผู้ใช้',
					'url' => 'dst_user',
					'icon' => 'fa fa-users',
				);
				$config['ci_bootstrap_menu']['menu']['dst_base_number'] = array(
					'name' => 'จับหลักตัวเลข',
					'url' => 'dst_base_number',
					'icon' => 'fa fa-file-text-o',
				);
				$config['ci_bootstrap_menu']['menu']['dst_match_number'] = array(
					'name' => 'ความหมายเลขแต่ละคู่',
					'url' => 'dst_match_number',
					'icon' => 'fa fa-sort-numeric-asc',
				);				/*
				$config['ci_bootstrap_menu']['menu']['c_matching'] = array(
					'name' => 'จับคู่ตัวเลข',
					'url' => 'c_matching',
					'icon' => 'fa fa-smile-o',
				);*/
				$config['ci_bootstrap_menu']['menu']['dst_contact'] = array(
					'name' => 'สอบถาม/ข้อเสนอแนะ',
					'url' => 'dst_contact',
					'icon' => 'fa fa-newspaper-o',
				);
				