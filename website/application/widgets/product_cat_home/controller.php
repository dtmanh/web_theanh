<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_cat_home_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){

        $data = array();

        //  $data['blkdanhmuc']=$this->load->widget('blkdanhmuc');
        // $data['cate_show_home'] = $this->system_model->get_data('product_category',array(
        //     'lang' => $this->language,
        //     'home'=>1
        // ),array('sort' => 'desc'),null);


        $data['cate_home'] = $this->system_model->get_data('product_category',array(
            'lang' => $this->language,
            'parent_id' => 0,
            'home'=> 1
        ),array('sort' => 'desc'),null);

        //var_dump($data['cate_home']);die;
        // foreach ($data['cate_home'] as $k => $cat) {
        //     $data['cate_home'][$k]->cate_sub = $this->system_model->get_data('product_category',array(
        //     'lang' => $this->language,
        //     'parent_id !='=>0,
        //     'parent_id'=> $cat->id,
        //     'home'=>1
        // ),array('sort' => 'desc'),null);

        // foreach($data['cate_home'][$k]->cate_sub as $key => $cate_sub){
        //     $data['cate_home'][$k]->cate_sub[$key]->pro = $this->system_model->getProbyCate($cate_sub->id,array(
        //         'lang' => $this->language,
        //         'home'=>1
        //         ),array('sort','desc'),8,0);
        //     }
        // }

        foreach($data['cate_home'] as $key => $cate_home){
            $data['cate_home'][$key]->pro = $this->system_model->getProbyCate($cate_home->id,array(
                'lang' => $this->language,
                'home'=>1
            ),array('sort','desc'),6,0);
        }

        // $data['pro_all'] = $this->system_model->get_data('product',array(
        //     'lang' => $this->language,
        // ),array('sort' => 'desc'));

        // $data['pro_home'] = $this->system_model->get_data('product',array(
        //     'lang' => $this->language,
        //     'home'=>1,
        // ),array('sort' => 'desc'));


        $this->load->view('view',$data);
    }

}
