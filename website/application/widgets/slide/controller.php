<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slide_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){

		$data = array();
        $data['slide_home'] = $this->system_model->getFields('images','type,title,image,url',array(
            'type' => 'slide',
        ),array('id' => 'desc'),null);
		
        $this->load->view('view',$data);
    }
    
}