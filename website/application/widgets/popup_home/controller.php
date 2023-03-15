<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Popup_home_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        
		$this->load->model('f_homemodel');
		
			
		//nội dung 
		$data['popup'] = $this->f_homemodel->get_data('contact',array(
            // 'type' => 'ads_left',
            /*'lang' => $this->language*/
        ));
				
			$this->load->view('view',$data);
    }
}