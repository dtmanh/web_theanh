<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_news_home_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        
		$this->load->model('f_homemodel');
		
		//san pham mới	
        $data['pros'] = $this->system_model->get_data('product',array(
            'hot' => 1,
            'lang' => $this->language,
            ),array('sort' => 'desc'));

         //san ban chay 


        $data['pros_banchay'] = $this->system_model->get_data('product',array(
            'hot' => 1,
            'lang' => $this->language,
            ),array('sort' => 'desc')); 

         //san pham hot
            $data['pros_hot'] = $this->system_model->get_data('product',array(
            'hot' => 1,
            'lang' => $this->language,
            ),array('sort' => 'desc'));

     
	    $this->load->view('view',$data);
    }
}