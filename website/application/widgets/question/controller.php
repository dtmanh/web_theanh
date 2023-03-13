<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Question_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index($id){
        $data = array();
        $data['itemId'] = $id;
        $data['usermail'] = $this->session->userdata('usermail');
        $data['username'] = $this->session->userdata('fullname');
        //$data['avata'] = 'upload/img/avatar/'.$this->session->userdata('avt_dir') .'/'. $this->session->userdata('avatar');
        $this->load->model('m_comment');
        //echo "<pre>";var_dump($data['subs']);die();
        $this->load->view('view',$data);
    }
}