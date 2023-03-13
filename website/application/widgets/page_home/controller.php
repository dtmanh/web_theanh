<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_home_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
    	$this->load->model('f_homemodel');
		
		
		$data['page_home'] = $this->system_model->get_data('staticpage',array(
            'home' => 1,
            'lang' => $this->language
        ),array('id','asc'),6,0);

        $data['one_page_home'] = $this->system_model->getField('staticpage','id,name,alias,image,content,description',array(
            'home' => 1,
            'lang' => $this->language
        ),array('id','desc'));
        //    $data['one_page_home2'] = $this->system_model->getField('staticpage','id,name,content,description',array(
        //     'focus' => 1,
        //     'lang' => $this->language
        // ),array('id','desc'));
		//var_dump($data['one_page_home']);die;
        $this->load->view('view',$data);
    }
}