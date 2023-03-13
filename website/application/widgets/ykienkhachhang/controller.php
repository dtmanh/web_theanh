<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ykienkhachhang_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        $data['ykcustomer'] = $this->system_model->get_data('inuser_category',array(
            'home' => 1,
            'lang' => $this->language
        ),array('sort' => 'desc'),3,0);

		$this->load->view('view',$data);
    }
}