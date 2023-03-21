<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_banggia_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
      $data['page'] = $this->f_homemodel->getFirstRowWhere('staticpage',
            array(
                'hot' => 1,
                'lang' => $this->language
            ));
            $this->load->view('view',$data);
	
    }
}