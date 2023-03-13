<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        
		$this->load->model('f_homemodel');
		
			
		//nội dung 
		// $data['slides'] = $this->f_homemodel->get_data('images',array(
            // 'type' => 'partners',
            // /*'lang' => $this->language*/
        // ));
		
		$data['videos'] = $this->f_homemodel->getFields('video','id,name,alias,link_video',array(
				'active' => 1,
				'lang' => $this->language,
			),array('sort' => ''),10,0);
		
		 
		//var_dump($data['videos']);die;		
			$this->load->view('view',$data);
    }
}