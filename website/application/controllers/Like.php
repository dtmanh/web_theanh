<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Like extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('f_productmodel');
        $this->load->library('pagination');
    }

    public function like(){

        if(isset($_POST['id'])){

            $id=$this->input->post('id');
            $user=$this->f_productmodel->getFirstRowWhere('users',array('id'=>$this->session->userdata('userid')));

            if($user->liked !=null){
                $liked=(array)json_decode($user->liked);
            }else  $liked=array();
            $rs['status']=false;
            if(!in_array($id,$liked)){
                $liked[]=$id;
                $rs['status']=true;
            }

            $this->f_productmodel->Update_Where('users',array('id'=>$this->session->userdata('userid')),
                array('liked'=>json_encode($liked)));
            echo json_encode($rs);
        }
    }
    public function un_like(){
        if(isset($_POST['id'])){
            $id=$this->input->post('id');
            $user=$this->f_productmodel->getFirstRowWhere('users',array('id'=>$this->session->userdata('userid')));

            if($user->liked !=null){
                $liked=(array)json_decode($user->liked);
            }else $liked=array();
            $rs['status']=false;
            $new=array();
            foreach($liked as  $val){
                if($id!=$val){
                    $new[]=$val;
                    $rs['status']=true;
                }
            }
            $this->f_productmodel->Update_Where('users',array('id'=>$this->session->userdata('userid')),
                array('liked'=>json_encode($new)));
            echo json_encode($rs);
        }
    }
    public function liked_product(){
        $data=array();
        if($this->session->userdata('userid')){
            $u=$this->f_productmodel->getFirstRowWhere('users',array('id'=>$this->session->userdata('userid')));

            $liked_id=(array)json_decode($u->liked);

            if(!empty($liked_id))
                $data['liked']=$this->f_productmodel->getLikedPro($liked_id);
        }

        $this->load->view('liked_product', $data);
    }
}
