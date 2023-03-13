<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_main_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        $data['menu_root'] = $this->system_model->get_data('menu',array('position'=>'main','parent_id'=>0,'lang' => $this->language),
               array('sort'=>'')
           );
        foreach ($data['menu_root'] as $key => $cat) {
            $data['menu_root'][$key]->menu_sub =  $this->system_model->get_data('menu',array( 'position'=>'main',
            'parent_id ='=>$cat->id,
            'lang' => $this->language),
                array('sort'=>''));
        }
        $this->load->view('view',$data);
    }
}