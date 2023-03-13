<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_left_one_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        $data['news']= $this->system_model->get_data('news',array(
            'lang' => $this->language,
            'button_1' => 1,
        ),array('id' => 'desc'),false,4,0);
        if (is_array($data['news'])) {
            foreach ($data['news']  as $key => $item) {
                $category = $this->system_model->getField('news_category','id,name,alias',array(
                    'id'=>$item->category_id),
                    array(),true);
                $data['news'][$key]->category_name =  $category->name;
                $data['news'][$key]->category_alias =  $category->alias;
            }
        }
	    $this->load->view('view',$data);
    }
}