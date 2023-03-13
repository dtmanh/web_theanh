<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_nb_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){

        $data['cate_new'] = $this->system_model->getField('news_category','id,name,description,alias',array(
            'lang' => $this->language,
            'home' => 1,
        )); 
        if (isset($data['cate_new'])) {
            $data['news'] = $this->system_model->getNewsByCategory($data['cate_new']->id,array(
                      //'home' => 1,
              'news.lang' => $this->language,
              'news.home' => 1,
          ),2,0);
        }
       //  var_dump($data['news']);die;
	    $this->load->view('view',$data);
    }
}