<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner_baochi_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
    $data['slides'] = $this->f_homemodel->get_data('images',array(
        'type' => 'right',
        // 'lang' => $this->language
    ));
		$this->load->view('view');			
	
    }
}