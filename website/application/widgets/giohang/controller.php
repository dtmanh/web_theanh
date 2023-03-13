<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blkgiohang_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
      
	 	
		//dem gio hang
		   $count = 0;
            if(!isset($_SESSION['cart'])){
                $_SESSION['cart']=array();
            }else{

                foreach ($_SESSION['cart'] as $v) {
                    $count += $v['qty'];
                }
            }
            $data['count']= $count;
			
			
		$this->load->view('view',$data);			
	
    }
}