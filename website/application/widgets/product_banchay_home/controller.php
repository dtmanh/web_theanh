<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_banchay_home_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index($name){
        
		//$this->load->model('f_homemodel');
		$data['pros_title'] = $name;
		//san pham mới	
		$data['pros'] = $this->system_model->get_data('product',array(
            'coupon' => 1,
            'lang' => $this->language,
            ),array('sort' => 'desc'));
			
		//var_dump($data['pros']);die;
	    $this->load->view('view',$data);
    }
}