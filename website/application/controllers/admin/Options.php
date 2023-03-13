<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Options extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'techadmin', 'location');
        }
        $this->load->model('m_option');
        $this->_permission();
    }

/////////////// kich thươc //////////////////////////////////////////////////////
	public function listOption()
    {
		$this->check_acl();
		$data['list'] = $this->m_option->getFields('product_size','name,id,sort,size',array(
            'lang' => $this->language
        ),array('sort' => 'desc'));
        $data['headerTitle'] = 'Quản lý kích thước';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/product_size/list', $data);
        $this->load->view('admin/footer');
    }
	public function addoption($id_edit=null)
    {
		$this->check_acl();
        $data['btn_name']='Thêm';
        $data['max_sort']=$this->m_option->SelectMax('product_size','sort')+1;
		 if($id_edit!=null){
            $data['edit']=$this->m_option->get_data('product_size',array('id'=>$id_edit),array(),true);
			$data['max_sort']=$max_sort=$data['edit']->sort;
			$data['btn_name']='Cập nhật';
        }
        if (isset($_POST['addnews'])) {
            $arr = array(
                'name' => $this->input->post('name'),
                'size' => $this->input->post('size'),
                'sort' => $this->input->post('sort'),
                'lang' => $this->language
            );
			if (!empty($_POST['edit'])){
				$id = $this->m_option->Update_where('product_size', array('id'=>$id_edit), $arr);
				$this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->m_option->Add('product_size', $arr);
				$this->session->set_flashdata("mess", "Thêm thành công!");
            }

			if ($id_edit != null) {
                $id = $id_edit;
            } else $id = $id;
            redirect(base_url('techadmin/options/listAll'));
        }

         
         $title = "".$data['btn_name']."&nbsp"."kích thước";
            $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/product_size/add', $data);
        $this->load->view('admin/footer');
    }
    public function edit($id=null)
    {
        $this->addoption($id);
    }
	// xoa list danh muc
	public function deletes_category(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_option_once($id);
        }
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_option_once($id)
    {
		$this->m_option->Delete_where('product_size',array('id' => $id));
    }
    //Delete  danh muc product_price
    public function deletecategory($id)
    {
		$this->delete_option_once($id);
        $this->session->set_flashdata("mess", "Xóa thành công!");
		redirect($_SERVER['HTTP_REFERER']);
    }
}
