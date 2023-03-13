<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Doitac_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
		$data['doitacs'] = $this->system_model->get_data('images',array(
            'type' => 'partners',
            'lang' => $this->language
        ),array('sort' => 'desc'),null);
			$this->load->view('view',$data);
    }
}