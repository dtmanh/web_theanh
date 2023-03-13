<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
         $this->load->helper('url');
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'techadmin', 'location');
            die();
        }
    }
    public function contacts()
    {
		$this->check_acl();
		$data         = array();
		$data['list'] = $this->system_model->getFields('contact','id,show,full_name,phone,email,address,time',array());        
        $title = "Liên hệ";
        $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/contacts/list', $data);
        $this->load->view('admin/footer');
    }
    //ajax
    public function popupdata()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {

            $id   = $_GET['id'];
            $data['item'] = $item = $this->system_model->getField('contact','id,phone,full_name,address,time,comment,email', array('id' => $id));
            if($item->show==0){
                $this->system_model->Update('contact',$id,array('show'=>1));
            }
			 $this->load->view('admin/modal/view_contact', $data);
        }
    }
     public function deletes()
    {
        if($this->input->post('checkone') && is_array($this->input->post('checkone')) && count($this->input->post('checkone')) > 0)
        {
            $ids = $this->input->post('checkone');
            foreach($ids as $id)
            {
                $this->delete_once($id);
            }
        }
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_once($id){
        
        if (is_numeric($id)) {
            $this->system_model->Delete_where('contact',array('id' => $id));
        } else return false;
    }
    // xoa 1 ban ghi
    public function delete($id)
    {
        $this->delete_once($id);
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }

    //Delete  ban ghi
   

}