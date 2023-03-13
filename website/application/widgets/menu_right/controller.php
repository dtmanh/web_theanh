<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blkmenu_right_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        
		$this->load->model('f_homemodel');
		
		//menu left
		
		$data['menu_root'] = $this->f_homemodel->get_data('menu',array('position'=>'bottom2','parent_id'=>0,'lang' => $this->language),
               array('sort'=>'')
           );
		// foreach ($data['menu_root'] as $key => $cat) {
			// $data['menu_root'][$key]->menu_sub =  $this->f_homemodel->get_data('menu',array( 'position'=>'bottom2',
			// 'parent_id ='=>$cat->id_menu,
			// 'lang' => $this->language),
                // array('sort'=>''));
		// }		
		
			$this->load->view('view',$data);
    }
}