<?php
class Imageupload extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('system_model');
        $this->load->library('pagination');
		 if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'techadmin', 'location');
			show_error('Bạn không có quyền truy cập vào chức năng này !!!');
            die();
        }
    }
   
    public function banners()
    {
		$this->check_acl();
		$data['list'] = $this->system_model->getFields('images','title,image,id,type,cate,sort',array(
			'lang' => $this->language,
			),array('sort' => 'desc'));

		foreach ($data['list'] as $key => $cat) {
			$data['list'][$key]->cat_name = $this->system_model->getField('product_category',
				array('name'),
				array(
				'id' => $cat->cate,
				));
            $data['list'][$key]->type_name = $this->system_model->getField('config_banner',
                array('name'),
                array(
                'field' => $cat->type,
                ));
		}
        $data['type'] = $this->system_model->getFirstRowWhere('config_banner',array(
                'type' => 1,
                'active' => 1
            ),array('id'=>'asc'));
        
        $title = "Banner";
        $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/banners/list', $data);
        $this->load->view('admin/footer');
    }
 public function add()
    {
        $this->add_edit();
    }
    // edit
    public function edit($id){
        $this->add_edit($id);
    }
    //add banner
    public function add_edit($id_edit=null)
    {
		$this->check_acl();
        $config['upload_path'] = './upload/img/banner/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '*';
        $config['max_width'] = '*';
        $config['max_height'] = '*';

        $this->load->library('upload', $config);

        $data['btn_name']='Thêm';
		if($id_edit){
            $data['edit']=$this->system_model->getField('images','id,title,name,image,cate,url,content,type',array('id'=>$id_edit),array());
          
            $data['btn_name']='Cập nhật';
        }
        if (isset($_POST['addnews'])) {
			$arr = array(
				'name' => $this->input->post('name'),
                'type' => $this->input->post('type'),
				'url' => $this->input->post('url'),
				'target' => $this->input->post('target'),
				'title' => $this->input->post('title'),
				'cate' => $this->input->post('cate'),
				'content' => $this->input->post('content'),
				'lang' => $this->language
			);
            if(($_POST['edit'])){
				$id = $this->system_model->Update_where('images', array('id'=>$id_edit), $arr);
				$this->session->set_flashdata("mess", "Cập nhật thành công!");
			}else{
                $id = $this->system_model->Add('images', $arr);
				$this->session->set_flashdata("mess", "Thêm thành công!");
            }
			 if ($id_edit != null) {
                $id = $id_edit;
            } else $id = $id;

			if ($_FILES['userfile']['name'] != '') {
                 // doi ten anh tieng viet sang tieng anh
                $type_image = explode(".", $_FILES['userfile']['name']);
                $a = make_alias($type_image[0]);
                $file_name = $a.'.'.$type_image[1];
                 $_FILES['userfile']['name'] =  $file_name;
                if (!$this->upload->do_upload('userfile')) {
                    $this->session->set_flashdata("mess", "".$this->upload->display_errors());
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    @unlink(@$data['edit']->image);
                          $im=explode('upload/img/banner/', $data['edit']->image);
                             @unlink('upload/img/banner/thumb/'.$im[1]);
                    $image  = 'upload/img/banner/' . $upload['upload_data']['file_name'];
                    // cat ảnh crop
                $fileName = basename($_FILES["userfile"]["name"]);
                $fileTmp = $_FILES["userfile"]["tmp_name"];
                $fileType = $_FILES["userfile"]["type"];
                $fileSize = $_FILES["userfile"]["size"];
                $fileExt = substr($fileName, strrpos($fileName, ".") + 1);
               //  //specify image upload directory
                $largeImagegoc = 'upload/img/banner/' . $upload['upload_data']['file_name'];
                $thumbImagegoc = 'upload/img/banner/thumb/' . $upload['upload_data']['file_name'];
              //  chmod ($largeImagegoc, 0777);                      
                  //get dimensions of the original image
                  list($width_org, $height_org) = getimagesize($largeImagegoc);
                  
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
					$this->system_model->Update_where('images', array('id'=>$id), array('image'=>$image));
                }
            }
            redirect(base_url('techadmin/imageupload/banners'));
        }

        $data['procate'] = $this->system_model->getFields('product_category','id,name,parent_id',array(),null);
        //var_dump($data['procate']);die;

        $data['type'] = $this->system_model->get_data('config_banner',array(
                'active' => 1
            ),array('id'=>'asc'));
        $data['colum_danhmuc'] = $this->system_model->getFirstRowWhere('config_banner',array(
                'type' => 1,
                'active' => 1
            ),array('id'=>'asc'));
        
        $title = "".$data['btn_name']."&nbsp"."banner";
        $this->LoadHeaderAdmin(false,$title);
        $this->load->view('admin/banners/add', $data);
        $this->load->view('admin/footer');
    }
   
     public function delete($id)
    {
        $this->delete_once($id);
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
	 //Delete Image
    public function deletes(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_once($id);
        }
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function  delete_once($id){
		$this->check_acl();
        $img=$this->system_model->getField('images','id,image',array('id'=>$id),array(),true);
        $ip=explode('upload/img/banner/', $img->image);
            $bi='upload/img/banner/thumb/'.$ip[1];
        if(file_exists($img->image)){
            unlink(($img->image));@unlink(($bi));
        }
		$this->system_model->Delete_where('images',array('id' => $id));
    }
   
}

?>