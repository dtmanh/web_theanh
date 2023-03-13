<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_nb_slide extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
		 $data['news'] = $this->system_model->get_data('news',array(
            'lang' => $this->language,
            'home' => 1,
        ));
	    $this->load->view('view',$data);
    }
}