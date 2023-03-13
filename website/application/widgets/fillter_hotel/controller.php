<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fillter_hotel_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index($id){
        
		//$this->load->model('f_productmodel');
		
		$data = array();
		$data['cat_hotel'] = $id->id;			
		$this->load->view('view', $data);
    }
}