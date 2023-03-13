<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_silde_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        
		$this->load->model('f_homemodel');
		
		$data = array();
        $data['slide_home'] = $this->f_homemodel->get_data('images',array(
            'type' => 'home',
        ),array('id' => 'desc'),null);
		//var_dump($data['slide_home']);die;
        
	    $this->load->view('view',$data);
    }
}