<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_right_hotel_widget extends MY_Widget
{
    // sibar bên phải
    function index(){
        
		$this->load->model('f_homemodel');
		
			$data = array();
			
			// $data['product_banchay']=$this->load->widget('product_banchay');
			// $data['cat_news_home']=$this->load->widget('cat_news_home');			
			// $data['counter']=$this->load->widget('counter');
			//$data['product_moi']=$this->load->widget('product_moi');
			$data['thuonghieu']=$this->load->widget('thuonghieu');
			$data['hangsx']=$this->load->widget('hangsx');
			
			
			$data['ykcustomer'] = $this->f_homemodel->get_data('inuser_category',array(
				'home' => '1','lang' => $this->language,
			));	
		$this->load->view('view', $data);
    }
}