<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_bottom_widget extends MY_Widget
{

    function index(){

		 $data['menu_bottom'] = $this->system_model->get_data('menu',array('position'=>'bottom','parent_id'=>0,'lang' => $this->language),
                array('sort'=>'')
            );
		$this->load->view('view',$data);
    }
}