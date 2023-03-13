<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){

			$data = array();

			$data['cate_all']=$this->system_model->get_data('product_category',array(
				'lang' => $this->language,
				'parent_id'=>0
			));

			//var_dump($data['cate_all']);die;
			$this->load->view('view', $data);
    }
}