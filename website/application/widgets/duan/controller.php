<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blkduan_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        
		$this->load->model('f_homemodel');
		
		
		
		//tin tuc mới
		 $data['news'] = $this->f_homemodel->GetData('news',
            array(
                'home' => 1,
                'lang' => $this->language
            ),array('id','asc'),15,0);
			
			
		
	    $this->load->view('view',$data);
    }
}