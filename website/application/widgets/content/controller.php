<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        
		$this->load->model('f_homemodel');
		
			
		//nội dung 
		
		// noi dung
        $data['page'] = $this->f_homemodel->getFirstRowWhere('staticpage',
            array(
                'home' => 1,
                'lang' => $this->language
            ));
		
					
					
			$this->load->view('view',$data);
    }
}