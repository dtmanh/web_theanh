<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner_price_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){

        $data = array();

        $this->load->view('view',$data);
    }
}