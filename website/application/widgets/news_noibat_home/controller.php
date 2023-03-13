<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_noibat_home_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        
        $this->load->model('f_newsmodel');
            $data['news'] = $this->system_model->getFields('news','id,title,focus,image,alias,description',array(
            //'home' => 1,
            'lang' => $this->language,
            'focus' => 1,
            ),6,0);
          //var_dump($data['news']);die;
	    $this->load->view('view',$data);
    }
}