<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_right_widget extends MY_Widget
{
    // sibar bên phải
    function index(){

			$data = array();
			$data['social']=$this->load->widget('social');
			/*begin content*//*end content*/
        $this->load->view('common/right', $data);
    }
}