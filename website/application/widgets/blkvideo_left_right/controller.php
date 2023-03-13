<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blkvideo_left_right_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
      	$data['cate_all']=$this->system_model->getFirstRowWhere('media_category',array(
				'lang' => $this->language,
                'parent_id'=>0,
				'left_right'=>1
			));
        if(count($data['cate_all'])):
            $data['cate_all']->cate_sub = $this->system_model->get_data('media_category',
                array(
                    'parent_id' => $data['cate_all']->id,
                    'lang' => $this->language,
                    'left_right' => 1
                ),6,0);
        endif;
		$this->load->view('view',$data);	
    }
}