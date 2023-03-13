<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Morong_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        
		$this->load->model('f_homemodel');
		$this->load->helper('webcounter_helper');
		
		// danh mục
		$data['cate_all'] = $this->system_model->get_data('product_category',array(
            //'home' => 1,
            'lang' => $this->language,
            'parent_id' => 0
            ),array('sort' => 'desc'));
            foreach ($data['cate_all'] as $key => $cat) {
                $data['cate_all'][$key]->cat_sub =  $this->system_model->get_data('product_category',array(
                //'home' => 1,
                'lang' => $this->language,
                'parent_id' => $cat->id
                ),array('sort' => 'desc'));
            }
             $data['cate_news'] = $this->system_model->get_data('news_category',array(
                'lang' => $this->language,
                'parent_id' => 0
                ),array('sort' => 'desc'));
             foreach ($data['cate_news'] as $key => $cat) {
                $data['cate_news'][$key]->cat_sub =  $this->system_model->get_data('news_category',array(
                //'home' => 1,
                'lang' => $this->language,
                'parent_id' => $cat->id
                ),array('sort' => 'desc'));
            }
		// end danh mục

        //sản phẩm nổi bật
            $data['pros'] = $this->system_model->get_data('product',array(
            'focus' => 1,
            'lang' => $this->language,
            ),array('sort' => 'desc'));
        // end sp nổi bật

        //news nổi bật
            $data['news'] = $this->system_model->get_data('news',array(
            //'home' => 1,
            'lang' => $this->language,
            'focus' => 1,
            //'active' => 1
            ),array('id' => 'desc'),5,0);
        // end news nổi bật

        // hỗ trợ trực tuyến
            $data['supports'] = $this->system_model->get_data('support_online',array(
            'active' => 1,
        	),array('id' => 'desc'),null);
        // end hỗ trợ trực tuyến


        //cate home
            $data['cate_home'] = $this->system_model->get_data('product_category',array(
            'lang' => $this->language,
            'parent_id'=>0,
            'home'=>1
        ),array('sort' => 'desc'),null);

        foreach ($data['cate_home'] as $k => $cat) {
            $data['cate_home'][$k]->cate_sub = $this->system_model->get_data('product_category',array(
            'lang' => $this->language,
            'parent_id !='=>0,
            'parent_id'=> $cat->id,
            'home'=>1
        ),array('sort' => 'desc'),null);

        foreach($data['cate_home'][$k]->cate_sub as $key => $cate_sub){
            $data['cate_home'][$k]->cate_sub[$key]->pro = $this->system_model->getProbyCate($cate_sub->id,array(
                'lang' => $this->language,
                'home'=>1
                ),array('sort','desc'),8,0);
            }
        }

        foreach($data['cate_home'] as $key => $cate_home){
            $data['cate_home'][$key]->pro = $this->system_model->getProbyCate($cate_home->id,array(
                'lang' => $this->language,
                'home'=>1
            ),array('sort','desc'),8,0);
        }

        $data['pro_all'] = $this->system_model->get_data('product',array(
            'lang' => $this->language,
        ),array('sort' => 'desc'));

        $data['pro_home'] = $this->system_model->get_data('product',array(
            'lang' => $this->language,
            'home'=>1,
        ),array('sort' => 'desc'));
        // end cate home



		$this->load->view('view',$data);
    }
}