<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_left_two_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        $data['news_hot']= $this->system_model->get_data('news',array(
            'lang' => $this->language,
            'hot' => 1,
        ),array('id' => 'desc'),false,3,0);
        if (is_array($data['news_hot'])) {
            foreach ($data['news_hot']  as $key => $item) {
                $category = $this->system_model->getField('news_category','id,name,alias',array(
                    'id'=>$item->category_id),
                    array(),true);
                $data['news_hot'][$key]->category_name =  $category->name;
                $data['news_hot'][$key]->category_alias =  $category->alias;
            }
        }

        $data['news_hot_4']= $this->system_model->get_data('news',array(
            'lang' => $this->language,
            'hot' => 1,
        ),array('id' => 'desc'),false,7,4);
        if (is_array($data['news_hot_4'])) {
            foreach ($data['news_hot_4']  as $key => $item) {
                $category = $this->system_model->getField('news_category','id,name,alias',array(
                    'id'=>$item->category_id),
                    array(),true);
                $data['news_hot_4'][$key]->category_name =  $category->name;
                $data['news_hot_4'][$key]->category_alias =  $category->alias;
            }
        }

	    $this->load->view('view',$data);
    }
}