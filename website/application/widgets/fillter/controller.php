<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fillter_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        
		$this->load->model('f_productmodel');
		
		$data = array();
		
		 $data['khoanggia'] = $this->f_productmodel->get_data('product_price',array(
            'lang' => $this->language
        ),array('sort'=>'sort'));
		
			//thuong hieu
		$data['brands'] = $this->f_productmodel->get_data('product_brand',array(
				'lang' => $this->language
			),array('sort'=>'sort'));
			
	 
		$data['size'] = $this->f_productmodel->get_data('product_size',array(
				'lang' => $this->language
			),array('sort'=>'sort'));
		 
		$data['province'] = $this->f_productmodel->get_data('province',array(
        ));
		$this->load->view('view', $data);
    }
}