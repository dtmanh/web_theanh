<?php
class Group extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        #BEGIN: CHECK LOGIN
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'techadmin', 'location');
            die();
        }
        #Load model
        $this->load->helper('str_helper');
        $this->load->library('filter');
    }

	public function listGroup($id = null)
    {
        $data['cate'] =$this->system_model->getFields('resources','id,name,sort,parent_id,active,alias,icon',array('parent_id'=>0),array('sort'=>'asc'),false);
        foreach ($data['cate'] as $key => $value) {
            $data['cate'][$key]->catsub = $this->system_model->getFields('resources','id,name,parent_id,active,alias,icon,sort',array(
                'parent_id' => $value->id
            ),array('sort'=>'asc'));
        }
		
        $title = 'Danh sách module quản trị';
		$this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/group/list', $data);
        $this->load->view('admin/footer');
    }
	
	
    function add($id_edit = null)
    {
		$data['btn_name']='Thêm';
		$data['max_sort']=$this->system_model->SelectMax('resources','sort')+1;
        if($id_edit!=null){
            $data['edit']=$this->system_model->get_data('resources',array('id'=>$id_edit),array(),true);
            $data['cate_selected'] = $this->system_model->getField_array('resources','id',
                array('id'=>$data['edit']->parent_id));
			$data['btn_name']='Cập nhật';
			$data['max_sort']=$max_sort=$data['edit']->sort;
        }
        #END CHECK PERMISSION
       if (isset($_POST['addnews'])) {
            $arr = array(
                'resource'        => $this->input->post('resource'),
                'name'   => $this->input->post('name'),
                'alias'			  => $this->input->post('alias'),
                'description'     => $this->input->post('description'),
                'active'          => $this->input->post('active'),
                'icon'            => $this->input->post('icon'),
                'sort'            => $this->input->post('sort'),
            );
			if (!empty($_POST['edit'])){ 
				$id = $this->system_model->Update_where('resources', array('id'=>$id_edit), $arr);
				$this->session->set_flashdata("mess", "Cập nhật thành công!");
			} else {
				$id = $this->system_model->Add('resources', $arr);
				$this->session->set_flashdata("mess", "Thêm mới thành công!");
			}
			if ($id_edit != null) {
					$id = $id_edit;
				} else $id = $id;
				
			if (isset($_POST['category'])) {
                $post_cat = $_POST['category'];
                $a = $this->system_model->Update_where('resources', array('id'=>$id), array('parent_id' => $post_cat));
		   }
            redirect(base_url().'techadmin/group/listGroup');
        }
		$data['cate'] = $this->system_model->get_data('resources',array(
        ),array('sort'=>'asc'));
		
        #Load view
        $data['headerTitle'] = 'Admin CP';
        $this->load->view('admin/header', $data);
        $this->load->view('admin/group/add', $data);
        $this->load->view('admin/footer');
    }
//============ hiện thị thong tin module ========================
	public function popupdata()
    {
		$data = array();
		$data['btn_name']='Thêm mới';
		$data['id']='';
		$data['max_sort']=$this->system_model->SelectMax('resources','sort')+1;
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id_edit   = $_GET['id'];
			$data['id']=$id_edit;
			$data['edit']=$this->system_model->get_data('resources',array('id'=>$id_edit),array(),true);
			$data['cate_selected'] = $this->system_model->getField_array('resources','id',
				array('id'=>$data['edit']->parent_id));
			$data['btn_name']='Cập nhật';
			$data['max_sort']=$max_sort=$data['edit']->sort;
            //danh muc con
            $data['parrent']=$this->system_model->getFields('resources','id,name,sort,resource',array('parent_id'=>$id_edit),array('sort'=>'asc'),false);
        }
		
		$data['cate'] = $this->system_model->getFields('resources','id,name,parent_id',array('parent_id'=>0),array('sort'=>'asc'));
        foreach ($data['cate'] as $key => $value) {
            $data['cate'][$key]->catsub = $this->system_model->getFields('resources','id,name,parent_id',array(
                'parent_id' => $value->id
            ),array('sort'=>'desc'));
            foreach ($data['cate'][$key]->catsub as $key2 => $value2) {
                $data['cate'][$key]->catsub[$key2]->catchildren = $this->system_model->getFields('resources','id,name,parent_id',array('parent_id' => $value2->id),array('sort'=>'desc'));
            }
        }
        
		$this->load->view('admin/modal/view_detail_module',$data);  
    }
    public function deletecategory($id){
        $this->system_model->Delete_where('resources',array('id' => $id));
        $this->session->set_flashdata("mess", "Xóa thành công!");
            redirect($_SERVER['HTTP_REFERER']);
    }
}