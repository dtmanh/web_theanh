<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('system_model');
        $this->load->library('pagination');
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'techadmin', 'location');
            die();
        }
    }
	// danh sach trang nội dung
    public function pagelist(){
		$this->check_acl();
        $data = array();
		$data['pagelist'] = $this->system_model->getFields('staticpage','id,image,name,alias,home,hot,focus',array(
			'lang' => $this->language,
			),array('id' => 'desc'));
        $data['show_home'] = $this->system_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'staticpage','field' => 'home',));
        $data['show_hot'] = $this->system_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'staticpage','field' => 'hot',));
        $data['show_focus'] = $this->system_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'staticpage','field' => 'focus',));
        $data['show_image'] = $this->system_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'staticpage','field' => 'image',));
         
         $title = "Pages";
        $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/pages/list',$data);
        $this->load->view('admin/footer');
    }
    public function add(){
        $this->add_edit();
    }
     public function edit($id)
    {
        $this->add_edit($id);
    }
    public function add_edit($id_edit=null){
		$this->check_acl();
        $this->load->helper('model_helper');
        $config['upload_path'] = './upload/img/pages/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
        $config['max_size']	= '5000';
        $config['max_width']  = '5000';
        $config['max_height']  = '4000';
        $this->load->library('upload', $config);

        $data['btn_name']='Thêm';
        if($id_edit){
            //get news item
            $item=$this->system_model->get_data('staticpage',array('id'=>$id_edit),array(),true);
            $data['edit']=$item;
            $data['btn_name']='Cập nhật';
        }

        if (isset($_POST['addnews'])) {
            $alias = make_alias($this->input->post('alias'));
            $arr=array(
                'name'=>$this->input->post('name'),
                'description'=>$this->input->post('description'),
                'alias' => $alias,
                'home'=>$this->input->post('home'),
                'hot'=>$this->input->post('hot'),
                'focus'=>$this->input->post('focus'),
                'content'=>$this->input->post('content'),
                'title_seo'=>$this->input->post('title_seo'),
                'keyword_seo'=>$this->input->post('keyword_seo'),
                'description_seo'=>$this->input->post('description_seo'),
                'lang'           => $this->language
            );

			if (!empty($_POST['edit'])){
				$id = $this->system_model->Update_where('staticpage', array('id'=>$id_edit), $arr);
				$this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->system_model->Add('staticpage', $arr);
				$this->session->set_flashdata("mess", "Thêm thành công!");
            }

            if ($id_edit != null) {
                $id = $id_edit;
            } else $id = $id;

			/**
             * alias
             */
			$checkAlias = $this->system_model->getField('alias','id,alias,page,type',array(
				'page'  =>  $id
			));
			if(empty($checkAlias)){
				$this->system_model->Add('alias',array(
					'alias' => $alias,
					'page' => $id,
					'type' => 'page',
				));
			}else{
				$this->system_model->Update_where('alias', array('page'=>$id), array('alias' => $alias));
			}

            //update news image
            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload('userfile')) {
                   $this->session->set_flashdata("mess", "".$this->upload->display_errors());

                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    @unlink(@$item->image);
                     $im=explode('upload/img/pages/', @$data['edit']->image);
                          // var_dump($im);die;
                           @unlink('upload/img/pages/thumb/'.$im[1]);
                    $image  = 'upload/img/pages/' . $upload['upload_data']['file_name'];
                    
                      // cat ảnh crop
                $fileName = basename($_FILES["userfile"]["name"]);
                $fileTmp = $_FILES["userfile"]["tmp_name"];
                $fileType = $_FILES["userfile"]["type"];
                $fileSize = $_FILES["userfile"]["size"];
                $fileExt = substr($fileName, strrpos($fileName, ".") + 1);
               //  //specify image upload directory
                $largeImagegoc = 'upload/img/pages/' . $upload['upload_data']['file_name'];
                $thumbImagegoc = 'upload/img/pages/thumb/' . $upload['upload_data']['file_name'];
              //  chmod ($largeImagegoc, 0777);                      
                  //get dimensions of the original image
                  list($width_org, $height_org) = getimagesize(@$largeImagegoc);
                  //get image coords
                  $x = (int) $_POST['x'];
                  $y = (int) $_POST['y'];
                  $width = (int) $_POST['w'];
                  $height = (int) $_POST['h'];

                  //define the final size of the cropped image
                  $width_new = $width;
                  $height_new = $height;
                  //crop and resize image
                  $newImage = imagecreatetruecolor($width_new,$height_new);
                  
                  switch($fileType) {
                      case "image/gif":
                          $source = imagecreatefromgif($largeImagegoc); 
                          break;
                      case "image/pjpeg":
                      case "image/jpeg":
                      case "image/jpg":
                          $source = imagecreatefromjpeg($largeImagegoc); 
                          break;
                      case "image/png":
                      case "image/x-png":
                          $source = imagecreatefrompng($largeImagegoc); 
                          break;
                  }                      
                  imagecopyresampled($newImage,$source,0,0,$x,$y,$width_new,$height_new,$width,$height);                      
                  switch($fileType) {
                      case "image/gif":
                          imagegif($newImage,$thumbImagegoc); 
                          break;
                      case "image/pjpeg":
                      case "image/jpeg":
                      case "image/jpg":
                          imagejpeg($newImage,$thumbImagegoc,90); 
                          break;
                      case "image/png":
                      case "image/x-png":
                          imagepng($newImage,$thumbImagegoc);  
                          break;
                  }
                  imagedestroy($newImage);   
                // cap nhat anh moi
                    $this->system_model->Update_where('staticpage', array('id'=>$id), array('image'=>$image));
                }
            }
            redirect(base_url('techadmin/pages/pagelist'));
        }
        $data['show_home'] = $this->system_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'staticpage','field' => 'home',));
        $data['show_hot'] = $this->system_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'staticpage','field' => 'hot',));
        $data['show_focus'] = $this->system_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'staticpage','field' => 'focus',));
        $data['show_image'] = $this->system_model->getField('config_checkpro','type,field,active,color,name',array('type' => 'staticpage','field' => 'image',));
         $data['crop_page'] = $this->system_model->getField('config_pagination','width,height,pagination',array('lang' => $this->language,'name_table'=>'staticpage')); 
         $title = "Nội dung";
            $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/pages/add',$data);
        $this->load->view('admin/footer');
    }
    public function delete($id){
         $this->delete_once($id);
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
	public function deletes(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_once($id);
        }
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_once($id)
    {
		$this->check_acl();
        $item = $this->system_model->getField('staticpage','id,image',array(
            'id' => $id
        ));
    $ip=explode('upload/img/pages/', $item->image);
            $bi='upload/img/pages/thumb/'.$ip[1];
		if(file_exists($item->image)){
            @unlink($item->image);
             @unlink($bi);
        }
		$this->system_model->Delete_where('staticpage',array('id' => $id));
  
        $item_alias =$this->system_model->getField('alias','page',array('page'=>$id));
        if(!empty($item_alias)){
			$this->system_model->Delete_where('alias',array('page' => $id));
        }
    }
 
   

}