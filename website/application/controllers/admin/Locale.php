<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class locale extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'techadmin', 'location');
            die();
        }
        $this->load->model('locale_model');
    }
  //   public function listLocale()
  //   {
		// $this->check_acl();
		// $data['list'] = $this->locale_model->get_data('product_locale',array(
  //           'lang' => $this->language
  //       ),array('sort' => 'desc'));

  //       $data['headerTitle'] = 'Quản lý xuất xứ';
  //       $this->LoadHeaderAdmin($data);
  //       $this->load->view('admin/locale/list', $data);
  //       $this->load->view('admin/footer');
  //   }
  //   public function addlocale($id_edit=null)
  //   {
		// $this->check_acl();
  //       $config['upload_path'] = './upload/img/brand/';
  //       $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
  //       $config['max_size'] = '4000';
  //       $config['max_width'] = '3000';
  //       $config['max_height'] = '3000';
  //       $this->load->library('upload', $config);

  //       $data['btn_name']='Thêm';
  //       $data['max_sort']=$this->locale_model->SelectMax('product_locale','sort')+1;
		// if($id_edit!=null){
  //           $data['edit']=$this->locale_model->get_data('product_locale',array('id'=>$id_edit),array(),true);
		// 	$data['btn_name']='Cập nhật';
  //       }
  //       if (isset($_POST['addnews'])) {
  //           $alias = make_alias($this->input->post('name'));
  //           $arr = array(
  //               'name' => $this->input->post('name'),
  //               'description' => $this->input->post('description'),
  //               'alias' => $alias,
  //               'sort' => $this->input->post('sort'),
  //               'lang' => $this->language
  //           );

		// 	if (!empty($_POST['edit'])){
		// 		$id = $this->locale_model->Update_where('product_locale', array('id'=>$id_edit), $arr);
		// 		$this->session->set_flashdata("mess", "Cập nhật thành công");
  //           } else {
  //               $id = $this->locale_model->Add('product_locale', $arr);
		// 		$this->session->set_flashdata("mess", "Thêm thành công");
  //           }

		// 	if ($id_edit != null) {
  //               $id = $id_edit;
  //           } else $id = $id;

		// 	$checkAlias = $this->locale_model->getFirstRowWhere('alias',array(
  //               'locale'=> $id
  //           ));
		// 	if(empty($checkAlias)){
  //               $this->locale_model->Add('alias', array(
  //                   'alias' => $alias,
  //                   'locale' => $id,
  //                   'type'  => 'locale'
  //               ));
  //           }else{
  //               $this->locale_model->Update_where('alias',array('locale'=>$id),array(
  //                   'alias' => $this->input->post('alias')
  //               ));
  //           }

		// 	if ($_FILES['userfile']['name'] != '') {
  //               if (!$this->upload->do_upload()) {
  //                   $this->session->set_flashdata("mess", "".$this->upload->display_errors());
  //               } else {
  //                   $upload = array('upload_data' => $this->upload->data());
  //                   $image = 'upload/img/brand/' . $upload['upload_data']['file_name'];

  //                   $this->locale_model->Update_where('product_locale',array('id'=>$id),array('image'=>$image));
  //               }
  //           }

  //           redirect(base_url('techadmin/locale/listLocale'));
  //       }
  //       $data['headerTitle'] = "'".$data['btn_name']." xuất xứ";
  //       $this->LoadHeaderAdmin($data);
  //       $this->load->view('admin/locale/add', $data);
  //       $this->load->view('admin/footer');
  //   }
  //   public function edit($id=null)
  //   {
  //       $this->addlocale($id);
  //   }

	// xoa list danh muc
	// public function deletes_category(){
 //        $ids = $this->input->post('checkone');
 //        foreach($ids as $id)
 //        {
 //            $this->delete_locale_once($id);
 //        }
	// 	$this->session->set_flashdata("mess", "Xóa thành công");
 //        redirect($_SERVER['HTTP_REFERER']);
 //    }
 //    public function delete_locale_once($id)
 //    {
	// 	$this->check_acl();
		
 //        $item = $this->locale_model->getFirstRowWhere('product_locale',array(
 //            'id' => $id
 //        ));
		
	// 	if(file_exists($item->image)){
 //            @unlink($item->image);
 //        }
	// 	$this->locale_model->Delete_where('product_locale',array('id' => $id));
	// 	$item_alias =$this->locale_model->getFirstRowWhere('alias',array('locale'=>$id));
	// 	if(!empty($item_alias)){
	// 		$this->locale_model->Delete_where('alias',array('locale' => $id));
	// 	}
 //    }
   
 //    public function deletecategory($id)
 //    {
	// 	$this->delete_locale_once($id);
	// 	$this->session->set_flashdata("mess", "Xóa thành công!".$this->upload->display_errors());
	// 	redirect($_SERVER['HTTP_REFERER']);
 //    }

	// public function deleteBrand($id){
 //        if (is_numeric($id)) {
 //            $item =$this->locale_model->getFirstRowWhere('product_brand',array('id'=>$id));
 //            @unlink($item->image);
 //            $this->locale_model->Delete('product_brand', $id);
 //            $this->locale_model->Delete_Where('brand_to_cat', array('brand_id'=>$id));
 //            $item_alias =$this->locale_model->getFirstRowWhere('alias',array('hangsx'=>$id));
 //            if(!empty($item_alias)){
 //                $this->locale_model->Delete_where('alias',array('hangsx' => $id));
 //            }
 //            redirect($_SERVER['HTTP_REFERER']);
 //        } else return false;
 //    }
}
