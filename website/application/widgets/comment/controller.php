<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index($id){

        $data = array();
        $data['itemId'] = $id;
		
        $this->load->model('m_comment');
        $this->load->model('f_productmodel');
        $pid = (int) $id;
        $data['binh_luan_1'] =   $this->f_productmodel->Count('comments_binhluan',array('id_sanpham'=>$pid,'review'=>1,'giatri'=>1));
        $data['binh_luan_2'] =   $this->f_productmodel->Count('comments_binhluan',array('id_sanpham'=>$pid,'review'=>1,'giatri'=>2));
        $data['binh_luan_3'] =   $this->f_productmodel->Count('comments_binhluan',array('id_sanpham'=>$pid,'review'=>1,'giatri'=>3));
        $data['binh_luan_4'] =   $this->f_productmodel->Count('comments_binhluan',array('id_sanpham'=>$pid,'review'=>1,'giatri'=>4));
        $data['binh_luan_5'] =   $this->f_productmodel->Count('comments_binhluan',array('id_sanpham'=>$pid,'review'=>1,'giatri'=>5));

        $data['binhluan_all']= $this->f_productmodel->Count('comments_binhluan',array('id_sanpham'=>$pid,'review'=>1));
        $data['binhluan_view']= $this->f_productmodel->Get_where('comments_binhluan',array('id_sanpham'=>$pid,'review'=>1));
        $data['binhluan_child']= $this->f_productmodel->Get_where('comments_binhluan',array('parent_id !=' => '0'));


        $data['tong_binhluan_all']= $this->f_productmodel->Product_comment_binhluan($pid);

        if($data['binhluan_all'] > 0){
            $data['trung_binh'] = round($data['tong_binhluan_all'][0]->tong_giatri/$data['binhluan_all'],1);
            $data['pt_bl_1'] = round(($data['binh_luan_1']/$data['binhluan_all'])*100,1);
            $data['pt_bl_2'] = round(($data['binh_luan_2']/$data['binhluan_all'])*100,1);
            $data['pt_bl_3'] = round(($data['binh_luan_3']/$data['binhluan_all'])*100,1);
            $data['pt_bl_4'] = round(($data['binh_luan_4']/$data['binhluan_all'])*100,1);
            $data['pt_bl_5'] = round(($data['binh_luan_5']/$data['binhluan_all'])*100,1);
        }else{
            $data['trung_binh'] = 0;
            $data['pt_bl_1'] = 0;
            $data['pt_bl_2'] = 0;
            $data['pt_bl_3'] = 0;
            $data['pt_bl_4'] = 0;
            $data['pt_bl_5'] = 0;
        }
		
		if($this->session->userData('userData')){
			$user = $this->session->userData('userData');
		}
        if($this->session->userData('userData')){
            $data['avata'] = 'upload/img/avatar/'.$this->session->userdata('avt_dir') .'/'. $user['avatar'];
        }else{
            $data['avata'] = 'img/avata.png';
        }
		
        $this->load->view('view',$data);
    }
}