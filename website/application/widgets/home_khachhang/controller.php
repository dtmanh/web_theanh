<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_khachhang_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        
		$this->load->model('f_homemodel');
		
		//menu left
		
	
		$data['menu_root'] = $current = $this->system_model->getField('menu','*',array('position'=>'left','parent_id'=>0,'name'=>'layout_khachhang','lang' => $this->language),
		array(),true);
		if(isset($data['menu_root'])){
			$data['menu_root']->menu_sub =  $this->system_model->get_data('menu',array( 'position'=>'left',
			'parent_id ='=>$data['menu_root']->id,
			'lang' => $this->language),
				array('sort'=>''));  
		}	
		
		$this->load->view('view',$data);
    }
}