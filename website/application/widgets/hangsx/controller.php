<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hangsx_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        
		$this->load->model('f_homemodel');
		
		$data['hangsx'] = $this->f_homemodel->get_data('product_hangsx',array(
            //'type' => 'partners',
            'lang' => $this->language
        ));
		// foreach ($data['slides'] as $key => $cat) {
			// $data['slides'][$key]->total = $this->f_homemodel->count_ProbyBrand($cat->alias);	
		// }	
		//var_dump($data['slides']);die;		
		$this->load->view('view',$data);
    }
}