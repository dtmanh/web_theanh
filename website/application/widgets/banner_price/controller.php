<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner_price_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index($alias){

        $data = array();

        $data['alias'] = $alias;
        $this->load->view('view',$data);
    }
}