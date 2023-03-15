<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_1_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        // $data['menu_root'] = $this->system_model->get_data('menu',array('position'=>'left','parent_id'=>0,'url'=>'layout-1','lang' => $this->language),
        //     array('sort'=>'')
        // );
        $data['menu_root'] = $current = $this->system_model->getField('menu','*',array('position'=>'left','parent_id'=>0,'url'=>'layout-1','lang' => $this->language),
        array(),true);
        if(isset($data['menu_root'])){
            $data['menu_root']->menu_sub =  $this->system_model->get_data('menu',array( 'position'=>'left',
            'parent_id ='=>$data['menu_root']->id,
            'lang' => $this->language),
                array('sort'=>''));
            if(isset($data['menu_root']->menu_sub)){
                foreach ($data['menu_root']->menu_sub as $key => $value) {
                    $data['menu_root']->menu_sub[$key]->menu_sub2 =  $this->system_model->get_data('menu',array( 'position'=>'left',
                    'parent_id ='=>$value->id,
                    'lang' => $this->language),
                        array('sort'=>''));
                }
            }    
        }
        // var_dump('<pre>');
        // var_dump($data['menu_root']);
        // var_dump('</pre>');
        // die;
		$this->load->view('view',$data);	
    }
}