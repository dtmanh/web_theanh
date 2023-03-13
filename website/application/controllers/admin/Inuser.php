<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class inuser extends MY_Controller
{
    //protected $module_name = "inuser";
    function __construct()
    {
        parent::__construct();
		if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'techadmin', 'location');
            die();
        }
    }
    public function categories()
    {
		$this->check_acl();
        $data['list_cate'] = $this->system_model->getFields('inuser_category','id,name,home,sort,image',array(
            'lang' => $this->language
        ),array('sort' => 'asc'),20,0);

        $title = 'Ý kiến khách hàng';
        $this->LoadHeaderAdmin(false,$title);
        
        $this->load->view('admin/inusers/list_cate', $data);
        $this->load->view('admin/footer');
    }
   
    public function cate_add()
    {        
        $this->cate_add_edit();
    }
     public function cat_edit($id){
        $this->cate_add_edit($id);
    }
    //Add Category
    public function cate_add_edit($id_edit=null)
    {
        $this->check_acl();
        $config['upload_path']   = './upload/img/inuser/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
        $config['max_size']      = '2000';
        $config['max_width']     = '1500';
        $config['max_height']    = '1000';
        $this->load->library('upload', $config);
        $data['btn_name']='Thêm';
		$data['max_sort']=$this->system_model->SelectMax('inuser_category','sort')+1;
        if($id_edit!=null){
            $data['edit']=$this->system_model->get_data('inuser_category',array('id'=>$id_edit),array(),true);
            $data['btn_name']='Cập nhật';
        }
        if (isset($_POST['addnews'])) {
			$alias = make_alias($this->input->post('alias'));
            $arr    = array(
                'name'        => $this->input->post('name'),
                'title'       => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'parent_id'   => $this->input->post('parent'),
                'home'        => $this->input->post('home'),
                'focus'       => $this->input->post('focus'),
                'hot'         => $this->input->post('hot'),
                'tour'         => $this->input->post('tour'),
                'alias'       => $alias,
                'sort' => $this->input->post('sort'),
                'lang'        => $this->language
            );

			if (!empty($_POST['edit'])){
				$id = $this->system_model->Update_where('inuser_category', array('id'=>$id_edit), $arr);
				$this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->system_model->Add('inuser_category', $arr);
				$this->session->set_flashdata("mess", "Thêm thành công!");
            }

			 if ($id_edit != null) {
                $id = $id_edit;
            } else $id = $id;

			/**
             * alias
             */
			$checkAlias = $this->system_model->getField('alias','id',array(
				'inuser'  =>  $id
			));
			if(empty($checkAlias)){
				$this->system_model->Add('alias',array(
					'alias' => $alias,
					'inuser' => $id,
					'type' => 'cat_inuser',
				));
			}else{
				$this->system_model->Update_where('alias', array('inuser'=>$id), array('alias' => $alias));
			}

			//update news image
            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload('userfile')) {
                   $this->session->set_flashdata("mess", "".$this->upload->display_errors());
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image  = 'upload/img/inuser/' . $upload['upload_data']['file_name'];
                    $this->system_model->Update_where('inuser_category', array('id'=>$id), array('image'=>$image));
                }
            }
            redirect(base_url('techadmin/inuser/categories'));
        }

        $data['category'] = $this->system_model->getFields('inuser_category','id,name,parent_id',array(
            'lang' => $this->language
        ),array('sort'=>''));

        $title = $data['btn_name']." danh mục ý kiến khách hàng";
        $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/inusers/cat_add', $data);
        $this->load->view('admin/footer');
    }
	// xoa list danh muc
	public function deletes_category(){
        $this->check_acl();
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_cat_once($id);
        }
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_cat_once($id)
    {
		// xoa ban ghi trong inuser_category
        $item = $this->system_model->getField('inuser_category','id',array(
            'id' => $id
        ));
		// xoa anh trong thu muc
		if(file_exists($item->image)){
            @unlink($item->image);
        }
		$this->system_model->Delete_where('inuser_category',array('id' => $id));
    }
    //Delete  danh muc inuser
    public function deletecategory($id)
    {
        $this->check_acl();
        $this->delete_cat_once($id);
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }

}