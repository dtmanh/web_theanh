<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chiase_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        
		$this->load->model('f_homemodel');
		
      $data['config_chiase'] = $this->system_model->getFirstRowWhere('config_checkpro',array('type' => 'hotline','field'=>'shase','active' => 1));
		//var_dump($data['menus_sukien']);;die;
	    $this->load->view('view',$data);
    }
}