<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){

		$this->load->model('f_homemodel');


		//nội dung
		$data['slides'] = $this->f_homemodel->getField('images','title,name,content, image,id',array(
            'type' => 'slide',
            // 'lang' => $this->language
        ));
       
		$this->load->view('view',$data);
    }
}
