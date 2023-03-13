<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_noibat_home_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){

		//$this->load->model('f_homemodel');

		//san pham mới
		$data['pros'] = $this->system_model->get_data('product',array(
            'focus' => 1,
            'lang' => $this->language,
            ),array('sort' => 'desc'));
        $data['product_cate'] =$this->system_model->getFields('product_category','name,description,alias,id,image',array('home'=>1),array('sort'=>'desc'));
		  //var_dump($data['pros']);die;
	    $this->load->view('view',$data);
    }
}
